<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\Testimony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class TestimoniesController extends Controller
{
    public function index()
    {
        return Template::pages(__('menu.testimony'), 'testimonies', 'view');
    }

    public function save(Request $request)
    {
        $rules = [
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email',
            'phone'      => 'required|numeric',
            'message'    => 'required',
        ];

        $messages = [
            'first_name.required' => 'Nama Depan harus diisi!',
            'last_name.required'  => 'Nama Belakang harus diisi!',
            'email.required'      => 'Email harus diisi!',
            'email.email'         => 'Email tidak valid!',
            'phone.required'      => 'No. HP harus diisi!',
            'phone.numeric'       => 'No. HP harus angka!',
            'message.required'    => 'Pesan harus diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $response = ['title'  => 'Gagal!', 'text'   => 'Data gagal ditambahkan!', 'type'   => 'error', 'button' => 'Okay!', 'class'  => 'danger', 'errors' => $validator->errors()];

            return Response::json($response);
        }

        try {
            Testimony::create([
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,
                'email'      => $request->email,
                'phone'      => $request->phone,
                'message'    => $request->message,
                'status'     => '0',
            ]);

            $response = ['title' => 'Berhasil!', 'text' => 'Data Sukses di Simpan!', 'type' => 'success', 'button' => 'Okay!', 'class' => 'success'];
        } catch (\Exception $e) {
            $response = ['title' => 'Gagal!', 'text' => 'Data Gagal di Simpan!', 'type' => 'error', 'button' => 'Okay!', 'class' => 'danger'];
        }

        return Response::json($response);
    }
}
