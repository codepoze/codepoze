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
        $product_paid = Product::inRandomOrder()->without('toBased')->whereHas('toPrice', function ($query) {
            $query->whereJenis('paid');
        })->limit(3)->get();
        $product_free = Product::inRandomOrder()->without('toBased')->whereHas('toPrice', function ($query) {
            $query->whereJenis('free');
        })->limit(3)->get();
        $testimony = Testimony::inRandomOrder()->whereStatus('1')->limit(3)->get();

        $data = [
            'product_paid' => $product_paid,
            'product_free' => $product_free,
            'testimony'    => $testimony
        ];

        $seoData = [
            'title'       => __('menu.home'),
            'description' => 'CodePoze - Solusi Digital Terpercaya untuk Aplikasi Web, Mobile, dan Desktop. Dapatkan source code berkualitas dengan harga terjangkau.',
            'keywords'    => 'codepoze, web development, mobile app, source code, aplikasi web, aplikasi mobile, aplikasi desktop, laravel, flutter, react native',
            'image'       => asset_pages('images/codepoze.png'),
            'type'        => 'website'
        ];

        return Template::pages(__('menu.home'), 'home', 'view', $data, $seoData);
    }
}
