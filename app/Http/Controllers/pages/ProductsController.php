<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\Product;
use App\Models\Type;

class ProductsController extends Controller
{
    public function index()
    {
        $data = [
            'product' => Product::all()
        ];

        return Template::pages('Product', 'product', 'view', $data);
    }

    public function type($slug)
    {
        $data = [
            'type'    => Type::whereSingkatan($slug)->first(),
            'product' => Type::whereSingkatan($slug)->first()->toProduct
        ];

        return Template::pages('Product', 'product', 'type', $data);
    }

    public function detail($slug, $id)
    {
        $data = [
            'type'    => Type::whereSingkatan($slug)->first(),
            'product' => Product::whereIdProduct($id)->first()
        ];

        return Template::pages('Product', 'product', 'detail', $data);
    }
}
