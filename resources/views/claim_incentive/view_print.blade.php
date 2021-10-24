@extends('layouts.print')

@section('css')

@stop

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">{{ $pageInfo['pageTitle'] }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">{{ $pageInfo['pageTitle'] }}</li>
        </ol>
    </div>
</div>
@stop

@section('content')
    

    <div class="container-fluid">
        <div class="col-md-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                    <div class="col-12">
                    <h4>
                        <i class="fas fa-eye"></i> Padma Bank Ltd.
                        <small class="float-right">Date: {{ \Carbon\Carbon::now()->format('d M, Y') }}</small>
                    </h4>
                    </div>
                    <!-- /.col -->
                </div>
            

                <!-- info row -->
                <div class="row">
                    <div class="col-sm-6">
                        <dl class="row invoice-info">
                            <dt class="col-sm-4">Associate ID</dt>
                            <dd class="col-sm-8">:  @if (isset($claim->associate_id) ){{ $claim->associate_id }} @endif</dd>

                            <dt class="col-sm-4">Name</dt>
                            <dd class="col-sm-8">:  {{ $claim->getUser->name }}</dd>
                            
                            <dt class="col-sm-4">Claim Date</dt>
                            <dd class="col-sm-8">:  {{ $claim->getDateTime($claim->created_at) }}</dd>

                            
                            <dt class="col-sm-4">Branch</dt>
                            <dd class="col-sm-8">:  {{$claim->getBranch->BR_NAME}}</dd>

                            <dt class="col-sm-4">Status</dt>
                            <dd class="col-sm-8">:  
                                
                                @if($claim->status===(App\Classes\Claims\ClaimConstants::$BRANCH))
                                    <span class="right badge badge-primary">branch</span>
                                @elseif($claim->status===(App\Classes\Claims\ClaimConstants::$CLUSTER))
                                    <span class="right badge badge-info">cluster</span>
                                @elseif($claim->status===(App\Classes\Claims\ClaimConstants::$HEAD_OFFICE))
                                    <span class="right badge badge-warning">head office</span>
                                @elseif($claim->status===(App\Classes\Claims\ClaimConstants::$ACCEPTED))
                                    <span class="right badge badge-primary">accepted</span>
                                @elseif($claim->status===(App\Classes\Claims\ClaimConstants::$PAID))
                                    <span class="right badge badge-success">paid</span>
                                @elseif($claim->status===(App\Classes\Claims\ClaimConstants::$DECLINED))
                                    <span class="right badge badge-danger">declined</span>
                                @endif
                                
                            </dd>

                            @if ($claim->status===(App\Classes\Claims\ClaimConstants::$PAID))
                            <dt class="col-sm-4">Date of Disbursement</dt>
                            <dd class="col-sm-8">:  
                                {{ $claim->getDate($claim->getPaidIncentive->date_disbursement) }}
                            </dd>
                            @endif

                        </dl>
                    </div>
                    <div class="col-sm-6">
                        <p class="lead">REMARKS</p>
                        <div class="col-12 table-responsive">
                            <table class="table">
                                <tr>
                                    <td>
                                        {{ $claim->remarks }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                        
                    </div>

                </div>
                
                <div class="row">
                    @if ($claim->status===(App\Classes\Claims\ClaimConstants::$PAID))
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">SL.</th>
                                <th>Category</th>
                                <th>Deposit Account</th>
                                <th>Deposited Amount</th>
                                <th>Deposited Date</th>
                                <th>Incentive Amount</th>
                                <th>Remarks</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($claim->getPaidIncentive->getPaidDetails as $k=>$v)
                                <tr>
                                    <td>{{($k+1)}}</td>
                                    <td>{{$v->getCategory($v->category)}}</td>
                                    <td>{{$v->deposit_account}}</td>
                                    <td>{{$v->deposited_amt}}</td>
                                    <td>{{$claim->getDate($v->date_deposited)}}</td>
                                    <td>{{$v->incentive_amt}}</td>
                                    <td>{{$v->remarks}}</td>
                                    
                                </tr>
                            @endforeach
                            
                        
                        </tbody>
                      </table>
                    @else
                        @if (isset($pageInfo['print']) )
                
                        @else
                            <div class="col-sm-8">
                                @if (explode('.',$claim->attachment)[1]=="pdf")
                                <iframe id="iframepdf" width="70%" height="600px" src="{{url('/')}}/images/claims/{{ $claim->attachment }}"></iframe>
                                    {{--<object type="application/pdf" data="{{url('/')}}/images/claims/{{ $claim->attachment }}" 
                                        width="100%" height="700px">No Support</object>--}}
                                @else
                                    <center>
                                    <img src="{{url('/')}}/images/claims/{{ $claim->attachment }}"
                                        width="100%" class="img-fluid img-thumbnail" alt="Responsive image">
                                    </center>

                                @endif
                            </div>
                        @endif
                    @endif
                    
                </div>

                @if (isset($pageInfo['print']) )
                
                @else
                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-12">
                        <a href="{{ url('claim_incentive/'.$claim->id.'/print') }}" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                        <a href="{{  url('claim_incentive') }}" type="button" class="btn btn-default float-right">Back</a>
                    </div>
                </div>
                @endif

            </div>

            
        </div>
    </div>
@stop

@section('scripts')
<script>
    
    $(function () 
    {
        
    });
</script>
@stop


