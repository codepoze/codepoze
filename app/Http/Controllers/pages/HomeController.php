<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\Product;
use App\Models\Testimony;

class HomeController extends Controller
{
    public function index()
    {
        $get       = Product::all();
        $product   = paginate($get, 6);
        $testimony = Testimony::whereStatus(1)->limit(3)->get();

        $data = [
            'product'   => $product,
            'testimony' => $testimony
        ];

        return Template::pages('Home', 'home', 'view', $data);
    }
}
