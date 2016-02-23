<?php
/**
 * Created by PhpStorm.
 * User: ThamerBelfki
 * Date: 21/02/2016
 * Time: 05:14
 */

namespace App;


use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $guarded = ['id'];
    protected  $table = 'roles';
    public $timestamps =false;
}