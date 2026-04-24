<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Libraries\Template;

class AboutController extends Controller
{
    public function index()
    {
        $seoData = [
            'title'       => __('menu.about'),
            'description' => 'Tentang CodePoze - Platform penyedia source code dan solusi digital terpercaya. Kami menyediakan aplikasi web, mobile, dan desktop berkualitas dengan harga terjangkau.',
            'keywords'    => 'tentang codepoze, about codepoze, profil perusahaan, digital solutions, software house',
            'type'        => 'website'
        ];

        return Template::pages(__('menu.about'), 'about', 'view', [], $seoData);
    }
}
