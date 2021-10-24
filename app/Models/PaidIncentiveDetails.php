<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaidIncentiveDetails extends Model
{
    protected $table = 'paid_incentive_details';
    protected $guarded = ['id'];

    public function getCategory($val){
        $categoryList = ['FDR','CASA / SND','Transaction Account'];
        return $categoryList[$val];
    }

}
