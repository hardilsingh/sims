@extends('layouts.admin')



@section('content')


<div class="row" style="margin-bottom:30px;" class="text-center">
    <div class="col-lg-6">
        <h2><u>Gate Passes</u></h2>
    </div>

</div>


<div class="row">
    <div class="col-lg-12">
        <table id="myTable" class="table">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>With Whom</th>
                    <th>Issued On</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i = 1
                @endphp
                @foreach($passes as $pass)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$pass->name}}</td>
                    <td>{{$pass->class}}</td>
                    <td>{{$pass->with_whom}}</td>
                    <td>{{$pass->created_at->toDateTimeString()}}</td>
                    <td style="display:flex;">
                        {!! Form::model($pass , [

                        'action'=>['GatePassController@destroy' , $pass->id],
                        'method'=>'DELETE'

                        ]) !!}
                        {!! Form::submit('Delete' , ['class'=>'btn btn-danger btn-md' , 'onclick'=>'checkDel()']) !!}
                        {!! Form::close() !!}
                        <a href="{{route('gate-passes.edit' , $pass->id)}}" style="margin-left:10px;" class="btn btn-md btn-warning">Edit</a>
                        <a href="{{route('gate-passes.show' , $pass->id)}}" style="margin-left:10px;" class="btn btn-md btn-success" >Show</a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>




@stop

