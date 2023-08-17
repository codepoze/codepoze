<?php

/**
 * Laravel Template Library
 *
 * Create template format in Laravel
 *
 * @packge     Laravel
 * @subpackage Libraries
 * @category   Libraries
 * @author     Alan Saputra Lengkoan
 * @license    MIT License
 */

namespace App\Libraries;

use App\Models\Type;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Support\Facades\Route;

class Template
{
    // untuk load view
    public static function load($role, $title, $module, $view, array $data = [])
    {
        // untuk judul halaman
        $data['title'] = $title;
        // untuk breadcrumb
        $data['breadcrumb'] = Breadcrumbs::render(Route::currentRouteName());

        return view("{$role}/{$module}/{$view}", $data);
    }

    // untuk load pages
    public static function pages($title, $module, $view, array $data = [])
    {
        // untuk judul halaman
        $data['title'] = $title;
        // untuk breadcrumb
        $data['breadcrumb'] = Breadcrumbs::render(Route::currentRouteName());
        // untuk produk
        $data['products'] = Type::all();

        return view("pages/{$module}/{$view}", $data);
    }
}
