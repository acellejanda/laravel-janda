<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
   use HasFactory;
    protected $table = 'purchase';
    protected $primaryKey = 'purchase_id';
    public $timestamps = false;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'purchase_product', 'purchase_id', 'code')
            ->withPivot('product_price', 'product_quantity', 'product_name');
    }
}