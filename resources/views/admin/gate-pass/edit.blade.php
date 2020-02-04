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
        <h2><u>Edit Gate Pass</u></h2>
    </div>
</div>


<div class="form-three widget-shadow">


    {!! Form::model($pass , [

    'action'=>['GatePassController@update' , $pass->id],
    'method'=>'PATCH',
    'class'=>'form-horizontal'

    ]) !!}



    <div class="row">
        <div class="col-lg-12">
            <div class="form-group"> <label>Student name</label> <input value="{{$pass->name}}" name="name" type="text" class="form-control" placeholder="Enter name"> </div>


            <div class="form-group"> <label>Father Name</label> <input value="{{$pass->father_name}}" name="father_name" type="text" class="form-control" placeholder="Enter name"> </div>


            <div class="form-group"> <label>Class</label> <input value="{{$pass->class}}" name="class" type="text" class="form-control" placeholder="Enter class"> </div>



            <div class="form-group"> <label>With whom</label> <input value="{{$pass->with_whom}}" name="with_whom" type="text" class="form-control" placeholder="Enter name"> </div>

            <div class="form-group"> <label>Relation</label> <input value="{{$pass->relation}}" name="relation" type="text" class="form-control" placeholder="Enter relation"> </div>

            <div class="form-group"> <label>Reason</label> <textarea name="reasons" class="form-control" id="" cols="30" rows="4">{{$pass->reasons}}</textarea></div>



            <div class="form-group">
                <button class="btn btn-lg btn-success text-center" type="submit">Issue &rarr;</button>
            </div>

        </div>
    </div>




    {!! Form::close() !!}

</div>


@stop