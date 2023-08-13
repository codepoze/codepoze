<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'price';
    // untuk default primary key
    protected $primaryKey = 'id_price';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'id_price',
        'jenis',
        'nilai_normal',
        'diskon',
        'nilai_diskon',
        'by_users',
    ];
}
