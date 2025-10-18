<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\Based;
use App\Models\Project;
use App\Models\ProjectPictures;
use App\Models\ProjectStack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    public function index()
    {
        return Template::load($this->session->roles, 'Project', 'project', 'view');
    }

    public function add()
    {
        $data = [
            'based' => Based::all(),
        ];

        return Template::load($this->session->roles, 'Tambah Project', 'project', 'add', $data);
    }

    public function upd($id)
    {
        $data = [
            'based'   => Based::all(),
            'project' => Project::with(['toBased', 'toProjectStack', 'toProjectPicture'])->findOrFail(my_decrypt($id)),
        ];

        return Template::load($this->session->roles, 'Ubah Project', 'project', 'upd', $data);
    }

    public function det($id)
    {
        $data = [
            'project' => Project::findOrFail(my_decrypt($id)),
        ];

        return Template::load($this->session->roles, 'Detail Project', 'project', 'det', $data);
    }

    public function get_data_dt()
    {
        $data = Project::latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('based', function ($row) {
                return $row->toBased->nama;
            })
            ->addColumn('gambar', function ($row) {
                return '<img src="' . asset_upload('picture/' . $row->gambar) . '" class="img-fluid" width="100px">';
            })
            ->addColumn('action', function ($row) {
                return '
                    <a href="' . route('project.det', my_encrypt($row->id_project)) . '" class="btn btn-info btn-sm"><i class="fa fa-info-circle"></i>&nbsp;Detail</a>&nbsp;
                    <a href="' . route('project.upd', my_encrypt($row->id_project)) . '" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;Ubah</a>&nbsp;
                    <button type="button" id="del" data-id="' . my_encrypt($row->id_project) . '" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Hapus</button>
                ';
            })
            ->rawColumns(['gambar', 'action'])
            ->make(true);
    }

    public function save(Request $request)
    {
        DB::beginTransaction();
        try {
            $post = $request->all();

            foreach ($post as $key => $value) {
                $data[$key] = $value;
            }

            if ($request->id_project === null) {
                $rules['gambar']          = 'required';
                $rules['project_picture'] = 'required';

                $messages['gambar.required']          = 'Gambar harus diisi!';
                $messages['project_picture.required'] = 'Gambar Detail harus diisi!';
            } else {
                if (isset($request->change_picture) && $request->change_picture === 'on') {
                    $rules['gambar'] = 'required';

                    $messages['gambar.required'] = 'Gambar harus diisi!';
                }
            }

            $rules['judul']           = 'required';
            $rules['id_based']        = 'required';
            $rules['project_stack']   = 'required';
            $rules['deskripsi']       = 'required';

            $messages['judul.required']           = 'Judul harus diisi!';
            $messages['id_based.required']        = 'Based harus diisi!';
            $messages['project_stack.required']   = 'Stack harus diisi!';
            $messages['deskripsi.required']       = 'Deskripsi harus diisi!';

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                $response = ['title'  => 'Gagal!', 'text'   => 'Data gagal ditambahkan!', 'type'   => 'error', 'button' => 'Okay!', 'class'  => 'danger', 'errors' => $validator->errors()];

                return Response::json($response);
            }

            if ($request->id_project === null) {
                $nama_gambar = add_picture($request->gambar);

                // project
                $project = new Project();
                $project->judul       = $request->judul;
                $project->id_based    = $request->id_based;
                $project->deskripsi   = $request->deskripsi;
                $project->gambar      = $nama_gambar;
                $project->by_users    = $this->session['id_users'];
                $project->save();

                // project stack
                $stacks = $request->project_stack;
                for ($i = 0; $i < count($stacks); $i++) {
                    $project_stack[] = [
                        'id_project' => $project->id_project,
                        'id_stack'   => $stacks[$i],
                        'by_users'   => $this->session['id_users'],
                    ];
                }
                ProjectStack::insert($project_stack);

                // project picture
                $pictures = $request->project_picture;
                for ($i = 0; $i < count($pictures); $i++) {
                    $nama_foto[$i] = add_picture($request->project_picture[$i]);

                    $project_picture[] = [
                        'id_project' => $project->id_project,
                        'picture'    => $nama_foto[$i],
                        'by_users'   => $this->session['id_users'],
                    ];
                }
                ProjectPictures::insert($project_picture);
                DB::commit();

                $response = ['title' => 'Berhasil!', 'text' => 'Data Sukses di Simpan!', 'type' => 'success', 'button' => 'Okay!', 'class' => 'success'];
            } else {
                // project
                $project = Project::find($request->id_project);

                if (isset($request->change_picture) && $request->change_picture === 'on') {
                    $nama_gambar     = upd_picture($request->gambar, $project->gambar);
                    $project->gambar = $nama_gambar;
                }

                $project->judul     = $request->judul;
                $project->id_based  = $request->id_based;
                $project->deskripsi = $request->deskripsi;
                $project->by_users  = $this->session['id_users'];
                $project->save();

                // project stack
                $find_project_stack = ProjectStack::whereIdProject($request->id_project);
                $find_project_stack->delete();

                $stacks = $request->project_stack;
                for ($i = 0; $i < count($stacks); $i++) {
                    $project_stack[] = [
                        'id_project' => $request->id_project,
                        'id_stack'   => $stacks[$i],
                        'by_users'   => $this->session['id_users'],
                    ];
                }
                ProjectStack::insert($project_stack);

                // project picture
                $pictures = $request->project_picture;
                if ($pictures !== null) {
                    for ($i = 0; $i < count($pictures); $i++) {
                        $nama_foto[$i] = add_picture($request->picture[$i]);

                        $project_picture[] = [
                            'id_project' => $project->id_project,
                            'picture'    => $nama_foto[$i],
                            'by_users'   => $this->session['id_users'],
                        ];
                    }
                    ProjectPictures::insert($project_picture);
                }
                DB::commit();

                $response = ['title' => 'Berhasil!', 'text' => 'Data Sukses di Simpan!', 'type' => 'success', 'button' => 'Okay!', 'class' => 'success'];
            }
        } catch (\Exception $e) {
            $response = ['title' => 'Gagal!', 'text' => 'Data Gagal di Simpan!', 'type' => 'error', 'button' => 'Okay!', 'class' => 'danger'];
        }

        return Response::json($response);
    }

    public function del(Request $request)
    {
        try {
            $data = Project::with(['toProjectPicture'])->find(my_decrypt($request->id));

            del_picture($data->gambar);

            foreach ($data->toProjectPicture as $key => $value) {
                del_picture($value->picture);
            }

            $data->delete();

            $response = ['title' => 'Berhasil!', 'text' => 'Data Sukses di Hapus!', 'type' => 'success', 'button' => 'Okay!', 'class' => 'success'];
        } catch (\Exception $e) {
            $response = ['title' => 'Gagal!', 'text' => 'Data Gagal di Hapus!', 'type' => 'error', 'button' => 'Okay!', 'class' => 'danger'];
        }

        return Response::json($response);
    }

    public function get_stack_detail($id)
    {
        $get = ProjectStack::with('toStack')->whereIdProject($id)->get();

        $response = [];

        foreach ($get as $value) {
            $response[] = $value->id_stack;
        }

        return Response::json($response);
    }

    public function get_picture_detail($id)
    {
        $get = ProjectPictures::whereIdProject($id)->get();

        $response = [];

        foreach ($get as $value) {
            $response[] = [
                'id_project_picture' => $value->id_project_picture,
                'picture'            => $value->picture,
            ];
        }

        return Response::json($response);
    }

    public function del_picture_detail(Request $request)
    {
        try {
            $data = ProjectPictures::find($request->id);

            del_picture($data->picture);

            $data->delete();

            $response = ['title' => 'Berhasil!', 'text' => 'Gambar Sukses di Hapus!', 'type' => 'success', 'button' => 'Okay!', 'class' => 'success'];
        } catch (\Exception $e) {
            $response = ['title' => 'Gagal!', 'text' => 'Gambar Gagal di Hapus!', 'type' => 'error', 'button' => 'Okay!', 'class' => 'danger'];
        }

        return Response::json($response);
    }
}
