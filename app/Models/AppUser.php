<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AppUser extends Model
{
    use HasFactory;

    protected $table = 'app_users';
    public $timestamps = true;

    // protected $with = [
    //     'users_relations'
    // ];

    /**
     * Translation relation.
     */
    // public function relations()
    // {
    //     return $this->hasMany(UserRelation::class, 'user_id');
    // }



}
