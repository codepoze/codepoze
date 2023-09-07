<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Libraries\Notification;
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
            'phone'      => 'required|numeric|digits_between:10,13',
            'message'    => 'required',
        ];

        $messages = [
            'first_name.required'  => __('testimonies.validasi_11'),
            'last_name.required'   => __('testimonies.validasi_12'),
            'email.required'       => __('testimonies.validasi_21'),
            'email.email'          => __('testimonies.validasi_22'),
            'phone.required'       => __('testimonies.validasi_31'),
            'phone.numeric'        => __('testimonies.validasi_32'),
            'phone.digits_between' => __('testimonies.validasi_33'),
            'message.required'     => __('testimonies.validasi_4'),
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $response = ['title' => __('testimonies.danger_title'), 'text' => __('testimonies.danger_text'), 'type' => 'error', 'button' => 'Okay!', 'class' => 'danger', 'errors' => $validator->errors()];

            return Response::json($response);
        }

        try {
            $id = Testimony::create([
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,
                'email'      => $request->email,
                'phone'      => $request->phone,
                'message'    => $request->message,
                'status'     => '0',
            ])->id_testimonies;

            Notification::send($id, 'admin.testimony.det', 'Ada testimoni baru dari ' . $request->first_name . ' ' . $request->last_name);

            $response = ['title' => __('testimonies.success_title'), 'text' => __('testimonies.success_text'), 'type' => 'success', 'button' => 'Okay!', 'class' => 'success'];
        } catch (\Exception $e) {
            $response = ['title' => __('testimonies.danger_title'), 'text' => __('testimonies.danger_text'), 'type' => 'error', 'button' => 'Okay!', 'class' => 'danger'];
        }

        return Response::json($response);
    }
}
