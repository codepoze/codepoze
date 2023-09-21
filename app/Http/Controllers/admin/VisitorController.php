<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\Visitors;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class VisitorController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        // untuk deteksi session
        detect_role_session($this->session, session()->has('roles'), 'admin');
    }

    public function index()
    {
        return Template::load($this->session['roles'], 'Visitor', 'visitor', 'view');
    }

    public function get_data_dt()
    {
        $data = Visitors::latest('id_visitors')->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->make(true);
    }
}
