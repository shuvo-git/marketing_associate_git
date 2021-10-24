<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'], //, 'unique:users'
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        	'employee_id'=>['required','unique:users','regex:/[0-9]{11}(R|B|C)?/'],
        	'role_id'=>'required',
        	'branch_id'=>'required',
    		'image'=>'file|mimes:jpeg,png,jpg|max:2048',
            'agree_terms' => 'required'
        ],[
            'employee_id.regex'=>'Employee ID must start with 11 digits and may end with character R/B/C'
        ]);
    }

    public function showRegistrationForm()
    {
        $roleList = $this->makeDD(DB::table('roles')->pluck('role_name','id'),"Role");
        $branchList = $this->makeDD(DB::table('branch')->pluck('BR_NAME','T24_BR'),"Branch");
        $new_register = 1;
        if(Auth::user()->getRoleName->role_short_name!="admin")
            return redirect()->to('/')->with('msg-error','You are not permitted to view this page');
        return view('auth.register', compact('roleList','new_register','branchList'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Image upload
        if (request()->hasFile('image')) 
        {
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images/user'), $imageName);
        } else {
            $imageName = 'placeholder.png';
        }
        return User::create([
            'name' => $data['name'],
            'employee_id' => $data['employee_id'],
            'username' => $data['employee_id'],
            'role_id' => $data['role_id'],
            'branch_id' => $data['branch_id'],
            'email' => $data['email'],
            'image' => $imageName,
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //$this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath())->with('msg-success',"Registered Succesfully.");
    }
}
