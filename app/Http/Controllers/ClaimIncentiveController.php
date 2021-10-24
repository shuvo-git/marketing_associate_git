<?php

namespace App\Http\Controllers;

use App\Classes\Claims\ClaimConstants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\ClaimIncentive;
use App\Models\User;
use App\Models\Branch;
use App\Models\Application;
use App\Models\ClaimForwardLog;
use App\Models\PaidIncentive;
use App\Models\PaidIncentiveDetails;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Log;

class ClaimIncentiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->user =  \Auth::user();
    }
    

    public function index()
    {
        $user = Auth::user();
        $role = $user->getRoleName->role_short_name;

        switch ($role){
            case 'assc':
                $Claims['forwarded'] = 
                    ClaimIncentive::where('user_id',$user->id)
                    //->where('status',ClaimConstants::$BRANCH)
                    ->orderBy('id','DESC')
                    ->get();

                break;
            case 'rm':
                $Claims['forwarded'] = 
                    ClaimIncentive::where('rm_id',$user->id)
                    ->orderBy('id','DESC')
                    ->get();
                break;
            case 'br':
                $Claims['new'] = 
                    ClaimIncentive::where('branch_id',$user->branch_id)
                    ->where('status',ClaimConstants::$BRANCH)
                    ->orderBy('id','DESC')
                    ->get();
                $Claims['forwarded'] = 
                    ClaimIncentive::where('branch_id',$user->branch_id)
                    ->whereNotIn('status',[ClaimConstants::$BRANCH])
                    ->orderBy('id','DESC')
                    ->get();
                break;
            case 'cm':
                $cluster_branches = Branch::where('CLUSTER_ID', Branch::getCluster( $user->branch_id) )
                        ->get();
                $Claims['new'] = ClaimIncentive::whereIn('status',
                            [
                                ClaimConstants::$CLUSTER
                            ])
                        ->whereIn('branch_id',$cluster_branches->pluck('T24_BR'))
                        ->orderBy('id','DESC')
                        ->get();
                $Claims['forwarded'] = ClaimIncentive::whereIn('status',
                        [
                            ClaimConstants::$HEAD_OFFICE,
                            ClaimConstants::$ACCEPTED,
                            ClaimConstants::$DECLINED,
                            ClaimConstants::$PAID
                        ])
                    ->whereIn('branch_id',$cluster_branches->pluck('T24_BR'))
                    ->orderBy('id','DESC')
                    ->get();
                break;
            case 'ho':
                $Claims['new'] = ClaimIncentive::whereIn('status',
                [
                    ClaimConstants::$HEAD_OFFICE
                ])
                ->orderBy('id','DESC')
                ->get();
                $Claims['forwarded'] = ClaimIncentive::whereIn('status',
                [
                    ClaimConstants::$ACCEPTED,
                    ClaimConstants::$DECLINED,
                    ClaimConstants::$PAID
                ])
                ->orderBy('id','DESC')
                ->get();
                break;
            
            default:
                # code...
                $Claims['new'] = ClaimIncentive::whereIn('status',
                [
                    ClaimConstants::$BRANCH
                ])
                ->orderBy('id','DESC')
                ->get();
                $Claims['forwarded'] = ClaimIncentive::whereIn('status',
                [
                    ClaimConstants::$CLUSTER,
                    ClaimConstants::$HEAD_OFFICE,
                    ClaimConstants::$ACCEPTED,
                    ClaimConstants::$DECLINED,
                    ClaimConstants::$PAID
                ])
                ->orderBy('id','DESC')
                ->get();
                break;
        }


        

        $pageInfo = [
            "title"=>"Claim Incentive List",
            "route"=>"claim_incentive"
        ];

        //dd($Claims);
        //if($this->user)
        return view('claim_incentive.index',compact('Claims') )->with('pageInfo',$pageInfo);
        // else return Redirect() -> to('auth');
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $user = Auth::user();
        $user_role = $user->getRoleName->role_short_name;

        if($user_role =='assc' || $user_role=='rm' || $user_role=='br' )
        {   
            $pageInfo = [
                'pageTitle' => 'Claim Incentive',
                'subTitle' => 'Upload Incentive Document',
                'route' => 'claim_incentive',
            ];

            switch($user_role) {
                case 'rm':
                    $assc_users = Application::select(['email','associate_id'])
                        ->where('rm_id',$user->id)
                        ->where('preferred_branch',$user->branch_id)
                        ->get()
                        ->pluck('email');
                    
                    $assciateList = $this->makeDD(User::whereIn('username',$assc_users)
                        ->pluck('name','id'));
                    break;
                case 'br':
                    $assc_users = Application::select(['email','associate_id'])
                        ->whereNotNull('rm_id')
                        ->where('preferred_branch',$user->branch_id)
                        ->get()
                        ->pluck('email');
                    
                    $assciateList = $this->makeDD(User::whereIn('username',$assc_users)
                        ->pluck('name','id'));
                    break;
                
                default:
                    $assciateList = 
                        $this->makeDD(User::where('id',$user->id)->pluck('name','id'));
                    break;
            }
            return view('claim_incentive.create',compact('assciateList'))->with('pageInfo',$pageInfo);
        }
        else
        {
            return Redirect() -> to('claim_incentive');
        }
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $user = Auth::user();
        $inputs = $request->all();

        $validation_rules = [
            
    		'attachment_image'=>'required|file|mimes:jpeg,png,jpg,pdf|max:5120|nullable',
            'remarks' => ['required','min:1','max:300','regex:/^[A-Za-z0-9 ]{1,300}$/']
        ];
		$validation_custom_messages = [
			'remarks.regex' => 'Remarks field must contain Alphanumeric characters and Spaces only'
		];
        if($user->getRoleName->role_short_name!="assc")
            $validation_rules['associate_id'] = 'required|integer|min:1';
        
    	$validator = Validator::make($inputs,$validation_rules ,$validation_custom_messages);
        
    	if ($validator -> fails()) {
            return Redirect() -> back() -> withErrors($validator) -> withInput();
    	}

        
        // Image upload
        if ($request->hasFile('attachment_image')) {
            $nidImageName = time().'.'.request()->attachment_image->getClientOriginalExtension();
            request()->attachment_image->move(public_path('images/claims/'), $nidImageName);
        }else {
            $nidImageName = null;
        }
        
        if($user->getRoleName->role_short_name!="assc")
            $assc_user = User::where('id', $request->associate_id)->first();
        else 
            $assc_user = User::where('id', $user->id)->first();
        $application = Application::where('email', $assc_user->email)->first();
        


        if($application->rm_id == null){
            session()->flash('message_type', 'danger');
            session()->flash('message', 'RM Not Assigned to the Associates. Please contact the respective branch.');
            return Redirect() -> back() -> withErrors($validator) -> withInput();
        }

        $claimsArr["user_id"]       = $assc_user->id;
        $claimsArr["associate_id"]  = $application->associate_id;
        $claimsArr["branch_id"]     = $assc_user->branch_id;
        $claimsArr["rm_id"]         = $application->rm_id;
        $claimsArr["attachment"]    = $nidImageName;
        $claimsArr["remarks"]       = $request->remarks;
        $claimsArr["updated_by"]    = $user->id;
        $claimsArr["status"]        = ClaimConstants::$BRANCH;

        //dd($claimsArr);
    	$br = new ClaimIncentive();
        $br->fill($claimsArr)->save();
        
        return Redirect() -> to('claim_incentive')->with('msg-success','Your Claims Attachment Successfully Uploaded.'); 
    }

    public function show($id)
    {
        $pageInfo = [
            'pageTitle' => 'View Claim Incentive',
            'subTitle' => '',
            'route' => 'claim_incentive',
        ];
        $claim = ClaimIncentive::findOrFail($id);
        return view('claim_incentive.view',compact('claim'))->with('pageInfo',$pageInfo);
    }

    public function printView($id)
    {
        $pageInfo = [
            'pageTitle' => 'View Claim Incentive',
            'subTitle' => '',
            'route' => 'claim_incentive',
            'print' => 'yes'
        ];
        $claim = ClaimIncentive::findOrFail($id);
        return view('claim_incentive.view_print',compact('claim'))->with('pageInfo',$pageInfo);
    }

    public function forwardAllClaim(Request $request)
    {
        $inputs = $request->all();
        $user = Auth::user();

        $validator = Validator::make($inputs, array(
    		'remarks'       => [ 'required','string', 'max:499'],
            'id'            => ['required']
    	));
        
    	if ($validator -> fails()) {
            return Redirect() -> back() -> withErrors($validator) -> withInput();
    	}

        $forward_from = ClaimConstants::$BRANCH;
        $forward_to = ClaimConstants::$CLUSTER;
        $level = 1;
        $status = ClaimConstants::$CLUSTER;
        switch ($user->getRoleName->role_short_name) 
        {
            case 'br':
                $forward_from = $user->branch_id;
                if($user->branch_id=='BD0010002'){
                    $forward_to = ClaimConstants::$HEAD_OFFICE;
                    $status = ClaimConstants::$HEAD_OFFICE;
                }
                else 
                    $forward_to = Branch::getCluster($user->branch_id);
                break;
            
            case 'cm':
                $forward_from = Branch::getCluster($user->branch_id);
                $forward_to = ClaimConstants::$HEAD_OFFICE;
                $level = 2;
                $status = ClaimConstants::$HEAD_OFFICE;
                break;
            case 'ho':
                $forward_from = ClaimConstants::$HEAD_OFFICE;
                $forward_to = ClaimConstants::$FAD;
                $level = 3;
                $status = ClaimConstants::$FAD;
                break;
            default:
                break;
        }

        
        if($request->has('multi_action'))
        {
            if($request->multi_action=='AC')
            {
                $status = ClaimConstants::$ACCEPTED;
            }
            else if($request->multi_action === 'DEC'){
                 $status = ClaimConstants::$DECLINED;
            }
        }

        DB::beginTransaction();
        try {

            ClaimIncentive::whereIn('id', $request->id)
            ->update([
                'status' => $status,
                'updated_by' => $user->id
                ]);

           

            foreach ($request->id as $key => $id) {
                $ret = ClaimForwardLog::create([
                    'claim_id' => $id,
                    'forward_from' => $forward_from,
                    'forward_to' => $forward_to,
                    'remarks' => $request->remarks,
                    'updated_by'=>$user->id,
                    'level'=>$level
                ]);
            }

        

            DB::commit();
            if($request->has('multi_action') && $request->multi_action=="DEC")
                return redirect()->to('claim_incentive')-> with('msg-success',"All Claims Declined."); 
            else 
                return redirect()->to('claim_incentive')-> with('msg-success',"All Application Forwarded Successfully."); 
                
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->to('claim_incentive')-> with('msg-error',"Something went wrong."); 
        }
    }

    function createIncentiveData($id)
    {
        $claimIncentive = ClaimIncentive::findOrFail($id);
        $pageInfo = [
            "title"=>"Store Paid Incentives",
            "route"=>"claim_incentive"
        ];

        $categoryList = ['FDR','CASA / SND','Transaction Account'];
        return view('paid_incentives.create',compact('claimIncentive','pageInfo','categoryList'));
    }

    function storeIncentiveData(Request $request,$claim_id)
    {
        $inputs = $request->all();
        $user = Auth::user();

        $validator = Validator::make($inputs, array(
    		'associate_id'       => 'required|digits:10',
            'date_disbursement'  => 'required',

            'category'           => 'required|array',
            'category.*'         => 'required|integer',

            'deposit_account'    => 'required|array',
            'deposit_account.*'  => 'required|digits:13',
            'deposited_amt'      => 'required|array',
            'deposited_amt.*'    => 'required|numeric',
            'date_deposited'      => 'required|array',
            'date_deposited.*'    => 'required|date_format:d/m/Y',
            'incentive_amt'      => 'required|array',
            'incentive_amt.*'    => 'required|numeric',
            'remarks'            => 'nullable|array',
            'remarks.*'          => 'nullable|max:300',
    	));
        
        
    	if ($validator -> fails()) 
        {
            return Redirect() -> back() 
                -> withErrors($validator) 
                -> withInput();
    	}
        
        try {
            DB::begintransaction();
            
            $paid_incentive = new PaidIncentive();
            $paid_incentive->associate_id      = $request->associate_id;
            $paid_incentive->claim_id          = $claim_id;
            $paid_incentive->date_disbursement = 
                Carbon::createFromFormat('m/d/Y', $request->date_disbursement)->format('Y-m-d');
            $paid_incentive->created_by = auth()->user()->id;
            
            $paid_incentive->save();
            

            $cnt = count($request->deposit_account);
            for ($i = 0; $i < $cnt; $i++) 
            {
                $data[] = [

                    'paid_inc_id'       => $paid_incentive->id,
                    'category'          => $request->category[$i],
                    'deposit_account'   => $request->deposit_account[$i],
                    'deposited_amt'     => $request->deposited_amt[$i],
                    'date_deposited'    => Carbon::createFromFormat('d/m/Y', $request->date_deposited[$i])->format('Y-m-d'),
                    'incentive_amt'     => $request->incentive_amt[$i],
                    'remarks'           => $request->remarks[$i],

                    'created_at' => Carbon::now(),
                    
                ];
                ClaimIncentive::find($claim_id)->update([
                    'status' => ClaimConstants::$PAID
                    ]);
            }
            
            PaidIncentiveDetails::insert($data);
            

            DB::commit();

            return redirect()->to('claim_incentive')->with("success", "New Stock(s) Added Successfully");
        } catch (Exception $ex) {
            Log::error($ex);
            DB::rollback();
            return redirect()->back()->withErrors("Internal Server Error")->withInput();
        }
    }


}
