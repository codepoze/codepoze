<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class PriceController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        // untuk deteksi session
        detect_role_session($this->session, session()->has('roles'), 'admin');
    }

    public function index()
    {
        return Template::load($this->session['roles'], 'Price', 'price', 'view');
    }

    public function get_all()
    {
        $response = Based::select('id_price AS id', 'nama AS text')->orderBy('id_price', 'desc')->get();

        return Response::json($response);
    }

    public function get_data_dt()
    {
        $data = Price::latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('jenis', function ($row) {
                return $row->jenis == 'free' ? '<span class="badge bg-success">Free</span>' : '<span class="badge bg-primary">Paid</span>';
            })
            ->addColumn('nilai_normal', function ($row) {
                return rupiah($row->nilai_normal);
            })
            ->addColumn('diskon', function ($row) {
                return $row->diskon == 'y' ? '<span class="badge bg-success">Ya</span>' : '<span class="badge bg-primary">Tidak</span>';
            })
            ->addColumn('nilai_diskon', function ($row) {
                return rupiah($row->nilai_diskon);
            })
            ->addColumn('action', function ($row) {
                return '
                    <button type="button" id="upd" data-id="' . my_encrypt($row->id_price) . '" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-add-upd" data-bs-backdrop="static" data-bs-keyboard="false"><i class="fa fa-edit"></i>&nbsp;Ubah</button>&nbsp;
                    <button type="button" id="del" data-id="' . my_encrypt($row->id_price) . '" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Hapus</button>
                ';
            })
            ->rawColumns(['jenis', 'diskon', 'action'])
            ->make(true);
    }

    public function show(Request $request)
    {
        $data = Price::find(my_decrypt($request->id));

        $response = [
            'id_price'     => $data->id_price,
            'jenis'        => $data->jenis,
            'nilai_normal' => create_separator($data->nilai_normal),
            'diskon'       => $data->diskon,
            'nilai_diskon' => create_separator($data->nilai_diskon),
            'by_users'     => $data->by_users,
        ];

        return Response::json($response);
    }

    public function save(Request $request)
    {
        $rules = [
            'jenis'        => 'required',
            'nilai_normal' => 'required',
            'diskon'       => 'required',
            'nilai_diskon' => 'required',
        ];

        $messages = [
            'jenis.required'        => 'Jenis tidak boleh kosong!',
            'nilai_normal.required' => 'Nilai Normal tidak boleh kosong!',
            'diskon.required'       => 'Diskon tidak boleh kosong!',
            'nilai_diskon.required' => 'Nilai Diskon tidak boleh kosong!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $response = ['title'  => 'Gagal!', 'text'   => 'Data gagal ditambahkan!', 'type'   => 'error', 'button' => 'Okay!', 'class'  => 'danger', 'errors' => $validator->errors()];

            return Response::json($response);
        }

        try {
            Price::updateOrCreate(
                [
                    'id_price' => $request->id_price,
                ],
                [
                    'jenis'        => $request->jenis,
                    'nilai_normal' => remove_separator($request->nilai_normal),
                    'diskon'       => $request->diskon,
                    'nilai_diskon' => remove_separator($request->nilai_diskon),
                    'by_users'     => $this->session['id_users'],
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
            $data = Price::find(my_decrypt($request->id));

            $data->delete();

            $response = ['title' => 'Berhasil!', 'text' => 'Data Sukses di Hapus!', 'type' => 'success', 'button' => 'Okay!', 'class' => 'success'];
        } catch (\Exception $e) {
            $response = ['title' => 'Gagal!', 'text' => 'Data Gagal di Hapus!', 'type' => 'error', 'button' => 'Okay!', 'class' => 'danger'];
        }

        return Response::json($response);
    }
}
