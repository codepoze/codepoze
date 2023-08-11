<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Based extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'based';
    // untuk default primary key
    protected $primaryKey = 'id_based';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'id_based',
        'nama',
        'by_users',
    ];
}
