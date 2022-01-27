<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'image',
       
    ];

    
        /**
     * Get the Product  Id that owns the Images.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
