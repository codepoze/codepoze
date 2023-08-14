<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'project';
    // untuk default primary key
    protected $primaryKey = 'id_project';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'id_project',
        'id_based',
        'judul',
        'gambar',
        'deskripsi',
        'link_demo',
        'link_github',
        'by_users',
    ];

    // untuk relasi ke based
    public function toBased()
    {
        return $this->belongsTo(Based::class, 'id_based', 'id_based');
    }

    // untuk relasi ke project stack
    public function toProjectStack()
    {
        return $this->hasMany(ProjectStack::class, 'id_project', 'id_project');
    }

    // untuk relasi ke project picture
    public function toProjectPicture()
    {
        return $this->hasMany(ProjectPictures::class, 'id_project', 'id_project');
    }
}
