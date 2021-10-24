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
        <li class="breadcrumb-item active">{{ $pageInfo['title'] }}</li>
        </ol>
    </div>
</div>
@stop

@section('content')
        <div class="col-lg-12">
            <!-- CARD -->
            <div class="card">
                <!-- CARD HEADER-->
                <div class="card-header border-0">
                    <h3 class="card-title"> {{ $pageInfo['title'] }} </h3>
                    <div class="card-tools">
                        <a href="{{ url('role/create') }}" class="btn btn-tool btn-sm">
                            <i class="fas fa-plus"></i>
                        </a>
                        <!--a href="#" class="btn btn-tool btn-sm">
                            <i class="fas fa-download"></i>
                        </a>
                        <a href="#" class="btn btn-tool btn-sm">
                            <i class="fas fa-bars"></i>
                        </a!-->
                    </div>
                </div>
                <!-- CARD HEADER ENDS-->

                <!-- CARD BODY-->
                <div class="card-body table-responsive">
                    @if (isset($roles) )
                    <table id="table_list" class="table table-bordered table-striped table-valign-middle">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Role Name</th>
                                <th>Short Name</th>
                                <th>Parent Role</th>
                                <th class="text-right py-0 align-middle">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach ($roles as $i => $role)
                            
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{ $role->role_name }}</td>
                            <td>{{ $role->role_short_name }}</td>
                            <td>@if(isset($role->parent_role_id)){{ $role->getRoleShortName($role->parent_role_id) }}@endif</td>
                            {{--<td>
                                <small class="text-success mr-1">
                                <i class="fas fa-arrow-up"></i>
                                12%
                                </small>
                                12,000 Sold
                            </td>--}}
                            
                            <td class="text-right py-0 align-middle">
                                <div class="btn-group btn-group-sm">
                                  {{--<a href="{{url('/')}}/registration/{{$role->id}}/edit" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="view"><i class="fas fa-eye"></i></a>--}}
                                  <a href="{{url('/')}}/role/{{$role->id}}/edit" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="view"><i class="fas fa-edit"></i></a>
                                  <!--a href="#" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="edit"><i class="fas fa-edit"></i></a-->
                                  <a href="#" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="delete"><i class="fas fa-trash"></i></a>
                                  <!--a href="#" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="forward"><i class="fas fa-directions"></i></a-->
                                
                                </div>
                            </td>
                        </tr>
                        
                    @endforeach
                        </tbody>
                        
                    </table>
                        
                    @endif
                    
                        
                    
                        
                </div>
                <!-- END CARD BODY -->
            </div>
            <!-- END CARD -->
        </div>
@stop

@section('scripts')

<script>

$(function(){
    $("#table_list").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#table_list_wrapper .col-md-6:eq(0)');
});
</script>

@stop

