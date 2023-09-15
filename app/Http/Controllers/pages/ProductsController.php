<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->q) {
            $get = Product::where('judul', 'like', '%' . $request->q . '%')->get();
            $product = paginate($get, 6);
            $product->setPath('products?q=' . $request->q);
        } else if ($request->type) {
            $get = Product::whereHas('toPrice', function ($query) use ($request) {
                $query->whereJenis($request->type);
            })->get();
            $product = paginate($get, 6);
            $product->setPath('products?type=' . $request->type);
        } else {
            $get = Product::all();
            $product = paginate($get, 6);
            $product->setPath('products');
        }

        $data = [
            'product' => $product
        ];

        return Template::pages(__('menu.product'), 'product', 'view', $data);
    }

    public function type(Request $request, $slug)
    {
        if ($request->q) {
            $get = Product::whereHas('toType', function ($query) use ($slug) {
                $query->whereSingkatan($slug);
            })->where('judul', 'like', '%' . $request->q . '%')->get();

            $product = paginate($get, 6);
            $product->setPath($slug . '?q=' . $request->q);
        } else {
            $get = Product::whereHas('toType', function ($query) use ($slug) {
                $query->whereSingkatan($slug);
            })->get();

            $product = paginate($get, 6);
            $product->setPath($slug);
        }

        $data = [
            'type'    => Type::whereSingkatan($slug)->first(),
            'product' => $product
        ];

        return Template::pages(__('menu.product'), 'product', 'type', $data);
    }

    public function detail($slug, $id)
    {
        $data = [
            'type'    => Type::whereSingkatan($slug)->first(),
            'product' => Product::with([
                'toProductStack' => function ($query) {
                    $query->orderBy('id_stack', 'asc');
                },
                'toProductPicture'
            ])->whereIdProduct($id)->firstOrFail()
        ];

        return Template::pages(__('menu.product'), 'product', 'detail', $data);
    }
}
