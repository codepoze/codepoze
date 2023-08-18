<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Libraries\Template;

class SopController extends Controller
{
    public function index()
    {
        return Template::pages('Service Policy', 'sop', 'view');
    }
}
