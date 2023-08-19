<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $get     = Product::all();
        $product = paginate($get, 6);

        $data = [
            'product' => $product
        ];

        return Template::pages('Home', 'home', 'view', $data);
    }
}
