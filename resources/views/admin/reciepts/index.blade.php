@extends('layouts.admin')


@section('heading')
Reciepts
@stop


@section('content')



<div class="row" style="padding:30px 20px;">
    <div class="col-lg-3">
        <div class="form-group">
            From: <input class="form-control" value="{{now()->toDateString()}}" type="date" name="from" id="from">
        </div>


    </div>
    <div class="col-lg-3">
        <div class="form-group">

            To: <input class="form-control" value="{{now()->toDateString()}}" type="date" name="to" id="to">
        </div>


    </div>

    <button id="generate" class="nav-link btn btn-sm btn-success">
        Generate
    </button>



</div>
<div class="row">
    <div class="col-lg-12">
        <table id="myTable" class="table">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Class & Section</th>
                    <th>Father Name</th>
                    <th style="text-align: right">Recieved Amount</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @php
                $j = 1
                @endphp
                @foreach($reciepts as $reciept)

                <tr>
                    <td>{{$j++}}</td>
                    <td>{{$reciept->getStudent->name}}</td>
                    <td>{{$reciept->getStudent->class == 100 ? 'Pre-Nursery 1' : $reciept->getStudent->class}}-{{$reciept->getStudent->section}}</td>
                    <td>{{$reciept->getStudent->father}}</td>
                    <td style="text-align: right">₹ {{$reciept->paid}}</td>
                    <td style="display:flex;">
                        <a href="{{route('reciepts.show' , $reciept->id)}}" style="margin-left:10px;" class="btn btn-md btn-warning">Show</a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>

</div>





@stop

@section('script-plugins')
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();



        $("#generate").click(function() {
            window.location.href="/transactionReport?from=" + $("#from").val() + "&to=" + $("#to").val();
        })

        console.log($("#from").val());
    });
</script>
@stop