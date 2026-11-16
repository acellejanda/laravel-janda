<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
     use HasFactory;
     
        protected $table = 'product';      
        protected $primaryKey = 'code';
        public $incrementing = false;
        protected $keyType = 'string';
        public $timestamps = false;        

        protected $fillable = [
            'code', 'name', 'description', 'manufacturer',
            'photo', 'price', 'cost', 'inventory_quantity',
        ];
}