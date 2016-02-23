<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    //
    protected $guarded = ['id'];
    protected  $table = 'document';
    public $timestamps =true;
}
