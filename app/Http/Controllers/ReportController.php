<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if(Auth::check())
        {
            
            $Applications = $this->__filter($request);
            $pageInfo = [
                "title"=>"Report",
                "route"=>"report"
            ];
            
            $clusterList = $this->makeDD(DB::table('cluster')->pluck('cluster_name','id'),'Cluster');
            $branchList = $this->makeDD(DB::table('branch')->pluck('BR_NAME','T24_BR'),'Branch');
            
            return view('report.index',compact('Applications','pageInfo','clusterList','branchList'));
            
        }
        return redirect()->to('login')->withErrors("You Are not authenticated to view this page");
        
    }


    private function __filter($request) {
        
        /*$query = Products::query();

        if ($request->filled('status')) {
            $query->where('status', '=', $request->status);
        } else {
            $query->where('status', '=', 1);
        }
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }*/

        $fromDate = Carbon::now()->subMonth(2)->format('Y-m-d');
        $toDate = Carbon::now()->format('Y-m-d');

        if($request->filled('from_date') || $request->filled('to_date')){
            
            if($request->has('from_date'))
                $fromDate = Carbon::createFromFormat('m/d/Y', $request->from_date)->format('Y-m-d');
            if($request->has('to_date'))
                $toDate = Carbon::createFromFormat('m/d/Y', $request->to_date)->format('Y-m-d');
        }

        $user = Auth::user();
        $roleName = $user->getRoleName->role_short_name;
        
        switch ($roleName) 
        {
            case 'admin':
                $Applications = 
                    Application::where ('status',101)
                    ->whereNotNull('rm_id');
                break;

            case 'br':
                $Applications = 
                    Application::where ('status',101)
                    ->whereIn('preferred_branch',[$user->branch_id])
                    ->whereNotNull('rm_id');
                break;
            case 'cm':
                $cluster_branches = Branch::where('CLUSTER_ID', Branch::getCluster( $user->branch_id) );
                $Applications = 
                    Application::where ('status',101)
                    ->whereIn('preferred_branch',$cluster_branches->pluck('T24_BR'))
                    ->whereNotNull('rm_id');
                break;

            case 'ho':
                $Applications = 
                    Application::where ('status',101)
                    ->whereNotNull('rm_id');
                break;
            case 'rm':
                $Applications = 
                    Application::where('status',101)
                    ->where('rm_id',$user->id)
                    ->whereIn('preferred_branch',[$user->branch_id]);
                break;
            
            
            default:
                $Applications = [];
                break;
        }

        return $Applications
                ->whereBetween('created_at',[$fromDate,$toDate])
                ->paginate(50);
    }

    public function getBranchesByClusterID(Request $request)
    {
        $cluster_id = ($request->has('cluster_id'))? $request->cluster_id:'';
        
        $bramches = DB::table('branch')->where('CLUSTER_ID',$cluster_id)->get();
        $option = '<option value="">Choose Branch ...</option>';
        
        foreach ($bramches as $key => $value) {
            $option .= '<option value='.$value->T24_BR.' >'.$value->BR_NAME.'</option>';
        }
        return $option;
    }
}
