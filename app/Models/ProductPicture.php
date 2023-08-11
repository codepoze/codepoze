<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPicture extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'product_picture';
    // untuk default primary key
    protected $primaryKey = 'id_product_picture';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'id_product_picture',
        'id_product',
        'picture',
        'by_users',
    ];

    // untuk relasi ke tabel product
    public function toProduct()
    {
        return $this->belongsTo(Product::class, 'id_product', 'id_product');
    }
}
