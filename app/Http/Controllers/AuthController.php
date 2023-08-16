<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        checking_role_session($this->session, $request->session()->has('roles'));

        $data = [
            'title' => "Login"
        ];

        return view('login', $data);
    }

    public function check(Request $request)
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        $messages = [
            'username.required' => 'Username tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            $response = ['status' => 'error', 'errors' => $validator->errors()];

            return Response::json($response);
        }

        $username = $request->input('username');
        $password = $request->input('password');

        // untuk check users
        $checking = [
            'username' => $username,
            'password' => $password,
            'active'   => 'y'
        ];

        if (Auth::attempt($checking)) {
            // untuk data users
            $users = Auth::user();

            // untuk mengaktifkan session
            $request->session()->put('id', $users->id);
            $request->session()->put('id_users', $users->id_users);
            $request->session()->put('nama', $users->nama);
            $request->session()->put('roles', $users->roles);
            $request->session()->put('foto', $users->foto);

            // untuk check role
            if ($users->roles === 'admin') {
                $response = [
                    'status' => 'success',
                    'url'    => url('/admin')
                ];
            } else {
                $response = [
                    'status'  => 'warning',
                    'message' => '<strong>Username</strong> atau <strong>Password</strong> Anda salah!',
                ];
            }
        } else {
            $response = [
                'status'  => 'warning',
                'message' => '<strong>Username</strong> atau <strong>Password</strong> Anda salah!',
            ];
        }

        return Response::json($response);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect()->intended('/');
    }
}
