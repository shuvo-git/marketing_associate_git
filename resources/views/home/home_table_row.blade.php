<tr id="{{ $Application->id }}">
    
    @if ($table_id=="table_list" && auth()->user()->getRoleName->role_short_name!=='rm')
    <td></td>
    @endif
    
    <td>
        @if ($Application->applicant_image!='placeholder.png')
        <img src="{{ url('images/applicants/'.$Application->applicant_image) }}" alt="Applicant" class="img-circle img-sm"> &nbsp;
        @endif
        
        {{$Application->name}}
    </td>
    <td>{{ $Application->getPreferredBranchName->BR_NAME }}</td>
    <td>
        {{ $Application->cell }} <br>
        {{ $Application->email }} <br>
        {{ $Application->social }}
    
    </td>
    
    @if ($table_id==="table_list" || 
         $table_id==="table_list_accepted")
        
        
        <td>@if($Application->gender==0)Male @elseif($Application->gender==1) Female @else Others @endif</td>
    @endif

    @if ($table_id==="table_list_declined")
        <td>{{ $Application->getUserUpdatedBy->name }}</td>
        <td>
            @if(isset($Application->logs->remarks))
                {{$Application->logs->remarks }}
            @endif 
        </td>
    @endif

    @if ($table_id==="table_list_rm_assigned")
        <td>{{ $Application->getUser->name }}</td>
        <td>{{ $Application->getUser->employee_id }}</td>
    @endif

    @auth
    @if ((auth()->user()->getRoleName->role_short_name=='br' && $table_id==="table_list_rm_assigned" ) ||
    auth()->user()->getRoleName->role_short_name=='rm')
        <td>
            @if (isset($Application->assc_acc_no))
                {{ $Application->assc_acc_no }}
            @else
                @if(auth()->user()->getRoleName->role_short_name=='br')
                    <a href="{{ url('application/'.$Application->id.'/associate-bank-acc') }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Attach Bank account"><i class="fas fa-university"></i></a>
                @else
                    -
                @endif
            @endif
        </td>
        @endif
    @endauth


    <td>
    @if (isset($Application->status))
        @if ($Application->status==101)
            <span class="right badge badge-success">Accepted</span>
            @if ($table_id==="table_list_forwarded" || $table_id==="table_list_accepted")
                @if (isset($Application->rm_id))
                    <span class="right badge badge-info">RM Assigned</span>
                @else
                    <span class="right badge badge-warning">RM Not Assigned</span>
                @endif
            @endif
        @elseif ($Application->status==102)
            <span class="right badge badge-danger">Declined</span>
        @else
            @if ($table_id==="table_list_forwarded")
                @if ($Application->status==2)
                    <span class="right badge badge-info">In Head Office</span>
                @else
                    <span class="right badge badge-warning">In Cluster</span>
                @endif
                
            @else
                <span class="right badge badge-primary">New</span>
            @endif
        @endif
    @endif
    </td>
    
    <td class="text-right py-0 align-middle">
        <div class="btn-group btn-group-sm">
            <a href="{{ url('application/'.$Application->id) }}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="view"><i class="fas fa-eye"></i></a>
            @auth
            @if (auth()->user()->getRoleName->role_short_name=='br')
                @if ($Application->status==101 && !isset($Application->rm_id) && $table_id!=="table_list_forwarded")
                    <a href="{{ url('application/'.$Application->id.'/associate-rm') }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Assign RM"><i class="fas fa-user-check"></i></a>
                @endif
            @endif
            @if (auth()->user()->getRoleName->role_short_name!=='ho' && $Application->status!=101 && $Application->status!=102 && $table_id!=="table_list_forwarded")
                <a href="{{ url('application/'.$Application->id.'/forward') }}" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="forward"><i class="fas fa-directions"></i></a>
            @endif
            @if (auth()->user()->getRoleName->role_short_name==='ho' && $table_id==="table_list")
                <a href="{{ url('application/'.$Application->id.'/AC'.'/forward') }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Accept"><i class="fas fa-check"></i></a>
            @endif
            @if (auth()->user()->getRoleName->role_short_name!='rm' && 
                auth()->user()->getRoleName->role_short_name!='assc' && 
                $table_id=="table_list")
                <a href="{{ url('application/'.$Application->id.'/DEC'.'/forward') }}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Decline"><i class="fas fa-times"></i></a>
            @endif
            @endauth


            
            
        </div>
    </td>
</tr>
                
