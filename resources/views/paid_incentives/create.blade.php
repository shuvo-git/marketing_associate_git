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
    

    <div class="container-fluid">

        {{--
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <strong></strong> {{$error}}
                @endforeach
            </div>
        @endif
        --}}
        <div class="col-md-12">
            {!! Form::open(array('url' => 'paid-incentive-store/'.$claimIncentive->id, 'method' => 'post', 'role' => 'form','enctype'=>"multipart/form-data" , 
            'class' => 'form-horizontal')) !!}
                @include('paid_incentives._form')
            {!! Form::close() !!}
        </div>
    </div>
@stop



@section('scripts')
<script>
    function isNumber(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if(charCode == 110 || charCode == 190 || charCode == 46)
            return true;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }
    function isDigit(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }
    function tableAddRow(tableID) {
        var table = document.getElementById(tableID);

        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);

        var colCount = table.rows[0].cells.length;

        for(var i=0; i<colCount; i++) {
            var newcell	= row.insertCell(i);

            newcell.innerHTML = table.rows[0].cells[i].innerHTML;
            // alert(newcell.childNodes);
            switch(newcell.childNodes[0].type) {
                case "text":
                newcell.childNodes[0].value = "";
                break;
                case "checkbox":
                newcell.childNodes[0].checked = false;
                break;
                case "select-one":
                newcell.childNodes[0].selectedIndex = 0;
                break;
            }
        }

        $('.date-picker').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'dd/mm/yyyy',
            orientation: "bottom",
            maxDate: '0'
        });
    }

    function tableDeleteRow(tableID) {
        try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;

            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
            }
        } catch(e) {
            alert(e);
        }
    }
    

    $(document).ready(function () 
    {
        $('#date_disbursement').datetimepicker({
            format: 'L',
            defaultDate:'now'
        });

        //$('date_deposited[]').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        $(document).on("focus", ".datemask", function() { 
            $(this).inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })//.("99:99");
        });

        $(window).keydown(function(event){
            if(event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });
    });


    function remove(id) {
        $("#remove_"+id).remove();
    }


    var substringMatcher = function(strs) 
    {
        return function findMatches(q, cb) 
        {
            var matches, substringRegex;
            matches = [];
            substrRegex = new RegExp(q, 'i');

            $.each(strs, function(i, str) {
                if (substrRegex.test(str)) {
                    matches.push(str);
                }
            });

            cb(matches);
        };
    };

    

    
</script>
@stop