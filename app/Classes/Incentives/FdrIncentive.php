<?php

namespace App\Classes\Incentives;

class FdrIncentive implements IncentiveCalculatable
{
  
    public function __construct() 
    {
		
    }

    public function calculate(IncentiveData $data)
	{
    	$incentiveAmount = $data->CURRENT_BALANCE*($data->INCENTIVE_RATE/100.00);
    	return $incentiveAmount;
    }


}