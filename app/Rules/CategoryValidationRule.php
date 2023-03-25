<?php

namespace App\Rules;
use DB;

use Illuminate\Contracts\Validation\Rule;

class CategoryValidationRule implements Rule
{
    public $parent_id, $category_id;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($parent_id, $category_id)
    {
        $this->parent_id = $parent_id;
        $this->category_id = $category_id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if($this->category_id){
            $count = DB::table('categories')
                ->join('categories_trans', 'categories_trans.category_id', '=', 'categories.id')
                ->where([
                    ['categories.id', '!=', $this->category_id],
                    ['categories_trans.name', '=', $value],
                    ['categories.parent_id', '=', $this->parent_id]
                ])->count();
        }else{
            if($this->parent_id){
                $count = DB::table('categories')
                    ->join('categories_trans', 'categories_trans.category_id', '=', 'categories.id')
                    ->where([
                        ['categories_trans.name', '=', $value],
                        ['categories.parent_id', '=', $this->parent_id]
                    ])->count();
            }else{
                $count = DB::table('categories')
                    ->join('categories_trans', 'categories_trans.category_id', '=', 'categories.id')
                    ->where([
                        ['categories_trans.name', '=', $value]
                    ])->count();
            }
        }

        return !$count;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This category name already exists, please choose another one.';
    }
}
