<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

use App\Models\Districts;
use App\Models\Divisions;
use App\Models\Bank;
use App\Models\Branch;
use App\Models\User;

class ApplicationDeclined extends Model
{
    protected $table = "applications_declined";
    protected $guarded = ['id'];

    public function getDob($value)
    {
        return Carbon::parse($value)->format('d M, Y');
    }

    public function getDistrictPre()
    {
        return $this->belongsTo(Districts::class, 'pre_district', 'ID');
    }

    public function getDivisionPre()
    {
        return $this->belongsTo(Divisions::class, 'pre_division', 'ID');
    }

    public function getDistrictPer()
    {
        return $this->belongsTo(Districts::class, 'per_district', 'ID');
    }

    public function getDivisionPer()
    {
        return $this->belongsTo(Divisions::class, 'per_division', 'ID');
    }

    public function getBankName()
    {
        return $this->belongsTo(Bank::class, 'bank_name', 'id');
    }

    public function getPreferredBranchName()
    {
        return $this->belongsTo(Branch::class, 'preferred_branch', 'T24_BR');
    }
    public function getUser()
    {
        return $this->belongsTo(User::class, 'rm_id', 'id');
    }

    public function getUserUpdatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function getCluster($cluster_id)
    {
        return Cluster::where('id',$cluster_id)->first()->cluster_name;
    }



    public function logs()
    {
        return $this->hasOne('App\Models\Forward_log','application_id','application_id')->latest();
    }

    public function getDateTime($value)
    {
        $d = Carbon::createFromFormat('Y-m-d H:i:s', $value, 'UTC')
            ->setTimezone('Asia/Dhaka')
            ->format('d M, Y h:i a');
        return $d;
    }
}
