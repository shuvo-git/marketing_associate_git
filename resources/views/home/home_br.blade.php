
    <div class="card card-secondary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link text-primary active" id="new-tab" data-toggle="pill" href="#new" 
                        role="tab" aria-controls="new" aria-selected="false">New</a>
                </li>
                @isset($Applications['accepted'])
                <li class="nav-item">
                    <a class="nav-link text-success" id="accepted-tab" data-toggle="pill" href="#accepted" 
                        role="tab" aria-controls="accepted" aria-selected="true">Accepted</a>
                </li>
                @endisset
                @isset($Applications['declined'])
                <li class="nav-item">
                    <a class="nav-link text-danger" id="declined-tab" data-toggle="pill" href="#declined" 
                        role="tab" aria-controls="declined" aria-selected="false">Declined</a>
                </li>
                @endisset
                @isset($Applications['rm_assigned'])
                <li class="nav-item">
                    <a class="nav-link text-info" id="rm_assigned-tab" data-toggle="pill" href="#rm_assigned" 
                        role="tab" aria-controls="rm_assigned" aria-selected="false">Assigned RM</a>
                </li>
                @endisset
                @isset($Applications['forwarded'])
                <li class="nav-item">
                    <a class="nav-link text-warning" id="forwarded-tab" data-toggle="pill" href="#forwarded" 
                        role="tab" aria-controls="forwarded" aria-selected="false">Forwarded</a>
                </li>
                @endisset
            </ul>
            <div class="card-tools">
                <a href="#" class="btn btn-tool btn-sm">
                    <!--i class="fas fa-check-square"></i> Check All-->
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="check_all" id="check_all" {{ old('check_all')?'checked':''}}>
                        <label class="form-check-label" for="check_all">Check All</label>
                    </div>
                </a>
            </div>
        </div>
        {!! Form::open(array('url' => '/application/forward_all', 'method' => 'post', 'role' => 'form','id'=>"forward-all-form" , 'class' => 'form-horizontal')) !!}
        <div class="card-body">
            
            <div class="tab-content  border-0" id="custom-tabsContent">
                <div class="tab-pane show border-0 fade active" id="new" role="tabpanel" aria-labelledby="new-tab">
                    
                    @include('home.table_start',["table_id"=>"table_list"])
                    @foreach ($Applications['new'] as $Application)
                    @include('home.home_table_row',["table_id"=>"table_list"])    
                    @endforeach
                    @include('home.table_end')
                    
                </div>

                @isset($Applications['accepted'])
                <div class="tab-pane fade  border-0" id="accepted" role="tabpanel" aria-labelledby="accepted-tab">
                    @include('home.table_start',["table_id"=>"table_list_accepted"])
                    @foreach ($Applications['accepted'] as $Application)
                    @include('home.home_table_row',["table_id"=>"table_list_accepted"])    
                    @endforeach
                    @include('home.table_end')
                </div>
                @endisset

                @isset($Applications['declined'])
                <div class="tab-pane  border-0 fade" id="declined" role="tabpanel" aria-labelledby="declined-tab">
                    @include('home.table_start',["table_id"=>"table_list_declined"])
                    @foreach ($Applications['declined'] as $Application)
                    @include('home.home_table_row',["table_id"=>"table_list_declined"])    
                    @endforeach
                    @include('home.table_end')
                </div>
                @endisset

                @isset($Applications['rm_assigned'])
                <div class="tab-pane  border-0 fade" id="rm_assigned" role="tabpanel" aria-labelledby="rm_assigned-tab">
                    @include('home.table_start',["table_id"=>"table_list_rm_assigned"])
                    @foreach ($Applications['rm_assigned'] as $Application)
                    @include('home.home_table_row',["table_id"=>"table_list_rm_assigned"])    
                    @endforeach
                    @include('home.table_end')
                </div>
                @endisset
                
                @isset($Applications['forwarded'])
                <div class="tab-pane  border-0 fade" id="forwarded" role="tabpanel" aria-labelledby="forwarded-tab">
                    @include('home.table_start',["table_id"=>"table_list_forwarded"])
                    @foreach ($Applications['forwarded'] as $Application)
                    @include('home.home_table_row',["table_id"=>"table_list_forwarded"])    
                    @endforeach
                    @include('home.table_end')
                </div>
                @endisset
                
            </div>
        </div>
        @include('home.home_forward_multi')
        {!! Form::close() !!}
    </div>
