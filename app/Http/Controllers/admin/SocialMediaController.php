<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class SocialMediaController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        // untuk deteksi session
        detect_role_session($this->session, session()->has('roles'), 'admin');
    }

    public function index()
    {
        return Template::load($this->session['roles'], 'Social Media', 'social_media', 'view');
    }

    public function get_data_dt()
    {
        $data = SocialMedia::latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '
                    <button type="button" id="upd" data-id="' . my_encrypt($row->id_social_media) . '" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-add-upd" data-bs-backdrop="static" data-bs-keyboard="false"><i class="fa fa-edit"></i>&nbsp;Ubah</button>&nbsp;
                    <button type="button" id="del" data-id="' . my_encrypt($row->id_social_media) . '" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Hapus</button>
                ';
            })
            ->make(true);
    }

    public function show(Request $request)
    {
        $response = SocialMedia::find(my_decrypt($request->id));

        return Response::json($response);
    }

    public function save(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'icon' => 'required',
            'link' => 'required',
        ];

        $messages = [
            'nama.required' => 'Nama harus diisi!',
            'icon.required' => 'Icon harus diisi!',
            'link.required' => 'Link harus diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $response = ['title'  => 'Gagal!', 'text'   => 'Data gagal ditambahkan!', 'type'   => 'error', 'button' => 'Okay!', 'class'  => 'danger', 'errors' => $validator->errors()];

            return Response::json($response);
        }

        try {
            SocialMedia::updateOrCreate(
                [
                    'id_social_media' => $request->id_social_media,
                ],
                [
                    'nama'     => $request->nama,
                    'icon'     => $request->icon,
                    'link'     => $request->link,
                    'by_users' => $this->session['id_users'],
                ]
            );

            $response = ['title' => 'Berhasil!', 'text' => 'Data Sukses di Simpan!', 'type' => 'success', 'button' => 'Okay!', 'class' => 'success'];
        } catch (\Exception $e) {
            $response = ['title' => 'Gagal!', 'text' => 'Data Gagal di Simpan!', 'type' => 'error', 'button' => 'Okay!', 'class' => 'danger'];
        }

        return Response::json($response);
    }

    public function del(Request $request)
    {
        try {
            $data = SocialMedia::find(my_decrypt($request->id));

            $data->delete();

            $response = ['title' => 'Berhasil!', 'text' => 'Data Sukses di Hapus!', 'type' => 'success', 'button' => 'Okay!', 'class' => 'success'];
        } catch (\Exception $e) {
            $response = ['title' => 'Gagal!', 'text' => 'Data Gagal di Hapus!', 'type' => 'error', 'button' => 'Okay!', 'class' => 'danger'];
        }

        return Response::json($response);
    }
}
