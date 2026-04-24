<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Libraries\Template;

class SopController extends Controller
{
    public function index()
    {
        $seoData = [
            'title'       => __('menu.sop'),
            'description' => 'Standar Operasional Prosedur (SOP) CodePoze. Baca ketentuan dan prosedur dalam menggunakan produk dan layanan kami.',
            'keywords'    => 'sop codepoze, standard operating procedure, ketentuan layanan, terms of service',
            'type'        => 'website'
        ];

        return Template::pages(__('menu.sop'), 'sop', 'view', [], $seoData);
    }
}
