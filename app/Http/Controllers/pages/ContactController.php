<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return Template::pages('Contact Us', 'contact', 'view');
    }
}
