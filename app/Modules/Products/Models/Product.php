<?php

namespace App\Modules\Products\Models;

use App\Modules\Categories\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    public $timestamps = true;

    protected $with = [
        'trans',
        'category'
    ];

    /**
     * Translation relation.
     */
    public function trans()
    {
        return $this->hasOne(ProductTrans::class, 'product_id')
            ->where('lang', Lang::getlocale());
    }

    /**
     * Category relation.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
