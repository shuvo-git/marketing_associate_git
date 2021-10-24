<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function index()
    {   
        
        $users = User::all();
        $pageInfo = [
            "title"=>"Users List",
            "route"=>"registration"
        ];
        if(Auth::user()->getRoleName->role_short_name!="admin")
            return redirect()->to('/')->with('msg-error','You are not permitted to view this page');
        return view('user.index',compact('users','pageInfo'));
        
    }

    public function create()
    {
        
            $pageInfo = [
                "title"=>"Register a new membership",
                "route"=>"registration"
            ];
            $roleList = $this->makeDD(DB::table('roles')->pluck('role_name','id'));
            $new_register = 1;
            return view('user.create',compact('new_register','roleList','pageInfo'));
        
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
    	$validator = Validator::make($inputs, array(
    		'name'=>'required',
    		'employee_id'=>['required','unique:users','digits:11'],
    		'email'=>'required|email',
    		'password'=>'required',
    		'retype_password'=>'required|same:password',
    		'image'=>'file|mimes:jpeg,png,jpg|max:2048',
            'agree_terms' => 'required'
    	));

        
        
    	if ($validator -> fails()) {
            return Redirect() -> back() -> withErrors($validator) -> withInput();
    	}
        
        // Image upload
        if ($request->hasFile('image')) 
        {
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images/user'), $imageName);
        } else {
            $imageName = 'placeholder.png';
        }
        

        unset($inputs['retype_password']);
        unset($inputs['agree_terms']);
        $inputs['image'] = $imageName;
        $inputs['password'] = Hash::make($request->password);

    	$br = new User();
        $br->fill($inputs)->save();

        session()->flash('message_type', 'success');
        session()->flash('message', 'New User Successfully Created');
    	return Redirect() -> to('registration'); 
    }

    public function edit($id)
    {
        
            $pageInfo = [
                "title"=>"User Edit",
                "route"=>"registration"
            ];
            $roleList = $this->makeDD(DB::table('roles')->pluck('role_name','id'));
            $branchList = $this->makeDD(DB::table('branch')->pluck('BR_NAME','T24_BR'));
            $new_register = 0;
            $User = User::where('id', $id)->first();
            return view('user.edit',compact('new_register','User','roleList','pageInfo','branchList'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $User = User::where('ID', $id)->first();
    	$inputs = $request->all();
    	$validator = Validator::make($inputs, array(
    		'name' => [ 'nullable','string', 'max:255'],
            'email' => ['nullable','string', 'email', 'max:255'],
            'password' => ['nullable', 'string', 'min:8'],
        	'employee_id'=>'nullable',
    		'image'=>'nullable|file|mimes:jpeg,png,jpg|max:2048'
    	));
        
    	if ($validator -> fails()) {
            return Redirect() -> back() -> withErrors($validator) -> withInput();
    	}

        if (Auth::check()) 
        {
            // Image upload
            if ($request->hasFile('image')) 
            {
                $imageName = time().'.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('images/user'), $imageName);
            }

            if(isset($request->image))
                $User->image = $imageName;

            if(isset($request->name))
                $User->name = $request->name;

            if(isset($request->email))
                $User->email = $request->email;

            if(isset($request->password))
                $User->password = Hash::make($request->password);

            if(isset($request->branch_id))
                $User->branch_id = $request->branch_id;

            if(isset($request->employee_id))
                $User->employee_id = $request->employee_id;

            if(isset($request->role_id))
                $User->role_id = $request->role_id;

            $User->save();

            //$inputs['password'] = Hash::make($request->password);
            //User::where('id', $id)->update($inputs);

            return Redirect() -> to('/') -> with('msg-success', 'User Successfully Updated');


        }
        else return Redirect() -> back() -> withErrors('email and password did not match.');
        
        
    }
}
