<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\IncentiveCategory;
use App\Classes\Incentives\IncentiveData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Classes\Incentives\IncentiveFactory;


class IncentiveCategoryController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        // $this->user =  \Auth::user();
    }
    

    public function index()
    {
        $incentiveCategories = IncentiveCategory::all();
        $pageInfo = [
            "title"=>"Incentive Category List",
            "route"=>"incentive_category"
        ];
        //if($this->user)
        return view('incentive_category.index',compact('incentiveCategories') )->with('pageInfo',$pageInfo);
        // else return Redirect() -> to('auth');
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $pageInfo = [
            'pageTitle' => 'Create Incentive Category',
            'route' => 'incentive_category',
        ];

        return view('incentive_category.create')->with('pageInfo',$pageInfo);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $inputs = $request->all();
    	$validator = Validator::make($inputs, array(
    		'category_name'=>'required|max:15'
    	));
        
    	if ($validator -> fails()) {
            return Redirect() -> back() -> withErrors($validator) -> withInput();
    	}

        //$inputs['user_by'] = Auth::user()->id;

    	$br = new IncentiveCategory();
        $br->fill($inputs)->save();
        
        return Redirect() -> to('incentive_category')->with('msg-success','New Incentive Category Successfully Created'); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $IncentiveCategory = IncentiveCategory::where('id', $id)->first();
        
        $pageInfo = [
            'pageTitle' => 'Edit Incentive Category',
            'route'     => 'incentive_category',
        ];
        return view('incentive_category.edit', compact('IncentiveCategory'))->with('pageInfo',$pageInfo);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $User = IncentiveCategory::findOrFail($id);
    	$inputs = $request->all();
    	$validator = Validator::make($inputs, array(
            'category_name'=>'required|max:30'
    	));
        
    	if ($validator -> fails()) {
            return Redirect() -> back() -> withErrors($validator) -> withInput();
    	}

        //$inputs['user_by'] = Auth::user()->id;


        $IncentiveCategoryInfo["category_name"] = $request->category_name;

        IncentiveCategory::where('id', $id)->update($IncentiveCategoryInfo);

        return Redirect() -> to('incentive_category')->with('msg-success','Incentive Category Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	try {
           
            IncentiveCategory::destroy($id);
            return Redirect() -> to('incentive_category')-> with('msg-success', 'Incentive Category Successfully Deleted.');
    	}
    	catch (\Exception $e) {
            return Redirect() -> to('incentive_category')
                -> with('msg-error', 'This item is already in use and Can not be deleted.'); 
    	}
    }


    
    
}
