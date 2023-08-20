<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'social_media';
    // untuk default primary key
    protected $primaryKey = 'id_social_media';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'id_social_media',
        'nama',
        'icon',
        'link',
        'by_users',
    ];
}
