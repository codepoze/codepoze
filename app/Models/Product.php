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
        'id_type',
        'id_based',
        'id_price',
        'judul',
        'gambar',
        'deskripsi',
        'link_demo',
        'link_github',
        'by_users',
    ];
    // untuk relasi
    protected  $with = ['toType', 'toBased', 'toPrice', 'toProductStack', 'toProductPicture'];

    // untuk relasi ke tabel type
    public function toType()
    {
        return $this->belongsTo(Type::class, 'id_type', 'id_type');
    }

    // untuk relasi ke tabel based
    public function toBased()
    {
        return $this->belongsTo(Based::class, 'id_based', 'id_based');
    }

    // untuk relasi ke tabel price
    public function toPrice()
    {
        return $this->belongsTo(Price::class, 'id_price', 'id_price');
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
