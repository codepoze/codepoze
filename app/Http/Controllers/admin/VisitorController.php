<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\Visitor;
use Yajra\DataTables\Facades\DataTables;

class VisitorController extends Controller
{
    public function index()
    {
        return Template::load($this->session->roles, 'Visitor', 'visitor', 'view');
    }

    public function get_data_dt()
    {
        $data = Visitor::latest('id_visitors')->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('created_at', function ($row) {
                return sql_datetime($row->created_at);
            })
            ->make(true);
    }
}
