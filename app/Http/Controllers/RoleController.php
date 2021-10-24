<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class RoleController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        // $this->user =  \Auth::user();
    }
    

    public function index()
    {
        $roles = Role::all();
        $pageInfo = [
            "title"=>"Roles List",
            "route"=>"role"
        ];
        //if($this->user)
        return view('role.index',compact('roles') )->with('pageInfo',$pageInfo);
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
            'pageTitle' => 'Create Role',
            'route' => 'role',
        ];

        return view('role.create')->with('pageInfo',$pageInfo);
    
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
    		'role_name'=>'required',
    		'role_short_name'=>'required|max:30'
    	));
        
    	if ($validator -> fails()) {
            return Redirect() -> back() -> withErrors($validator) -> withInput();
    	}

        $inputs['user_by'] = Auth::user()->id;

    	$br = new Role();
        $br->fill($inputs)->save();
        
        return Redirect() -> to('role')->with('msg-success','New Role Successfully Created'); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $Role = Role::where('id', $id)->first();
        
        $pageInfo = [
            'pageTitle' => 'Edit Role',
            'route' => 'role',
        ];
        return view('role.edit', compact('Role'))->with('pageInfo',$pageInfo);
        
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
        
        $User = Role::findOrFail($id);
    	$inputs = $request->all();
    	$validator = Validator::make($inputs, array(
    		'role_name'=>'required',
            'role_short_name'=>'required|max:30'
    	));
        
    	if ($validator -> fails()) {
            return Redirect() -> back() -> withErrors($validator) -> withInput();
    	}

        $inputs['user_by'] = Auth::user()->id;


        $roleInfo["role_name"] = $request->role_name;
        $roleInfo["role_short_name"] = $request->role_short_name;
        $roleInfo["user_by"] = $inputs['user_by'];

        Role::where('id', $id)->update($roleInfo);

        return Redirect() -> to('role')->with('msg-success','Role Successfully Updated');
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
           
            Role::destroy($id);
            return Redirect() -> to('role')-> with('msg-success', 'Role Successfully Deleted.');
    	}
    	catch (\Exception $e) {
            return Redirect() -> to('Product')-> to('role')
                -> with('msg-error', 'This item is already in use and Can not be deleted.'); 
    	}
    }
    
}
