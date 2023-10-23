<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Libraries\Notification;
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
            'nama.required'  => __('contact.validasi_1'),
            'email.required' => __('contact.validasi_21'),
            'email.email'    => __('contact.validasi_22'),
            'judul.required' => __('contact.validasi_3'),
            'pesan.required' => __('contact.validasi_4'),
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $response = ['title' => __('contact.danger_title'), 'text' => __('contact.danger_text'), 'type' => 'error', 'button' => 'Okay!', 'class' => 'danger', 'errors' => $validator->errors()];

            return Response::json($response);
        }

        try {
            $id = Contact::create([
                'nama'  => $request->nama,
                'email' => $request->email,
                'judul' => $request->judul,
                'pesan' => $request->pesan,
            ])->id_contact;

            Notification::send($id, 'contact.det', 'Ada kontak baru dari ' . $request->nama);

            $response = ['title' => __('contact.success_title'), 'text' => __('contact.success_text'), 'type' => 'success', 'button' => 'Okay!', 'class' => 'success'];
        } catch (\Exception $e) {
            $response = ['title' => __('contact.danger_title'), 'text' => __('contact.danger_text'), 'type' => 'error', 'button' => 'Okay!', 'class' => 'danger'];
        }

        return Response::json($response);
    }
}
