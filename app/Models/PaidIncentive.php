<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaidIncentive extends Model
{
    protected $table = 'paid_incentives';
    protected $guarded = ['id'];

    function getPaidDetails()
    {
        return $this->hasMany(PaidIncentiveDetails::class, 'paid_inc_id');
    }
}
