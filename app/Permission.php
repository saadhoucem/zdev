<?php
/**
 * Created by PhpStorm.
 * User: ThamerBelfki
 * Date: 21/02/2016
 * Time: 05:29
 */

namespace App;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{

    protected $guarded = ['id'];
    protected  $table = 'permissions';
    public $timestamps =false;
}