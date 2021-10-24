<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

use App\Models\User;
use App\Models\Branch;

class ClaimIncentive extends Model
{
    protected $table= "claim_incentives";
    protected $guarded = ['id'];

    public function getDateTime($value)
    {
        $d = Carbon::createFromFormat('Y-m-d H:i:s', $value, 'UTC')
            ->setTimezone('Asia/Dhaka')
            ->format('d M, Y h:i a');
        return $d;
    }
    public function getDate($value)
    {
        $d = Carbon::createFromFormat('Y-m-d', $value, 'UTC')
            ->setTimezone('Asia/Dhaka')
            ->format('d M, Y');
        return $d;
    }

    public function getUserRM()
    {
        return $this->belongsTo(User::class, 'rm_id', 'id');
    }

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getBranch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'T24_BR');
    }

    public function getPaidIncentive(){
        return $this->hasOne(PaidIncentive::class, 'claim_id');
    }
}
