<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'visitors';
    // untuk default id
    protected $primaryKey = 'id_visitors';
    // untuk fillable
    protected $fillable = [
        'id_visitors',
        'ip',
        'city',
        'country',
        'region',
        'city',
        'loc',
        'org',
        'timezone',
    ];
}
