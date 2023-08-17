<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index($slug)
    {
        dd($slug);
    }

    public function detail($slug, $id)
    {
        dd($slug, $id);
    }
}
