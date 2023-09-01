<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'notification';
    // untuk default primary key
    protected $primaryKey = 'id_notification';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'id_notification',
        'id',
        'route',
        'text',
        'status',
    ];
}
