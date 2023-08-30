<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Libraries\Template;

class SopController extends Controller
{
    public function index()
    {
        return Template::pages(__('menu.sop'), 'sop', 'view');
    }
}
