@extends('layouts.app')

@section('css')
    <style>
        table.dataTable tbody tr.selected {
            color:black;
            background-color: #94c3fa;
        }
        </style>
@stop

@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">{{ $pageInfo['title'] }}</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <!--li class="breadcrumb-item active"></li-->
        </ol>
    </div>
</div>
@stop

@section('content')
        {{--@auth
        @if (auth()->user()->getRoleName->role_short_name==='admin')
        <div class="col-lg-12">
            
            <!-- CARD -->
            <div class="card">
                {!! Form::open(array('url' => '/application/forward_all', 'method' => 'post', 'role' => 'form','id'=>"forward-all-form" , 'class' => 'form-horizontal')) !!}
                <!-- CARD HEADER-->
                <div class="card-header border-0">
                    <h3 class="card-title">Application List</h3>
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
                <!-- CARD HEADER ENDS-->

                <!-- CARD BODY-->
                <div class="card-body table-responsive">
                    @if (isset($Applications))
                    <table id="table_list" class="table table-bordered table-striped table-valign-middle">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Applicant</th>
                                <th>Date of Birth</th>
                                <th>From Branch</th>
                                <th>Status</th>
                                <th>Forward Date</th>
                                <th class="text-right py-0 align-middle">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach ($Applications['new'] as $Application)

                        <tr id="{{ $Application->id }}">
                            <td></td>
                            <td>
                                @if ($Application->applicant_image!='placeholder.png')
                                <img src="{{ url('images/applicants/'.$Application->applicant_image) }}" alt="Applicant 1" class="img-circle img-sm"> &nbsp;
                                @endif
                                
                                {{$Application->name}}
                            </td>
                            <td>{{ $Application->getDob($Application->dob) }}</td>
                            <td>{{ $Application->getPreferredBranchName->BR_NAME }}</td>
                            <td>
                            @if (isset($Application->status))
                                
                                @if ($Application->status==101)
                                    <span class="right badge badge-success">Accepted</span>
                                @elseif ($Application->status==102)
                                    <span class="right badge badge-danger">rm_forwarded</span>
                                @else
                                    <span class="right badge badge-primary">New</span>
                                @endif
                            @endif
                            </td>
                            <td>
                                @if (auth()->user()->getRoleName->role_short_name!=='admin')
                                {{ $Application->getDateTime($Application->logs[0]->created_at) }}    
                                @endif
                                
                            </td>
                            <td class="text-right py-0 align-middle">
                                <div class="btn-group btn-group-sm">
                                  <a href="{{ url('application/'.$Application->id) }}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="view"><i class="fas fa-eye"></i></a>
                                  @auth
                                    @if (auth()->user()->getRoleName->role_short_name=='br')
                                        @if ($Application->status==101)
                                            <a href="{{ url('application/'.$Application->id.'/associate-rm') }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Assign RM"><i class="fas fa-user-check"></i></a>
                                        @endif
                                    @endif
                                  @endauth
                                  
                                  @auth
                                    @if (auth()->user()->getRoleName->role_short_name!=='ho' && $Application->status!=101)
                                        <a href="{{ url('application/'.$Application->id.'/forward') }}" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="forward"><i class="fas fa-directions"></i></a>
                                    @endif
                                  @endauth
                                  
                                  @auth
                                    @if (auth()->user()->getRoleName->role_short_name==='ho')
                                        <a href="{{ url('application/'.$Application->id.'/AC'.'/forward') }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Accept"><i class="fas fa-check"></i></a>
                                        <a href="{{ url('application/'.$Application->id.'/DEC'.'/forward') }}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Decline"><i class="fas fa-times"></i></a>
                                    @endif
                                  @endauth
                                  
                                </div>
                            </td>
                        </tr>
                        
                    @endforeach
                        </tbody>
                        
                        
                    </table>
                        
                    @endif
                    
                        
                    
                        
                </div>
                <!-- END CARD BODY -->
                <div class="card-footer">
                    <div class="form-group">
                        <div class="form-group col-md-12">
                            <label class="control-label">Add Remarks</label>
                            <div>
                                {!! Form::textarea('remarks', $value = null, array('id'=>'remarks', 'class' => 'form-control','rows'=>"4")) !!}
                                @if($errors->has('remarks'))<span class="required text-danger">{{ $errors->first('remarks') }}</span>@endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-4 col-md-8">
                            @if (isset($pageInfo["action"]))
                                @if ($pageInfo["action"]==='AC')
                                {!! Form::submit('Accept', array('class' => "btn btn-success")) !!} &nbsp;
                                @elseif ($pageInfo["action"]==='DEC')
                                {!! Form::submit('Decline', array('class' => "btn btn-danger")) !!} &nbsp;
                                @endif
                            @else
                            {!! Form::submit('Forward Multiple', array('class' => "btn btn-info")) !!} &nbsp;
                            @endif
                            
                        </div>
            
                    </div>
                </div>
                    
                {!! Form::close() !!}
            </div>
            <!-- END CARD -->
                
        </div>
        @endif
        @endauth--}}

        @auth
            {{--@if (auth()->user()->getRoleName->role_short_name==='br'
                || auth()->user()->getRoleName->role_short_name==='cm') --}}
            <div class="col-lg-12">
                @include('home.home_br')
            </div>
            {{--@endif--}}
        @endauth

        @guest
        <div class="callout callout-info">
            <h1 class="font-weight-light">Welcome to Padma Bank Marketing Associate.</h1>
            
        </div>
        <div class="card-body row">
            <a href="{{ url('application') }}" type="button" class="btn btn-info btn-block btn-flat">APPLY NOW <i class="fa fa-location-arrow"></i></a>
        </div>
        
        @endguest
