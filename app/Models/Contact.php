<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'contact';
    // untuk default primary key
    protected $primaryKey = 'id_contact';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'id_contact',
        'nama',
        'email',
        'judul',
        'pesan',
    ];
}
