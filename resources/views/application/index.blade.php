@extends('layouts.app')

@section('styles')
    @parent
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">

@endsection

@section('content')

    

    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <div class="block-header">
                        <h2 style="color: #000 !important">{{ $pageTitle }}</h2>
                    </div>
                    <div class="pull-right">
                        <a href="{{url('DiscountPartner/create')}}" class="btn btn-xs waves-effect" title="Add">
                             <i class="fa fa-plus-square" aria-hidden="true"></i>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="body">
                    @include('messages.index')
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                            <tr>
                                <th>#SL</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Percentage</th>
                                <th>Description</th>
                                <th>Sort</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($discountPartners->count())
                                @foreach($discountPartners as $i => $discountPartner)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $discountPartner->category }}</td>
                                        <td>{{ $discountPartner->mou_merchants_name }}</td>
                                        <td>{{ $discountPartner->percentage }}</td>
                                        <td>{{ $discountPartner->description }}</td>
                                        <td>{{ $discountPartner->sort }}</td>
                                        <td>{{ $discountPartner->status }}</td>
                                        <td>
                                            <a href="{{url('/')}}/DiscountPartner/{{$discountPartner->id}}/edit" class="btn bg-blue btn-xs waves-effect" title="Edit">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                            <a href="javascript: document.getElementById('deleteForm').submit();" class="btn bg-red btn-xs waves-effect" title="Delete" onclick="deleteEvent({{ $discountPartner->id }})">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                            <form method="POST" id="deleteForm{{ $discountPartner->id }}" action="{{url('/')}}/DiscountPartner/{{$discountPartner->id}}">
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->

@endsection
@section('scripts')
    @parent

     
     
    <script type="text/javascript">
        function deleteEvent(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('deleteForm'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endsection




