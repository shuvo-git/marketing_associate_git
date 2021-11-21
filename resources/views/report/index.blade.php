@extends('layouts.app')

@section('css')

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
        @auth
        <div class="col-lg-12">
            <!-- CARD -->
            <div class="card">
                <!-- CARD HEADER-->
                <div class="card-header border-0">
                    @include('report.search')
                </div>
                <!-- CARD HEADER ENDS-->

                <!-- CARD BODY-->
                <div class="card-body table-responsive">
                    
                    @if (isset($Applications))
                        <table id="table_list" class="table table-bordered table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Applicant</th>
                                    <th>Date</th>
                                    <th>Branch ID</th>
                                    <th>Branch</th>
                                    <th>Cluster</th>
                                    <th>RM Assigned</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Applications as $Application)
                                    <tr>
                                        <td>{{$Application->name}}</td>
                                        <td>{{ $Application->getDob($Application->created_at) }}</td>
                                        <td>{{ $Application->preferred_branch }}</td>
                                        <td>{{ $Application->getPreferredBranchName->BR_NAME }}</td>
                                        <td>
                                            @if(isset($Application->getPreferredBranchName->CLUSTER_ID))
                                            {{ $Application->getCluster($Application->getPreferredBranchName->CLUSTER_ID) }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $Application->getUser->name }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
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

function getBranchesByCluster(cluster_id) {
    $.ajax({
        url : "{{ url('/getBranchesByCluster') }}",
        type : "POST",
        //dataType : "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        cache : false,
        data: {
            cluster_id: cluster_id
        },
        timeout: 3000,
        success : function(data) 
        {
            $("#branch").html(data);
        },
        error: function() 
        {
            //alert("#"+id+"_district. Error");
        }
    });
}

$(function(){
    $("#table_list").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#table_list_wrapper .col-md-6:eq(0)');


    $(".table-dt-list").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('.table-dt-list_wrapper .col-md-6:eq(0)');

    $('#from_date').datetimepicker({format: 'L' });
    $('#to_date').datetimepicker({format: 'L' });
});
</script>

@stop