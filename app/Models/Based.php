<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Based extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'baseds';
    // untuk default primary key
    protected $primaryKey = 'id_based';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'nama',
        'by_users',
    ];
}
