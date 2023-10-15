<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectStack extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'project_stack';
    // untuk default primary key
    protected $primaryKey = 'id_project_stack';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'id_project_stack',
        'id_project',
        'id_stack',
        'by_users',
    ];

    // untuk relasi
    protected  $with = ['toStack'];

    // untuk relasi ke project
    public function toProject()
    {
        return $this->belongsTo(Project::class, 'id_project', 'id_project');
    }

    // untuk relasi ke stack
    public function toStack()
    {
        return $this->belongsTo(Stack::class, 'id_stack', 'id_stack');
    }
}
