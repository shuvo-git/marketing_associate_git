<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forward_log extends Model
{
    
    protected $table = 'forward_logs';
    protected $fillable = ['application_id','forward_from','forward_to','remarks','updated_by','level'];

    public function getBranchName()
    {
        return $this->belongsTo(Branch::class, 'forward_from', 'T24_BR');
    }
    public function getClusterName()
    {
        return $this->belongsTo(Cluster::class, 'forward_from', 'id');
    }
}
