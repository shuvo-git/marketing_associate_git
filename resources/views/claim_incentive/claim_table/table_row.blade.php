
    
<tr id="{{ $ClaimIncentive->id }}">
    @if ($table_id=='table_list')
        <td></td>
    @endif
    <td>{{++$i}}</td>
    <td>
        @if(isset($ClaimIncentive->getUser))
            {{ $ClaimIncentive->getUser->name }}
        @endif
        
    
    </td>
    <td>{{ $ClaimIncentive->associate_id }}</td>
    @if (auth()->user()->getRoleName->role_short_name!='br')
    <td>{{ $ClaimIncentive->getBranch->BR_NAME }}</td>
    @endif
    @if (auth()->user()->getRoleName->role_short_name!='rm')
    <td>{{ $ClaimIncentive->getUserRM->name }}</td>
    @endif
    <td>{{ $ClaimIncentive->getDateTime($ClaimIncentive->created_at) }}</td>
    <td>
        @if($ClaimIncentive->status===(App\Classes\Claims\ClaimConstants::$BRANCH))
            <span class="right badge badge-primary">branch</span>
        @elseif($ClaimIncentive->status===(App\Classes\Claims\ClaimConstants::$CLUSTER))
            <span class="right badge badge-info">cluster</span>
        @elseif($ClaimIncentive->status===(App\Classes\Claims\ClaimConstants::$HEAD_OFFICE))
            <span class="right badge badge-warning">head office</span>
        @elseif($ClaimIncentive->status===(App\Classes\Claims\ClaimConstants::$ACCEPTED))
            <span class="right badge badge-primary">accepted</span>
        @elseif($ClaimIncentive->status===(App\Classes\Claims\ClaimConstants::$PAID))
            <span class="right badge badge-success">paid</span>
        @elseif($ClaimIncentive->status===(App\Classes\Claims\ClaimConstants::$DECLINED))
            <span class="right badge badge-danger">declined</span>
        @endif
    </td>
    <td>
        <a href="{{ asset('images/claims/'.$ClaimIncentive->attachment) }}" download="{{ $ClaimIncentive->attachment }}">{{ $ClaimIncentive->attachment }}</a>
    </td>
    <td class="text-right py-0 align-middle">
        <div class="btn-group btn-group-sm">
            @auth
                @if (auth()->user()->getRoleName->role_short_name==='ho' && 
                $ClaimIncentive->status===(App\Classes\Claims\ClaimConstants::$ACCEPTED))
                <a href="{{ url('claim_incentive/create/'.$ClaimIncentive->id) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Enter Data"><i class="fas fa-money-bill-alt"></i> Payment</a>
                @endif
                
            @endauth
            <a href="{{ url('claim_incentive/'.$ClaimIncentive->id) }}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="view"><i class="fas fa-eye"></i></a>
            {{--@auth
            @if (auth()->user()->getRoleName->role_short_name==='br' || 
                auth()->user()->getRoleName->role_short_name==='cm')
                <a href="{{ url('claim_incentive/'.$ClaimIncentive->id.'/forward') }}" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="forward"><i class="fas fa-directions"></i></a>
            @endif
            @if (auth()->user()->getRoleName->role_short_name==='ho')
                <a href="{{ url('claim_incentive/'.$ClaimIncentive->id.'/AC'.'/forward') }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Accept"><i class="fas fa-check"></i></a>
            @endif
            @if (auth()->user()->getRoleName->role_short_name!='rm' && 
                auth()->user()->getRoleName->role_short_name!='assc' )
                <a href="{{ url('claim_incentive/'.$ClaimIncentive->id.'/DEC'.'/forward') }}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Decline"><i class="fas fa-times"></i></a>
            @endif
            @endauth--}}
            
        
        </div>
    </td>
</tr>


