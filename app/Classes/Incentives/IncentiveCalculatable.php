<?php

namespace App\Classes\Incentives;

interface IncentiveCalculatable
{
    /*************************************************
    AC No
    CUSTOMER ID
    AC OPEN DATE
    CURRENT BALANCE
    AVG BALANCE
    CATEGORY
    RM CODE
    **************************************************/
    public function calculate(IncentiveData $data);
}