<?php

namespace App\Http\Controllers;

// PHP Mailer 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;


use App\Models\Application;
use App\Models\ApplicationDeclined;
use App\Models\Branch;
use App\Models\Forward_log;
use App\Models\Role;
use App\Models\User;

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class ApplicationController extends Controller
{
    public function index()
    {

        $genderList = ['Male','Female','Others'];
        $statusList = ['Inactive','Active'];
        $maritalStatusList = ['Single','Married','Others'];
        $bankList = $this->makeDD(DB::table('banks')->pluck('BANK_NAME','id'));
        $branchList = $this->makeDD(DB::table('branch')->pluck('BR_NAME','T24_BR'));
        $divisionList = $this->makeDD(DB::table('divisions')->pluck('NAME','ID'));
        $districtList = $this->makeDD(DB::table('districts')->pluck('NAME','ID'));

        $pageInfo = [
            "title"=>"Application",
            "route"=>"application"
        ];

        return view('application.create',compact('genderList','statusList','maritalStatusList',
        'branchList','divisionList','districtList','pageInfo','bankList') );
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        
        if( $request->has('checkSameAsPresent') )
        {
            $inputs['per_road_or_village'] = $request->input('pre_road_or_village');
            $inputs['per_post_office'] = $request->input('pre_post_office');
            $inputs['per_division'] = $request->input('pre_division');
            $inputs['per_district'] = $request->input('pre_district');
        }

        $niceNames = [
            'pre_road_or_village' => 'Present Road or Village Adreess',
            'pre_post_office' => 'Present Post Office',
            'pre_years' => 'Presently Staying ',
            'pre_division' => 'Division',
            'pre_district' => 'District',

            'per_road_or_village' => 'Permanent Road or Village Adreess',
            'per_post_office' => 'Permanent Post Office',
            'per_division' => 'Division',
            'per_district' => 'District',

            'cell' => 'Cell No.',
            'cell_years' => 'Cell Using(in years)',
            'social' => 'FB / LinkedIn / Instagram ID',
            'social_years' => 'How long been using this ID ',
            'edu_institute' => 'education institute',
            'cgpa_division_class' => 'cgpa / division / class',
            'name_board_university' => 'Name of Board / University',

            'spouse_dob' => 'spouse date of birth',
            'fathers_dob' => 'fathers date of birth',
            'mothers_dob' => 'mothers date of birth',

            'bankruptcy_details'=>'Specify Details',
            'borrower_details'=>'Specify Details',
            'convicted_by_court_details'=>'Specify Details',
            'trade_union_details'=>'Specify Details',
            'member_details'=>'Specify Details',



        ];
    	$validator = Validator::make($inputs, array(
            'name'                  => 'required|min:1|max:100|alpha_spaces',
            'dob'                   => 'required|date',
            'passport_no'           => ['required_without_all:nid_no,birth_certificate_no','unique:applications,passport_no','alpha_num','min:10','max:15','nullable'],
            'nid_no'                => ['required_without_all:passport_no,birth_certificate_no','unique:applications,nid_no','nid_length','nullable'],
            'birth_certificate_no'  => ['required_without_all:passport_no,nid_no','unique:applications,birth_certificate_no','digits:17','nullable'],
            'place_of_birth'        =>'required|alpha',

            'nid_image'                 =>'required_with:nid_no|file|mimes:jpeg,png,jpg|max:5120|nullable',
            'passport_image'            =>'required_with:passport_no|file|mimes:jpeg,png,jpg|max:5120|nullable',
            'birth_certificate_image'   =>'required_with:birth_certificate_no|file|mimes:jpeg,png,jpg|max:5120|nullable',
            
            'applicant_image'   =>'required|file|mimes:jpeg,png,jpg|max:5120',
            'signature_image'   =>'required|file|mimes:jpeg,png,jpg|max:5120',
            'preferred_branch'  => 'required',

            'pre_road_or_village'=>'required',
            'pre_post_office'=>'required',
            'pre_years'=>'required|integer',
            'pre_division'  => 'required',
            'pre_district'  => 'required',

            'per_road_or_village'=>'required',
            'per_post_office'=>'required',
            'per_division'  => 'required',
            'per_district'  => 'required',

            'cell' => ['required','digits:11','unique:applications,cell','regex:/(01)[0-9]{9}/'],
            'cell_years'=>'required|integer',
            'email'=>['required','email','unique:users,email'],
            'tin'=>'nullable|digits:9',
            'social'=>['nullable','max:100','regex:/(http\:\/\/|https:\/\/)?(www.)?(facebook.com\/|linkedin.com\/in\/|instagram.com\/)(.){1,80}/'],
            'social_years'=>'nullable|required_with:social|digits_between:1,2',
            'occupation'=>'nullable|alpha_spaces|max:100',
            'bank_acc_no'=>'nullable|digits:13',
            'bank_name'=>'nullable|max:50',
            'branch'=>'nullable|max:100',

            'edu_institute'=>'nullable|max:100',
            'name_of_exam'=>'nullable|max:50',
            'year_of_passing'=>'nullable|digits:4',
            'cgpa_division_class'=>'nullable|max:6',
            'name_board_university'=>'nullable|max:100',
            'professional_degree'=>'nullable|max:100',

            'spouse_name'=>'nullable|max:100',
            'spouse_dob'=>'nullable|date',
            'spouse_contact'=>'nullable|digits:11|regex:/(01)[0-9]{9}/',
            'fathers_name'=>'required|max:100',
            'fathers_dob'=>'nullable|date',
            'fathers_contact'=>'nullable|digits:11|regex:/(01)[0-9]{9}/',
            'mothers_name'=>'required|max:100',
            'mothers_dob'=>'nullable|date',
            'mothers_contact'=>'nullable|digits:11|regex:/(01)[0-9]{9}/',

            'primary_contact_name'=>'required|max:100',
            'primary_contact_relationship'=>'required|max:100',
            'primary_contact_phn1'=>'required|digits:11|regex:/(01)[0-9]{9}/',
            'primary_contact_phn2'=>'nullable|digits:11|regex:/(01)[0-9]{9}/',
            'secondary_contact_name'=>'nullable|max:100',
            'secondary_contact_relationship'=>'nullable|max:100',
            'secondary_contact_phn1'=>'nullable|digits:11|regex:/(01)[0-9]{9}/',
            'secondary_contact_phn2'=>'nullable|digits:11|regex:/(01)[0-9]{9}/',
            'employee_reference_name'=>'nullable|max:100',
            'employee_reference_relationship'=>'nullable|max:100',
            'employee_reference_employee_id'=>'nullable|digits:11',
            'employee_reference_contact'=>'nullable|digits:11|regex:/(01)[0-9]{9}/',

            'bankruptcy_details'=>'required_if:bankruptcy,1|max:150',
            'borrower_details'=>'required_if:borrower,1|max:150',
            'convicted_by_court_details'=>'required_if:convicted_by_court,1|max:150',
            'trade_union_details'=>'required_if:trade_union,1|max:150',
            'member_details'=>'required_if:member,1required_if:bankruptcy,1|max:150',


    	),
        array(
            'passport_no.required_without_all' => 'The Passport field is required when NID field and Birth Certificate field not present.',
            'nid_no.required_without_all' => 'The NID field is required when Passport field and Birth Certificate field not present.',
            'birth_certificate_no.required_without_all' => 'The Birth Certificate field is required when NID field Passport field not present.',
            'nid_no.nid_length' => 'NID Length must be of 10 or 13 or 17 digits only.',
            'name.alpha_spaces' =>'Name will contain only alphabets, Space, - and . characters.',
            'occupation.alpha_spaces' =>'Occupation will contain only alphabets and characters.',
            'pre_years.integer' => 'The Presently Staying field must be a number.',
            'cell_years.integer' => 'The Cell Using(in years) field must be a number.',
            'social.regex' => 'Must be a valid social ID.',
            'social_years.integer' => 'The How long been using this ID? field must be a number.',
            'bankruptcy_details.required_if' => 'This field is required when Bankruptcy field is selected `yes`',
            'borrower_details.required_if' => 'This field is required when Default Borrower field is selected `yes`',
            'convicted_by_court_details.required_if' => 'This field is required when Convicted by Court field is selected `yes`',
            'trade_union_details.required_if' => 'This field is required when `involved with any trade union` field is selected `yes`',
            'member_details.required_if' => 'This field is required when `member of Local, International Organization or Club` field is selected `yes`',
        ),
        $niceNames);
        
    	if ($validator -> fails()) {
            return Redirect() -> back() -> withErrors($validator) -> withInput();
    	}

        

        //dd($inputs);

        // Image upload
        if ($request->has('nid_no') && $request->hasFile('nid_image')) {
            $nidImageName = time().'.'.request()->nid_image->getClientOriginalExtension();
            request()->nid_image->move(public_path('images/nids/'), $nidImageName);
        }else {
            $nidImageName = null;
        }

        

        if ($request->has('passport_no') && $request->hasFile('passport_image')) {
            $passportImageName = time().'.'.request()->passport_image->getClientOriginalExtension();
            request()->passport_image->move(public_path('images/passports/'), $passportImageName);
        } else {
            $passportImageName = null;
        } 

        

        if ($request->has('birth_certificate_no') && $request->hasFile('birth_certificate_image')) {
            $birthCertificateImageName = time().'.'.request()->birth_certificate_image->getClientOriginalExtension();
            request()->birth_certificate_image->move(public_path('images/birth_certificates/'), $birthCertificateImageName);
            
        } else {
            $birthCertificateImageName = null;
        }

        

        if ($request->hasFile('applicant_image')) {
            $imageName = time().'.'.request()->applicant_image->getClientOriginalExtension();
            request()->applicant_image->move(public_path('images/applicants/'), $imageName);
        } else {
            $imageName = 'placeholder.png';
        }

        if ($request->hasFile('signature_image')) {
            $signatureImageName = time().'.'.request()->signature_image->getClientOriginalExtension();
            request()->signature_image->move(public_path('images/signatures/'), $signatureImageName);
        } else {
            $signatureImageName = null;
        }

        $inputs['nid_image']                = $request->hasFile('nid_image')? $nidImageName:'';
        $inputs['passport_image']           = $request->hasFile('passport_image')? $passportImageName:'';
        $inputs['birth_certificate_image']  = $request->hasFile('birth_certificate_image')? $birthCertificateImageName:'';
        $inputs['applicant_image']          = $imageName;
        $inputs['signature_image']          = $signatureImageName;
        
        unset($inputs['checkSameAsPresent']);

        if($inputs['dob']!=NULL)
            $inputs['dob'] = Carbon::createFromFormat('m/d/Y', $request->dob)->format('Y-m-d');

        if($inputs['spouse_dob']!=NULL)
            $inputs['spouse_dob'] = Carbon::createFromFormat('m/d/Y', $request->spouse_dob)->format('Y-m-d');
        if($inputs['fathers_dob']!=NULL)
            $inputs['fathers_dob'] = Carbon::createFromFormat('m/d/Y', $request->fathers_dob)->format('Y-m-d');
        if($inputs['mothers_dob']!=NULL)
            $inputs['mothers_dob'] = Carbon::createFromFormat('m/d/Y', $request->mothers_dob)->format('Y-m-d');

        

    	$br = new Application();
        $inputs['associate_id'] = $br->createMarketingAssociateId($inputs["preferred_branch"]);
        $br->fill($inputs)->save();

        return Redirect() -> to('/')-> with('msg-success',"New Application Successfully Saved"); 
    }

    public function show($id){
        $pageInfo = [
            "title"=>"Application View",
            "route"=>"application"
        ];
        $Application = Application::where('id', $id)->first();
        $Remarks = Forward_log::where('application_id', $id)->get();
        return view('application.view',compact('pageInfo','Application','Remarks'));
    }

    public function printView($id){
        $pageInfo = [
            "title"=>"Application View",
            "route"=>"application",
            'print' => 'yes'
        ];
        $Application = Application::where('id', $id)->first();
        $Remarks = Forward_log::where('application_id', $id)->get();
        return view('application.view_print',compact('pageInfo','Application','Remarks'));
    }

    public function forward($id,$action=NULL){

        $title = "Forward ";
        if(isset($action))
        {
            if($action=="AC"){
                $title = "Accept ";
            }
            else if($action=="DEC")
            $title = "Decline ";
        }


        $pageInfo = [
            "title"=>$title."Application",
            "route"=>"application",
            "action"=>((isset($action))? $action : NULL)
        ];

        $Application = Application::where('id', $id)->first();
        $Remarks = Forward_log::where('application_id', $id)->get();
        return view('application.forward',compact('pageInfo','Application','Remarks'));
    }

    public function forwardStore(Request $request,$id,$action=NULL)
    {
        $inputs = $request->all();
        $user = Auth::user();

        $validator = Validator::make($inputs, array(
    		'remarks' => [ 'required','string', 'max:499']
    	));
        
    	if ($validator -> fails()) {
            return Redirect() -> back() -> withErrors($validator) -> withInput();
    	}

        
        $forward_from = 1;
        $forward_to = 1;
        $level = 1;
        switch ($user->getRoleName->role_short_name) 
        {
            case 'br':
                $forward_from = $user->branch_id;
                if($user->branch_id=='BD0010002')
                {
                    $forward_to = 100;
                }
                else 
                    $forward_to = Branch::getCluster($user->branch_id);
                break;
            
            case 'cm':
                $forward_from = Branch::getCluster($user->branch_id);
                $forward_to = 100;
                $level = 2;
                break;
            case 'ho':
                $forward_from = 'HO';
                $forward_to = 'BR';
                $level = 3;
                break;
            default:
                break;
        }

        /*********** STATUS *****************************************/
        $status = $user->getRoleName->parent_role_id;
        //GCP Branch Exception Case
        if($user->branch_id=='BD0010002'){
            $status = 2;
        }
        if($action != NULL){
            if($action=='AC')
            {
                $status = 101;
            }
            else if($action === 'DEC') $status = 102;
        }
        /********** STATUS END ***************************************/

        $Application = Application::where('id',$id)->first();
        $Application->status     =  $status; //ACCEPT - 101// DECLINE - 102
        $Application->updated_by = $user->id;
        $statusChanged = $Application->save();

        if($action != NULL && $action=="AC" && $statusChanged)
        {
            $arr = [
                'email' => $Application->email
            ];
            $validator = Validator::make($arr, array(
                'email' => ['required','email','unique:users,email']
            ));
            
            if ($validator -> fails()) {
                return Redirect() -> back() -> withErrors($validator) -> withInput();
            }
            User::create([
                'name' => $Application->name,
                'employee_id' => " ",
                'role_id' => Role::where('role_short_name', 'assc')->first()->id,
                'branch_id' => $Application->preferred_branch,
                'email' => $Application->email,
                'username' => $Application->email,
                'image' => $Application->applicant_image,
                'password' => Hash::make('12345678'),
            ]);

            $from_path = public_path('images/applicants/'.$Application->applicant_image);
            if(file_exists($from_path) ) {
                File::copy($from_path,
                    public_path('images/user/'.$Application->applicant_image));
            }
            


    
            /************************** MAIL SEND *****************************/
            $mailInfo = [
                'name'      =>  $Application->name,
                'username'  =>  $Application->email,
                'email'     =>  $Application->email,
                'password'  =>  "12345678",
            ];

            $m = new Application();
            $m->sendMail($mailInfo);
            /**** END MAIL SEND **/
            
        }

        

        $ret = Forward_log::create([
            'application_id' => $id,
            'forward_from' => $forward_from,
            'forward_to' => $forward_to,
            'remarks' => $request->remarks,
            'updated_by'=>$user->id,
            'level'=>$level
        ]);

        if($status==102){
            $this->storeDeclined($id);
        }

        

        if($action!= null && $action=="DEC")
            return redirect()->to('/')-> with('msg-success',"Application Declined."); 
        if($action!= null && $action=="AC")
            return redirect()->to('/')-> with('msg-success',"Application Accepted."); 
        else 
            return redirect()->to('/')-> with('msg-success',"Application Forwarded Successfully."); 
    }

    public function forwardAll(Request $request)
    {
        $inputs = $request->all();
        $user = Auth::user();

        $validator = Validator::make($inputs, array(
    		'remarks' => [ 'nullable','string', 'max:499'],
            'id'      => ['required']
    	));
        
    	if ($validator -> fails()) {
            return Redirect() -> back() -> withErrors($validator) -> withInput();
    	}

        
        $forward_from = 1;
        $forward_to = 1;
        $level = 1;
        switch ($user->getRoleName->role_short_name) 
        {
            case 'br':
                $forward_from = $user->branch_id;
                if($user->branch_id=='BD0010002'){
                    $forward_to = 100;
                }
                else 
                    $forward_to = Branch::getCluster($user->branch_id);
                break;
            
            case 'cm':
                $forward_from = Branch::getCluster($user->branch_id);
                $forward_to = 100;
                $level = 2;
                break;
            case 'ho':
                $forward_from = 'HO';
                $forward_to = 'BR';
                $level = 3;
                break;
            default:
                break;
        }

        $status = $user->getRoleName->parent_role_id;
        //GCP Branch Exception Case
        if($user->branch_id=='BD0010002'){
            $status = 2;
        }
        if($request->has('multi_action')){
            if($request->multi_action=='AC')
            {
                $status = 101;
            }
            else if($request->multi_action === 'DEC') $status = 102;
        }

        DB::beginTransaction();
        try 
        {
            $statusChanged = Application::whereIn('id', $request->id)
            ->update([
                'status' => $status,
                'updated_by' => $user->id
                ]);

            if($request->has('multi_action') && $request->multi_action=="AC" && $statusChanged)
            {
                foreach ($request->id as $key => $id) 
                {
                    
                    $Application = Application::where('id',$id)->first();
                    $arr = [
                        'email' => $Application->email
                    ];
                    $validator = Validator::make($arr, array(
                        'email' => ['required','email','unique:users,email']
                    ));
                    
                    if ($validator -> fails()) {
                        return Redirect() -> back() -> withErrors($validator) -> withInput();
                    }

                    User::create([
                        'name' => $Application->name,
                        'employee_id' => " ",
                        'role_id' => Role::where('role_short_name', 'assc')->first()->id,
                        'branch_id' => $Application->preferred_branch,
                        'email' => $Application->email,
                        'username' => $Application->email,
                        'image' => $Application->applicant_image,
                        'password' => Hash::make('12345678'),
                    ]);
        
                    $from_path = public_path('images/applicants/'.$Application->applicant_image);
                    if(file_exists($from_path) ) {
                        File::copy($from_path,
                            public_path('images/user/'.$Application->applicant_image));
                    }
                    
        
        
            
                    /************************** MAIL SEND *****************************/
                    $mailInfo = [
                        'name'      =>  $Application->name,
                        'username'  =>  $Application->email,
                        'email'     =>  $Application->email,
                        'password'  =>  "12345678",
                    ];
        
                    $m = new Application();
                    $m->sendMail($mailInfo);
                    /**** END MAIL SEND **/
                }
                
                
            }

            foreach ($request->id as $key => $id) {
                $ret = Forward_log::create([
                    'application_id' => $id,
                    'forward_from' => $forward_from,
                    'forward_to' => $forward_to,
                    'remarks' => $request->remarks,
                    'updated_by'=>$user->id,
                    'level'=>$level
                ]);

                if($status==102){
                    $this->storeDeclined($id);
                }
            }
        
            DB::commit();
            if($request->has('multi_action') && $request->multi_action=="DEC")
                return redirect()->to('/')-> with('msg-success',"All Application Declined."); 
            if($request->has('multi_action') && $request->multi_action=="AC")
                return redirect()->to('/')-> with('msg-success',"All Application Accepted."); 
            else 
                return redirect()->to('/')-> with('msg-success',"All Application Forwarded Successfully."); 
                
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->to('/')-> with('msg-error',"Something went wrong."); 
        }

        
    }

    public function associateRmCreate($id)
    {
        $pageInfo = [
            "pageTitle"=>"Assign RM",
            "route"=>"application"
        ];
        $Application = Application::where('id', $id)->first();
        $rmList = $this->makeDD(User::where('branch_id', Auth::user()->branch_id)
                        ->where('role_id',Role::where('role_short_name','rm')->first()->id)
                        ->get()->pluck('name','id'));
        return view('rm.create',compact('pageInfo','rmList','Application'));
    }
    

    public function associateRmStore(Request $request,  $id)
    {
        //dd("Error");
        $inputs = $request->all();
        $Application = Application::where('id', $id)->first();

        $validator = Validator::make($inputs, array(
    		'rm_id' => [ 'required','integer']
    	));
    	if ($validator -> fails()) {
            return Redirect() -> back() -> withErrors($validator) -> withInput();
    	}

        $Application->rm_id = $request->rm_id;
        $Application->save();

        return redirect()->to('/')->withSuccess("RM Assigned for Marketing Associates successfully");

    }

    public function associateBankAccCreate($id)
    {
        $pageInfo = [
            "pageTitle"=>"Attach Bank Account",
            "route"=>"application"
        ];
        
        $Application = Application::where('id', $id)->first();
        return view('acc_assign.create',compact('pageInfo','Application'));
    }

    public function associateBankAccStore(Request $request,  $id)
    {
        $inputs = $request->all();
        $Application = Application::where('id', $id)->first();

        $validator = Validator::make($inputs, array(
    		'assc_acc_no' => [ 'required','digits:13','starts_with:01112']
    	),
        [],
        [
            'assc_acc_no' => 'Associate Account No.',
        ]
        );
    	if ($validator -> fails()) {
            return Redirect() -> back() -> withErrors($validator) -> withInput();
    	}

        try{

            $Application->assc_acc_no = $request->assc_acc_no;
            $Application->save();

            return redirect()->to('/')->withSuccess("Bank Account Attached Successfully for Marketing Associates.");
            
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->to('/')-> with('msg-error',"Something went wrong."); 
        }

    }




    //UTILITY FUNCTION SCRIPTS
    public function getDistricts(Request $request) 
    {
        $data = DB::table('districts')->where('DIVISION_ID', $request->division_id)->get();

        $option = '<option value="">Choose One ...</option>';
        
        foreach ($data as $key => $value) {
            $option .= '<option value='.$value->ID.' >'.$value->NAME.'</option>';
        }
        return $option;
    }

    private function storeDeclined($id)
    {
        DB::beginTransaction();
        try {
            $Application = Application::where('id',$id)->first();
            $ApplicationDec = $Application->replicate();
            $ApplicationDec = $ApplicationDec->toArray();
            $ApplicationDec['application_id'] = $Application->id;
            unset($ApplicationDec['id']);
            $applicationDeclined = new ApplicationDeclined(); 
            $applicationDeclined->fill($ApplicationDec)->save();
            $Application->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
        
    }
    
}
