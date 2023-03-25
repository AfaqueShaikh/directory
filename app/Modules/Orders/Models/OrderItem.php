<?php

namespace App\Modules\Orders\Models;

use App\Modules\Products\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    public $timestamps = true;

    protected $with = [
        'product'
    ];
    /**
     * Product relation.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
