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
            @include('claim_incentive.claim_table.tabs_claim')
            <!-- END CARD -->
            
        </div>
        
        
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

$(function(){
    //Error show off Datatable
    $.fn.dataTable.ext.errMode = 'none';

    $("#table_list").DataTable({
        
        'columnDefs': [ {
            'orderable': false,
            'className': 'select-checkbox',
            'targets':   0
        } ],
        
        'select': {
            'style': 'multi',
            'selector': 'td:first-child'
            
        },
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#table_list_wrapper .col-md-6:eq(0)');

    $("#check_all").on('change',checkAllRow); // checkbox

    $('#multi_accept_claim').on('click', function(e) //button
    { 
        var form = $('#forward-all-form');
        $(form).append(
            $('<input>')
                .attr('type', 'hidden')
                .attr('name', 'multi_action')
                .val("AC")
        );
    });

    $('#multi_decline_claim').on('click', function(e) //button
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
        @if (auth()->user()->getRoleName->role_short_name==='rm'||
        auth()->user()->getRoleName->role_short_name=='assc')
            $('#multi_remarks').slideUp();
            $('.card-tools').slideUp();
            
        @endif
    @endauth
    @auth
        @if (!(auth()->user()->getRoleName->role_short_name=='rm' ||
        auth()->user()->getRoleName->role_short_name=='assc'))
            $('#new-tab').on('click',function(e){
                $('#multi_remarks').slideDown();
                $('.card-tools').slideDown();
            })
        @endif
    @endauth
    $('#forwarded-tab').on('click',function(e){
        $('#multi_remarks').slideUp();
        $('.card-tools').slideUp();
    })
    ///////////////////////////////////////////////////////


    $(".fancybox").fancybox({
        openEffect: "elastic",
        closeEffect: "elastic",
        beforeShow : function(){
            this.title =  $(this.element).data("caption");
        }
    });

    
    
    $(".zoom").hover(function(){
        
        $(this).addClass('transition');
    }, function(){
        
        $(this).removeClass('transition');
    });

});
</script>

@stop

