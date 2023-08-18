<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'product' => Product::all()
        ];

        return Template::pages('Home', 'home', 'view', $data);
    }
}
