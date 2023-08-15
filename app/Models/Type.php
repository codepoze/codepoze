<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'type';
    // untuk default primary key
    protected $primaryKey = 'id_type';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'id_type',
        'nama',
        'singkatan',
        'by_users',
    ];
}