@stop

@section('scripts')

<script>

function checkAllRow() 
{
    // var oTable = $("#table_list").DataTable({
    //     stateSave: true
    // });
    if( $(this).is(':checked') )
    {
        //allPages = oTable.rows().select();
        $("#table_list tbody tr").each(function() {
            $(this).addClass("selected");
        })
    }
    else {
        //allPages = oTable.rows().deselect();
        $("#table_list tbody tr").each(function() {
            $(this).removeClass("selected");
        })
    }
    
}

$(function()
{
    //Error show off Datatable
    $.fn.dataTable.ext.errMode = 'none';

    var oTable = $("#table_list").DataTable({
        @auth
        @if (auth()->user()->getRoleName->role_short_name!=='rm')
        'columnDefs': [ {
            'orderable': false,
            'className': 'select-checkbox',
            'targets':   0
        } ],
        
        'select': {
            'style': 'multi',
            'selector': 'td:first-child'
            
        },
        @endif
        @endauth
      
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#table_list_wrapper .col-md-6:eq(0)');


    $("#table_list_accepted").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#table_list_accepted_wrapper .col-md-6:eq(0)');

    $("#table_list_declined").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#table_list_declined_wrapper .col-md-6:eq(0)');

    $("#table_list_rm_assigned").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#table_list_rm_assigned_wrapper .col-md-6:eq(0)');
    
    $("#table_list_forwarded").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#table_list_forwarded_wrapper .col-md-6:eq(0)');

    $("#check_all").on('change',checkAllRow); // checkbox

    $('#multi_accept').on('click', function(e) //button
    { 
        var form = $('#forward-all-form');
        $(form).append(
            $('<input>')
                .attr('type', 'hidden')
                .attr('name', 'multi_action')
                .val("AC")
        );
    });

    $('#multi_decline').on('click', function(e) //button
    { 
        var form = $('#forward-all-form');
        $(form).append(
                $('<input>')
                    .attr('type', 'hidden')
                    .attr('name', 'multi_action')
                    .val("DEC")
            );
    });

    // Handle form submission event
    $('#forward-all-form').on('submit', function(e)
    {   
        var form = $('#forward-all-form');
        var rows_selected = $("#table_list tr.selected");
        $.each(rows_selected, function(index){
            $(form).append(
                $('<input>')
                    .attr('type', 'hidden')
                    .attr('name', 'id[]')
                    .val($(this).attr('id'))
            );
        });
    });
    //end handle form submission

    @auth
        @if (auth()->user()->getRoleName->role_short_name==='rm')
            $('#multi_remarks').slideUp();
            $('.card-tools').slideUp();
        @endif
    @endauth
    @auth
        @if (auth()->user()->getRoleName->role_short_name!=='rm')
            $('#new-tab').on('click',function(e){
                $('#multi_remarks').slideDown();
                $('.card-tools').slideDown();
            })
        @endif
    @endauth
    $('#accepted-tab, #declined-tab, #rm_assigned-tab, #forwarded-tab').on('click',function(e){
        $('#multi_remarks').slideUp();
        $('.card-tools').slideUp();
    })

    
});
</script>

@stop