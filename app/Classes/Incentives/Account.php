<?php

namespace App\Classes\Incentives;

abstract class Account
{
	public $accountNo;
	public $customerId;
	public $accountType;
	public $productCategory;
	public $accountOpenDate;

	public function __construct($accountNo,$customerId,$accountType,$productCategory,$accountOpenDate) 
	{
		$this->accountNo        = $accountNo;
		$this->customerId       = $customerId;
		$this->accountType      = $accountType;
		$this->productCategory  = $productCategory;
		$this->accountOpenDate  = $accountOpenDate;
	}
  	//public abstract function intro() : string;
}


/*
INSERT INTO `incentive_fdr_confs`(`dipositor_type`, `months`, `percentage`, `deposit_range`) VALUES (1,3,0.50,1000000);
INSERT INTO `incentive_fdr_confs`(`dipositor_type`, `months`, `percentage`, `deposit_range`) VALUES (1,6,0.75,1000000);
INSERT INTO `incentive_fdr_confs`(`dipositor_type`, `months`, `percentage`, `deposit_range`) VALUES (1,12,1.00,1000000);

INSERT INTO `incentive_fdr_confs`(`dipositor_type`, `months`, `percentage`, `deposit_range`) VALUES (2,3,0.50,10000000);
INSERT INTO `incentive_fdr_confs`(`dipositor_type`, `months`, `percentage`, `deposit_range`) VALUES (2,6,1.00,10000000);
INSERT INTO `incentive_fdr_confs`(`dipositor_type`, `months`, `percentage`, `deposit_range`) VALUES (2,12,1.50,10000000);

INSERT INTO `incentive_fdr_confs`(`dipositor_type`, `months`, `percentage`, `deposit_range`) VALUES (3,3,0.50,50000000);
INSERT INTO `incentive_fdr_confs`(`dipositor_type`, `months`, `percentage`, `deposit_range`) VALUES (3,6,1.50,50000000);
INSERT INTO `incentive_fdr_confs`(`dipositor_type`, `months`, `percentage`, `deposit_range`) VALUES (3,12,1.75,50000000);
*/
