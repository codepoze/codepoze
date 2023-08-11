<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'product';
    // untuk default primary key
    protected $primaryKey = 'id_product';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'id_product',
        'id_product_type',
        'by_users',
    ];

    // untuk relasi ke tabel product type
    public function toProductType()
    {
        return $this->belongsTo(ProductType::class, 'id_product_type', 'id_product_type');
    }

    // untuk relasi ke tabel product stack
    public function toProductStack()
    {
        return $this->hasMany(ProductStack::class, 'id_product', 'id_product');
    }

    // untuk relasi ke tabel product picture
    public function toProductPicture()
    {
        return $this->hasMany(ProductPicture::class, 'id_product', 'id_product');
    }
}
