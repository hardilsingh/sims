@extends('layouts.admin')




@section('content')


<style>
    .col-lg-4 {
        padding: 0 40px;
    }

    .col-lg-3 {
        padding: 0 40px;
    }
</style>


<div class="row" style="margin-bottom:80px;" class="text-center">
    <div class="col-lg-6">
        <h2><u>Add Station</u></h2>
    </div>
</div>


<div class="form-three widget-shadow">


    {!! Form::open([

    'action'=>'StationController@store',
    'method'=>'POST',
    'class'=>'form-horizontal'

    ]) !!}



    <div class="row">
            <div class="col-lg-4">
                <div class="form-group"> <label>Station Name</label> <input name="name" type="text" class="form-control" placeholder="Enter name"> </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group"> <label>Transport Fee</label> <input name="fee" type="text" class="form-control" placeholder="Enter Transport Fee"> </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group"> <label>Bus Number</label> <input name="bus" type="text" class="form-control" placeholder="Enter Bus Numner"> </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-3">
            <button class="btn btn-lg btn-success" type="submit">Submit</button>
        </div>
    </div>



    {!! Form::close() !!}

</div>


@stop