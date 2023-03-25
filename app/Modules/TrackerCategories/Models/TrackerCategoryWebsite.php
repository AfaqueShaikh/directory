<?php

namespace App\Modules\TrackerCategories\Models;

use App\Modules\Products\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

class TrackerCategoryWebsite extends Model
{
    use HasFactory;

    protected $table = 'category_tracker_website';

    public $timestamps = true;

    // protected $with = [
    //     'parents'
    // ];

    /**
     * Translation relation.
     */
    public function trans()
    {
        return $this->hasOne(CategoryTrans::class, 'category_id')
            ->where('lang', Lang::getlocale())
            ->select(['id', 'category_id', 'name', 'description', 'img']);
    }

    /**
     * Get the parent name for the model.
     * @return string
     */

    public function parents()
    {
        return $this->hasMany(Category::class,'id','parent_id') ;
    }

    /**
     * Get the children for the model.
     * @return string
     */

    public function child()
    {
        return $this->hasMany(Category::class, 'parent_id')
            ->where('active',1);
    }

    // recursive, loads all descendants
    public function children()
    {
        return $this->child()->with('children');
    }

    /**
     * Get the parent name for the model.
     * @return string
     */

    public function products()
    {
        return $this->hasMany(Product::class,'category_id') ;
    }

}
