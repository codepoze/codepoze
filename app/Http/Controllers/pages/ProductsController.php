<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request, $slug = null)
    {
        if ($request->q) {
            if ($slug) {
                $get = Product::whereHas('toType', function ($query) use ($slug) {
                    $query->whereSingkatan($slug);
                })->where('judul', 'like', '%' . $request->q . '%')->get();

                $product = paginate($get, 6);
                $product->setPath($slug . '?q=' . $request->q);
            } else {
                $get = Product::where('judul', 'like', '%' . $request->q . '%')->get();

                $product = paginate($get, 6);
                $product->setPath('products?q=' . $request->q);
            }
        } else if ($request->type) {
            if ($slug) {
                $get = Product::whereHas('toType', function ($query) use ($slug) {
                    $query->whereSingkatan($slug);
                })->whereHas('toPrice', function ($query) use ($request) {
                    $query->whereJenis($request->type);
                })->get();

                $product = paginate($get, 6);
                $product->setPath($slug . '?type=' . $request->type);
            } else {
                $get = Product::whereHas('toPrice', function ($query) use ($request) {
                    $query->whereJenis($request->type);
                })->get();

                $product = paginate($get, 6);
                $product->setPath('products?type=' . $request->type);
            }
        } else {
            $get = Product::all();
            $product = paginate($get, 6);
            $product->setPath('products');
        }

        $data = [
            'type'    => $slug,
            'product' => $product
        ];

        return Template::pages(__('menu.product'), 'product', 'view', $data);
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
