<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Incentives\IncentiveFactory;
use App\Classes\Incentives\IncentiveData;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Application;

class IncentiveCalculator extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->user =  \Auth::user();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $pageInfo = [
            'pageTitle' => 'Incentive Calculation',
            'route' => 'incentive_calculation',
        ];

        $categoryList = ['FDR','CASA / SND','Transaction Account'];

        return view('incentive_cal.create', compact('categoryList') )->with('pageInfo',$pageInfo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calc(Request $request)
    {   
        $inputs = $request->all();
        $inFactory = new IncentiveFactory();

        $res = [];
        foreach ($inputs['category'] as $key => $cat) 
        {
            if($cat==0)
                $incentive_category = "FdrIncentive";
            else if($cat==1)
                $incentive_category = "Casa_or_snd_Incentive";
            else $incentive_category = "TransactionAcc_Incentive";

            $incentive = $inFactory->getIncentive($incentive_category);

            $data = new IncentiveData(
                $inputs['acc'][$key],
                $inputs['amount'][$key]? $inputs['amount'][$key]:null,
                $inputs['rate'][$key]?  $inputs['rate'][$key]:null
            );

            $res[]=$incentive->calculate($data);
        }
        return $res;
    }

    
    
    public function test()
    {
        $br = new Application();
        dd($br->createMarketingAssociateId("BD0010012") );
        /*$inputs = $request->all();
        $inFactory = new IncentiveFactory();

        if($inputs['category']==1)
            $incentive_category = "FdrIncentive";
        else if($inputs['category']==2)
            $incentive_category = "Casa_or_snd_Incentive";
        else $incentive_category = "TransactionAcc_Incentive";

        $incentive = $inFactory->getIncentive($incentive_category);

        $data = new IncentiveData(
            $inputs['acc'],
            isEmpty($inputs['amount'])? null:$inputs['amount'],
            isEmpty($inputs['rate'])?  null:$inputs['rate']
        );

        echo $incentive->calculate($data);*/
    }
}
