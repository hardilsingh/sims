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
        <h2><u>Add Class</u></h2>
    </div>
</div>


<div class="form-three widget-shadow">


    {!! Form::model($grade , [

    'action'=>['GradeController@update' ,$grade->id],
    'method'=>'PATCH',
    'class'=>'form-horizontal'

    ]) !!}



    <div class="row">
        <div class="col-lg-4">
            <div class="form-group"> <label>Grade</label> <input required name="class" type="text" class="form-control" required value="{{$grade->class}}" placeholder="Enter Grade"> </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group"> <label>Enter Monthly Fee</label> <input required name="fee" type="text" required class="form-control" value="{{$grade->fee}}" placeholder="Enter Monthly Fee "> </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group"> <label>Enter Computer Fee</label> <input required name="computer_fee" required type="text" value="{{$grade->computer_fee}}" class="form-control" placeholder="Enter Computer Fee "> </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="form-group"> <label>Id Card</label> <input value="0" name="sports" type="text" class="form-control" required placeholder="Enter Fee" value="{{$grade->sports}}"> </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group"> <label>Examination Fee</label> <input value="0" name="stationary" type="text" required class="form-control" placeholder="Enter Fee" value="{{$grade->stationary}}"> </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group"> <label>Stationary Fee</label> <input value="0" name="stationary_fee" type="text" required class="form-control" placeholder="Enter Fee" value="{{$grade->stationary_fee}}"> </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="form-group"> <label>Admission Fee</label> <input value="0" name="admission" type="text" required value="{{$grade->admission}}" class="form-control" placeholder="Enter Fee"> </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group"> <label>Annual Charges</label> <input value="0" name="annual" type="text" required class="form-control" value="{{$grade->annual}}" placeholder="Enter Fee"> </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group"> <label>Pospectus</label> <input value="0" name="prospectus" type="text" required class="form-control" value="{{$grade->prospectus}}" placeholder="Enter Fee"> </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group"> <label>Application</label> <input value="0" name="application" type="text" required value="{{$grade->application}}" class="form-control" placeholder="Enter Fee"> </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-3">
            <button class="btn btn-md btn-success" type="submit">Submit</button>
        </div>
    </div>



    {!! Form::close() !!}

</div>


@stop