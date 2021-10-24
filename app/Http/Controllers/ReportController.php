<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
            $fromDate = Carbon::now()->subMonth(2)->format('Y-m-d');
            $toDate = Carbon::now()->format('Y-m-d');

            if($request->filled('from_date') || $request->filled('to_date')){
                
                if($request->has('from_date'))
                    $fromDate = Carbon::createFromFormat('m/d/Y', $request->from_date)->format('Y-m-d');
                if($request->has('to_date'))
                    $toDate = Carbon::createFromFormat('m/d/Y', $request->to_date)->format('Y-m-d');
            }
            //dd(compact('fromDate'))

            $user = Auth::user();
            $roleName = $user->getRoleName->role_short_name;
            
            switch ($roleName) 
            {
                case 'admin':
                    $Applications = 
                        Application::where ('status',101)
                        ->whereNotNull('rm_id')
                        ->whereBetween('created_at',[$fromDate,$toDate])
                        ->get();
                    break;

                case 'br':
                    $Applications = 
                        Application::where ('status',101)
                        ->where('preferred_branch',$user->branch_id)
                        ->whereNotNull('rm_id')
                        ->whereBetween('created_at',[$fromDate,$toDate])
                        ->get();
                    break;
                case 'cm':
                    $cluster_branches = Branch::where('CLUSTER_ID', Branch::getCluster( $user->branch_id) )
                        ->get();
                    $Applications = 
                        Application::where ('status',101)
                        ->whereIn('preferred_branch',$cluster_branches->pluck('T24_BR'))
                        ->whereNotNull('rm_id')
                        ->whereBetween('created_at',[$fromDate,$toDate])
                        ->get();
                    break;

                case 'ho':
                    $Applications = 
                        Application::where ('status',101)
                        ->whereNotNull('rm_id')
                        ->whereBetween('created_at',[$fromDate,$toDate])
                        ->get();
                    break;
                case 'rm':
                    $Applications = 
                        Application::where('status',101)
                        ->where('rm_id',$user->id)
                        ->where('preferred_branch',$user->branch_id)
                        ->whereBetween('created_at',[$fromDate,$toDate])
                        ->get();
                    break;
                
                
                default:
                    $Applications = [];
                    break;
            }

            $pageInfo = [
                "title"=>"Report",
                "route"=>"report"
            ];
            return view('report.index',compact('Applications','pageInfo'));
            
        }
        return redirect()->to('login')->withErrors("You Are not authenticated to view this page");
        
    }
}
