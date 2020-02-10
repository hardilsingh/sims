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
        <h2><u>Create Birth Certificate</u></h2>
    </div>
</div>


<div class="form-three widget-shadow">


    {!! Form::model( $certificate , [

    'action'=>['BcController@update' , $certificate->id],
    'method'=>'PATCH',
    'class'=>'form-horizontal'

    ]) !!}

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group"> <label>Student name</label> <input name="name" value="{{$certificate->name}}" type="text" class="form-control" placeholder="Enter name"> </div>



            <div class="form-group"> <label>Father Name</label> <input name="father_name" value="{{$certificate->father_name}}" type="text" class="form-control" placeholder="Enter name"> </div>

            <div class="form-group"> <label>Mother Name</label> <input name="mother_name" value="{{$certificate->mother_name}}" type="text" class="form-control" placeholder="Enter name"> </div>


            <div class="form-group"> <label>Address.</label> <input name="address" value="{{$certificate->address}}" type="text" class="form-control" 


            <div class="form-group"> <label>Class</label> <input name="class" value="{{$certificate->class}}" type="text" class="form-control" placeholder="Enter class"> </div>


            <div class="form-group"> <label>Adm No.</label> <input name="adm_no" value="{{$certificate->adm_no}}" type="text" class="form-control" placeholder="Enter number"> </div>


            <div class="form-group"> <label>DOB (In Words)</label> <input name="dob" value="{{$certificate->dob}}" type="text" class="form-control" placeholder="Enter in words"> </div>


            <div class="form-group">
                <button class="btn btn-lg btn-success text-center" type="submit">Submit &rarr;</button>
            </div>

        </div>
    </div>




    {!! Form::close() !!}

</div>


@stop