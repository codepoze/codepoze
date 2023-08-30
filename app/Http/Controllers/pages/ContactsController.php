<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class ContactsController extends Controller
{
    public function index()
    {
        return Template::pages(__('menu.contact'), 'contact', 'view');
    }

    public function save(Request $request)
    {
        $rules = [
            'nama'  => 'required',
            'email' => 'required|email',
            'judul' => 'required',
            'pesan' => 'required',
        ];

        $messages = [
            'nama.required'  => 'Nama harus diisi!',
            'email.required' => 'Email harus diisi!',
            'email.email'    => 'Email tidak valid!',
            'judul.required' => 'Judul harus diisi!',
            'pesan.required' => 'Pesan harus diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $response = ['title'  => 'Gagal!', 'text'   => 'Data gagal ditambahkan!', 'type'   => 'error', 'button' => 'Okay!', 'class'  => 'danger', 'errors' => $validator->errors()];

            return Response::json($response);
        }

        try {
            Contact::create([
                'nama'  => $request->nama,
                'email' => $request->email,
                'judul' => $request->judul,
                'pesan' => $request->pesan,
            ]);

            $response = ['title' => 'Berhasil!', 'text' => 'Data Sukses di Simpan!', 'type' => 'success', 'button' => 'Okay!', 'class' => 'success'];
        } catch (\Exception $e) {
            $response = ['title' => 'Gagal!', 'text' => 'Data Gagal di Simpan!', 'type' => 'error', 'button' => 'Okay!', 'class' => 'danger'];
        }

        return Response::json($response);
    }
}
