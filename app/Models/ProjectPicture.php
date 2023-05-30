<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectPicture extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'project_pictures';
    // untuk default primary key
    protected $primaryKey = 'id_project_picture';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'id_project',
        'picture',
        'by_users',
    ];

    // untuk relasi ke project
    public function toProject()
    {
        return $this->belongsTo(Project::class, 'id_project', 'id_project');
    }
}
