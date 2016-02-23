<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{
    //
    protected $guarded = ['id'];
    protected  $table = 'auteur';
    public $timestamps =false;
}
