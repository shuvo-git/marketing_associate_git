<div class="card card-secondary card-outline card-outline-tabs">
                
    <!-- CARD HEADER-->
    <div class="card-header p-0 border-bottom-0">
        <ul class="nav nav-tabs" id="custom-tabs" role="tablist">
            @isset($Claims['new'])
            <li class="nav-item">
                <a class="nav-link text-primary {{isset($Claims['new']) ? 'active':''}}" id="new-tab" data-toggle="pill" href="#new" 
                    role="tab" aria-controls="new" aria-selected="{{isset($Claims['new']) ? 'true':'false'}}">New</a>
            </li>
            @endisset
            @isset($Claims['forwarded'])
            <li class="nav-item">
                <a class="nav-link text-success {{isset($Claims['new']) ? '':'active'}}" id="forwarded-tab" data-toggle="pill" href="#forwarded" 
                    role="tab" aria-controls="forwarded" aria-selected="{{isset($Claims['new']) ? 'false':'true'}}">Forwarded</a>
            </li>
            @endisset
        </ul>
        
        <div class="card-tools">
            
            <div class="form-check">
                
                 &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
                <input type="checkbox" class="form-check-input" name="check_all" id="check_all" {{ old('check_all')?'checked':''}}>
                <label class="form-check-label" for="check_all">Check All</label>
            </div>
        </div>

    </div>
    <!-- CARD HEADER ENDS-->

    {!! Form::open(array('url' => 'claim_incentive/forward_all', 'method' => 'post', 'role' => 'form','id'=>"forward-all-form" , 'class' => 'form-horizontal')) !!}
    <!-- CARD BODY-->
    <div class="card-body">
        <div class="tab-content  border-0" id="custom-tabsContent">
            @isset($Claims['new'])
            <div class="tab-pane {{isset($Claims['new']) ? 'show':''}} border-0 fade {{isset($Claims['new']) ? 'active':''}}" id="new" role="tabpanel" aria-labelledby="new-tab">
                @include('claim_incentive.claim_table.table_start',["table_id"=>"table_list"])
                @foreach ($Claims['new'] as $i => $ClaimIncentive)
                @include('claim_incentive.claim_table.table_row',["table_id"=>"table_list"])
                @endforeach
                @include('claim_incentive.claim_table.table_end')
            </div>
            @endisset

            @isset($Claims['forwarded'])
            <div class="tab-pane fade {{isset($Claims['new']) ? '':'show'}} border-0  {{isset($Claims['new']) ? '':'active'}}" id="forwarded" role="tabpanel" aria-labelledby="forwarded-tab">
                @include('claim_incentive.claim_table.table_start',["table_id"=>"table_list_forwarded"])
                @foreach ($Claims['forwarded'] as $i => $ClaimIncentive)
                @include('claim_incentive.claim_table.table_row',["table_id"=>"table_list_forwarded"])
                @endforeach
                @include('claim_incentive.claim_table.table_end')
            </div>
            @endisset 
        </div>
        {{--{!! Form::open(array('url' => '/claim_incentive/forward_all', 'method' => 'post', 'role' => 'form','id'=>"forward-all-form" , 'class' => 'form-horizontal')) !!}
        @include('claim_incentive.claim_table.table_start',["table_id"=>"table_list"])
        @include('claim_incentive.claim_table.table_row')
        @include('claim_incentive.claim_table.table_end') --}}
    </div>
    <!-- END CARD BODY -->

    <!-- FOOTER -->
    @php
        if(isset($Claims['new'])){
            if(count($Claims['new'])>0)$cnts = 1;
            else $cnts = 0;
        }
        else $cnts = 0;
    @endphp

    @include('claim_incentive.claim_table.claim_forward_multi',['cnts'=>$cnts])
    <!-- END FOOTER -->
</div>

