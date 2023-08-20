<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\Testimony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class TestimonyController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
        // untuk deteksi session
        detect_role_session($this->session, $request->session()->has('roles'), 'admin');
    }

    public function index()
    {
        return Template::load($this->session['roles'], 'Testimony', 'testimony', 'view');
    }

    public function get_data_dt()
    {
        $data = Testimony::latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('posting', function ($row) {
                $status = ($row->status == '1') ? '<i class="fa fa-check"></i>&nbsp;<span>Aktif</span>' : '<i class="fa fa-times"></i>&nbsp;<span>Tidak Aktif</span>';
                $button = ($row->status == '1') ? 'btn-success' : 'btn-warning';

                return '<button type="button" id="sts" data-id="' . my_encrypt($row->id_testimonies) . '" class="btn btn-sm ' . $button . '">' . $status . '</button>';
            })
            ->addColumn('action', function ($row) {
                return '<button type="button" id="del" data-id="' . my_encrypt($row->id_testimonies) . '" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Hapus</button>';
            })
            ->rawColumns(['posting', 'action'])
            ->make(true);
    }

    public function posting(Request $request)
    {
        try {
            $data = Testimony::find(my_decrypt($request->id));

            $data->status = ($data->status == '1') ? '0' : '1';
            $data->save();

            $response = ['title' => 'Berhasil!', 'text' => 'Data Sukses di Ubah!', 'type' => 'success', 'button' => 'Ok!', 'class' => 'success'];
        } catch (\Exception $e) {
            $response = ['title' => 'Gagal!', 'text' => 'Data Gagal di Ubah!', 'type' => 'error', 'button' => 'Ok!', 'class' => 'danger'];
        }

        return Response::json($response);
    }

    public function del(Request $request)
    {
        try {
            $data = Testimony::find(my_decrypt($request->id));

            $data->delete();

            $response = ['title' => 'Berhasil!', 'text' => 'Data Sukses di Hapus!', 'type' => 'success', 'button' => 'Okay!', 'class' => 'success'];
        } catch (\Exception $e) {
            $response = ['title' => 'Gagal!', 'text' => 'Data Gagal di Hapus!', 'type' => 'error', 'button' => 'Okay!', 'class' => 'danger'];
        }

        return Response::json($response);
    }
}
