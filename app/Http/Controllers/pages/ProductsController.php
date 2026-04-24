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
        } else if ($slug) {
            $get = Product::whereHas('toType', function ($query) use ($slug) {
                $query->whereSingkatan($slug);
            })->get();

            $product = paginate($get, 6);
            $product->setPath($slug);
        } else {
            $get     = Product::all();
            $product = paginate($get, 6);
            $product->setPath('products');
        }

        $type = Type::whereSingkatan($slug)->first();

        $data = [
            'type'    => $type,
            'product' => $product
        ];

        $seoData = [
            'title'       => $type ? $type->nama . ' - ' . __('menu.product') : __('menu.product'),
            'description' => $type ? 'Jelajahi koleksi ' . $type->nama . ' berkualitas tinggi dari CodePoze. Source code siap pakai dengan dokumentasi lengkap.' : 'Jelajahi koleksi produk digital berkualitas tinggi dari CodePoze. Source code siap pakai dengan dokumentasi lengkap.',
            'keywords'    => 'codepoze products, ' . ($type ? strtolower($type->nama) : 'aplikasi') . ', source code, ready to use',
            'type'        => 'website'
        ];

        return Template::pages(__('menu.product'), 'product', 'view', $data, $seoData);
    }

    public function detail($slug, $id)
    {
        $product = Product::with([
            'toProductStack' => function ($query) {
                $query->orderBy('id_stack', 'asc');
            },
            'toProductPicture',
            'toPrice'
        ])->whereIdProduct($id)->firstOrFail();

        $type = Type::whereSingkatan($slug)->first();

        $data = [
            'type'    => $type,
            'product' => $product
        ];

        $seoData = [
            'title'       => $product->judul,
            'description' => strip_tags(substr($product->deskripsi, 0, 160)) . '...',
            'keywords'    => $product->judul . ', ' . ($type ? $type->nama : '') . ', source code, aplikasi',
            'image'       => asset_upload('picture/' . $product->gambar),
            'type'        => 'product'
        ];

        return Template::pages(__('menu.product'), 'product', 'detail', $data, $seoData);
    }
}
