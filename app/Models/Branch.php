<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branch';

    public static function getCluster($value)
    {
        return Branch::where('T24_BR', $value)->first()->CLUSTER_ID;
    }
}
