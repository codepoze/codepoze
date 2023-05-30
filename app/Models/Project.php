<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'projects';
    // untuk default primary key
    protected $primaryKey = 'id_project';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'id_based',
        'id_type',
        'judul',
        'deskripsi',
        'link_demo',
        'link_github',
        'gambar',
        'by_users',
    ];

    // untuk relasi ke based
    public function toBased()
    {
        return $this->belongsTo(Based::class, 'id_based', 'id_based');
    }

    // untuk relasi ke type
    public function toType()
    {
        return $this->belongsTo(Type::class, 'id_type', 'id_type');
    }
}
