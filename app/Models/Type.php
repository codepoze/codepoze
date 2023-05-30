<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'types';
    // untuk default primary key
    protected $primaryKey = 'id_type';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'nama',
        'by_users',
    ];
}
