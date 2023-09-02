<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class NotificationController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
        // untuk deteksi session
        detect_role_session($this->session, $request->session()->has('roles'), 'admin');
    }

    public function index($status)
    {
        $data         = Notification::whereStatus($status)->latest('id_notification')->get();
        $notification = paginate($data, 15);
        $notification->setPath($status);

        $data = [
            'notifikasi' => $notification,
        ];

        return Template::load('admin', 'Notifikasi', 'notification', 'view', $data);
    }

    public function load()
    {
        $notification = Notification::whereStatus('unread')->latest('id_notification')->get();

        $data = [];
        foreach ($notification as $key => $value) {
            $data[] = [
                'id'   => my_encrypt($value->id_notification),
                'text' => $value->text,
                'url'  => ($value->route === '#' ? '#' : route($value->route, my_encrypt($value->id))),
            ];
        }

        $response = [
            'count' => $notification->count(),
            'data'  => $data,
        ];

        return Response::json($response);
    }

    public function read(Request $request)
    {
        $notification = Notification::find(my_decrypt($request->id));
        $notification->status = 'read';
        $notification->save();
    }

    public function read_all(Request $request)
    {
        $id_notification = $request->id;
        $notification    = Notification::whereIn('id_notification', $id_notification)->get();
        try {
            foreach ($notification as $key => $value) {
                $value->status = 'read';
                $value->save();
            }

            $response = ['title' => 'Berhasil!', 'text' => 'Pesan telah di baca!', 'status' => true];
        } catch (\Exception $e) {
            $response = ['title' => 'Gagal!', 'text' => 'Pesan gagal di baca!', 'status' => false];
        }

        return Response::json($response);
    }

    public function delete_all(Request $request)
    {
        $id_notification = $request->id;
        $notification    = Notification::whereIn('id_notification', $id_notification)->get();
        try {
            foreach ($notification as $key => $value) {
                $value->delete();
            }

            $response = ['title' => 'Berhasil!', 'text' => 'Pesan telah di hapus!', 'status' => true];
        } catch (\Exception $e) {
            $response = ['title' => 'Gagal!', 'text' => 'Pesan gagal di hapus!', 'status' => false];
        }

        return Response::json($response);
    }
}
