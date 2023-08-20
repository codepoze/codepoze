<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'testimonies';
    // untuk default primary key
    protected $primaryKey = 'id_testimonies';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'id_testimonies',
        'first_name',
        'last_name',
        'email',
        'phone',
        'message',
        'status',
    ];
}
