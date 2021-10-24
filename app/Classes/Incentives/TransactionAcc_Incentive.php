<?php

namespace App\Classes\Incentives;

class TransactionAcc_Incentive implements IncentiveCalculatable
{
  
    public function __construct() 
    {
		
    }

    public function calculate(IncentiveData $data)
	{
        $incentiveAmount = 100.00;
    	return $incentiveAmount;
    }


}