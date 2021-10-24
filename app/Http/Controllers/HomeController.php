<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Application;
use App\Models\ApplicationDeclined;
use App\Models\Branch;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            $user = Auth::user();
            $roleName = $user->getRoleName->role_short_name;
            
            switch ($roleName) 
            {
                case 'admin':
                    $Applications['new'] = Application::all();
                    break;

                case 'br':
                    $Applications['new'] = Application::where('status',1)
                        ->where('preferred_branch',$user->branch_id)
                        ->wherenull('rm_id')
                        ->get();
                    $Applications['accepted'] = Application::where('status',101)
                        ->where('preferred_branch',$user->branch_id)
                        ->wherenull('rm_id')
                        ->get();
                    $Applications['declined'] = ApplicationDeclined::where('status',102)
                        ->where('preferred_branch',$user->branch_id)
                        ->wherenull('rm_id')
                        ->get();
                    $Applications['rm_assigned'] = Application::where('status',101)
                        ->where('preferred_branch',$user->branch_id)
                        ->whereNotNull('rm_id')
                        ->get();
                    $Applications['forwarded'] = Application::where('preferred_branch',$user->branch_id)
                        ->whereNotNull('status')
                        ->where('status','!=',1)
                        ->get();
                    
                    break;
                case 'cm':
                    $cluster_branches = Branch::where('CLUSTER_ID', Branch::getCluster( $user->branch_id) )
                        ->get();
                    $Applications['new'] = Application::
                        where('status',$user->getRoleName->id)
                        ->whereIn('preferred_branch',$cluster_branches->pluck('T24_BR'))
                        ->get();
                    $Applications['accepted'] = Application::where('status',101)
                        ->whereIn('preferred_branch',$cluster_branches->pluck('T24_BR'))
                        ->wherenull('rm_id')
                        ->get();
                    $Applications['declined'] = ApplicationDeclined::where('status',102)
                        ->whereIn('preferred_branch',$cluster_branches->pluck('T24_BR'))
                        ->wherenull('rm_id')
                        ->get();
                    $Applications['rm_assigned'] = Application::where('status',101)
                        ->whereIn('preferred_branch',$cluster_branches->pluck('T24_BR'))
                        ->whereNotNull('rm_id')
                        ->get();
                    $Applications['forwarded'] = Application::whereIn('status',[2,101,102])
                        ->whereIn('preferred_branch',$cluster_branches->pluck('T24_BR'))
                        ->get();
                    break;

                case 'ho':
                    $Applications['new'] = Application::where('status',$user->getRoleName->id)
                        ->get();
                    $Applications['accepted'] = Application::where('status',101)
                        ->get();
                    $Applications['declined'] = ApplicationDeclined::where('status',102)
                        ->get();
                    $Applications['rm_assigned'] = Application::where('status',101)
                        ->whereNotNull('rm_id')
                        ->get();
                    break;
                case 'rm':
                    $Applications['new'] = Application::where('status',101)
                        ->where('rm_id',$user->id)
                        ->where('preferred_branch',$user->branch_id)
                        ->get();
                    break;
                
                
                default:
                    $Applications['new'] = Application::where('status',$user->getRoleName->role_id)
                        ->get();
                    break;
            }
            
        }
        else {
            $Applications = [];
        }       

        $pageInfo = [
            "title"=>"Home",
            "route"=>"home"
        ];
        return view('home',compact('Applications','pageInfo'));
    }
}
