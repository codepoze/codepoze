<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStack extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'product_stack';
    // untuk default primary key
    protected $primaryKey = 'id_product_stack';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'id_product_stack',
        'id_product',
        'id_stack',
        'by_users',
    ];

    // untuk relasi ke tabel product
    public function toProduct()
    {
        return $this->belongsTo(Product::class, 'id_product', 'id_product');
    }

    // untuk relasi ke tabel stack
    public function toStack()
    {
        return $this->belongsTo(Stack::class, 'id_stack', 'id_stack');
    }
}
