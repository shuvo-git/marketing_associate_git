<?php

namespace App\Classes\Incentives;

class IncentiveData
{
    /*************************************************
    AC No
    CUSTOMER ID
    AC OPEN DATE
    CURRENT BALANCE
    AVG BALANCE
    CATEGORY ####
    RM CODE
    **************************************************/
    public $AC_No;
    //public $CUSTOMER_ID;
    //public $AC_OPEN_DATE;
    public $CURRENT_BALANCE;
    //public $AVG_BALANCE;
    //public $CATEGORY  ;
    //public $RM_CODE;
    public $INCENTIVE_RATE;

    public function __construct(
        $AC_No,
        //$CUSTOMER_ID,
        //$AC_OPEN_DATE,
        $CURRENT_BALANCE,
        //$AVG_BALANCE,
        //$CATEGORY  ,
        //$RM_CODE,
        $INCENTIVE_RATE
    )
    {
        $this->AC_No            = $AC_No;
        //$this->CUSTOMER_ID      = $CUSTOMER_ID;
        //$this->AC_OPEN_DATE     = $AC_OPEN_DATE;
        $this->CURRENT_BALANCE  = $CURRENT_BALANCE;
        //$this->AVG_BALANCE      = $AVG_BALANCE;
        //$this->CATEGORY         = $CATEGORY  ;
        //$this->RM_CODE          = $RM_CODE;
        $this->INCENTIVE_RATE          = $INCENTIVE_RATE;
    }
}