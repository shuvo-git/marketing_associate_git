<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $table = "roles";
    protected $guarded = ['id'];

    public static function getRoleShortName($value)
    {
        return Role::where('id', $value)->first()->role_short_name;
    }
}
