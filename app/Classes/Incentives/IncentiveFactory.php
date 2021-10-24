<?php

namespace App\Classes\Incentives;

use App\Classes\Incentives\IncentiveCalculatable;
use App\Models\IncentiveCategory;

class IncentiveFactory
{
    public function __construct() 
    {}

    public function getIncentive($IncentiveCategory) : IncentiveCalculatable
    {
        $IncentiveCategories = IncentiveCategory::pluck('category_name');
        
        foreach ($IncentiveCategories as $case) 
        {
            if($IncentiveCategory===$case)
            {
                
                $classname = __NAMESPACE__ . '\\' . $case;
                return new $classname();
            }
        }
        return null;
    }
}