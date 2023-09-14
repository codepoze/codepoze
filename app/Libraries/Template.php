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

use Illuminate\Support\Facades\DB;

class Template
{
    // untuk load view
    public static function load($role, $title, $module, $view, array $data = [])
    {
        // untuk judul halaman
        $data['title'] = $title;

        return view("{$role}/{$module}/{$view}", $data);
    }

    // untuk load pages
    public static function pages($title, $module, $view, array $data = [])
    {
        // untuk judul halaman
        $data['title'] = $title;
        // untuk produk
        $data['products'] = DB::select("SELECT t.nama, t.singkatan, IFNULL( a.jumlah, 0) AS jumlah FROM type AS t LEFT JOIN( SELECT p.id_type, COUNT(*) AS jumlah FROM product AS p GROUP BY p.id_type) AS a ON a.id_type = t.id_type ORDER BY IFNULL( a.jumlah, 0) DESC");

        return view("pages/{$module}/{$view}", $data);
    }
}
