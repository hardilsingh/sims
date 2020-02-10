@extends('layouts.admin')


@section('heading')
Classes
@stop



@section('content')




<div class="form-three widget-shadow" style="margin-bottom:20px;">


    {!! Form::open([

    'action'=>'GradeController@store',
    'method'=>'POST',
    'class'=>'form-horizontal'

    ]) !!}






    <div class="row">
        <div class="col-lg-4">
            <div class="form-group"> <label>Grade</label> <input required name="class" type="text" class="form-control" placeholder="Enter Grade"> </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group"> <label>Admission Fee</label> <input value="0" name="admission" type="text" class="form-control" required placeholder="Enter Fee"> </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group"> <label>Annual Charges</label> <input value="0" name="annual" type="text" class="form-control" required placeholder="Enter Fee"> </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group"> <label>Enter Monthly Fee</label> <input required name="fee" type="text" class="form-control" required placeholder="Enter Monthly Fee "> </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group"> <label>Enter Computer Fee</label> <input required name="computer_fee" type="text" required class="form-control" placeholder="Enter Computer Fee "> </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group"> <label>Id Card</label> <input value="0" name="sports" type="text" class="form-control" required placeholder="Enter Fee"> </div>
        </div>
    </div>


    <div class="row">

        <div class="col-lg-3">
            <div class="form-group"> <label>Examination Fee</label> <input value="0" name="stationary" type="text" class="form-control" required placeholder="Enter Fee"> </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group"> <label>Stationary Fee</label> <input value="0" name="stationary_fee" type="text" class="form-control" required placeholder="Enter Fee"> </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group"> <label>Pospectus</label> <input value="0" name="prospectus" type="text" class="form-control" required placeholder="Enter Fee"> </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group"> <label>Application</label> <input value="0" name="application" type="text" class="form-control" required placeholder="Enter Fee"> </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-3">
            <button class="btn btn-md btn-success" type="submit">Submit</button>
        </div>
    </div>



    {!! Form::close() !!}

</div>


<hr class="hr">




<div class="row">

    <div class="col-lg-12">
        <table id="myTable" class="table">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Class</th>
                    <th>Monthly</th>
                    <th>Computer</th>
                    <th>Id Card</th>
                    <th>Examination</th>
                    <th>Stationary</th>
                    <th>Annual Charges</th>
                    <th>Admission</th>
                    <th>Prospectus</th>
                    <th>Application</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach($classes as $class)
                <tr>
                    <td>{{$class->id}}</td>
                    <td>{{$class->class}}</td>
                    <td>₹{{$class->fee}}</td>
                    <td>₹{{$class->computer_fee}}</td>
                    <td>₹{{$class->sports}}</td>
                    <td>₹{{$class->stationary}}</td>
                    <td>₹{{$class->stationary_fee}}</td>
                    <td>₹{{$class->annual}}</td>
                    <td>₹{{$class->admission}}</td>
                    <td>₹{{$class->prospectus}}</td>
                    <td>₹{{$class->application}}</td>
                    <td style="display:flex;">
                        <a href="{{route('classes.edit' , $class->id)}}" style="margin-left:10px;" class="btn btn-md btn-warning">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>




@stop