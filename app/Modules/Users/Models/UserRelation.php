<?php

namespace App\Modules\Users\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class UserRelation extends Model
{
    use HasFactory;

    protected $table = 'users_relations';
    public $timestamps = true;

}
