<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stack extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'stack';
    // untuk default primary key
    protected $primaryKey = 'id_stack';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'id_stack',
        'nama',
        'icon',
        'by_users',
    ];
}
