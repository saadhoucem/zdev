<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //
    protected $guarded = ['id'];
    protected  $table = 'categories';
    public $timestamps =true;
}
