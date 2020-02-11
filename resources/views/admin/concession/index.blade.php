@extends('layouts.admin')


@section('heading')
Concessions
@stop



@section('content')




<div class="form-three widget-shadow" style="margin-bottom: 20px;">


    {!! Form::open([

    'action'=>'ConcessionController@store',
    'method'=>'POST',
    'class'=>'form-horizontal'

    ]) !!}



    <div class="row" style="display: flex;">

        <div class="col-lg-3">
            <div class="form-group"> <label>Name</label> <input name="name" type="text" class="form-control" placeholder="Enter name" required> </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group"> <label>Monthly Fee <span class="badge badge-success">(in %)</span> </label> <input name="monthly" type="text" required class="form-control" placeholder="Enter Concession "> </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group"> <label>Computer Fee <span class="badge badge-success">(in %)</span> </label> <input name="computer" type="text" required class="form-control" placeholder="Enter Concession "> </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group"> <label>Transport Fee <span class="badge badge-success">(in %)</span> </label> <input name="transport" type="text" required class="form-control" placeholder="Enter Concession "> </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group"> <label>Id card Fee <span class="badge badge-success">(in %)</span> </label> <input name="id_card" type="text" required class="form-control" placeholder="Enter Concession "> </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group"> <label>Examination Fee <span class="badge badge-success">(in %)</span> </label> <input name="examination" required type="text" class="form-control" placeholder="Enter Concession "> </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group"> <label>Stationary Fee <span class="badge badge-success">(in %)</span> </label> <input name="stationary" required type="text" class="form-control" placeholder="Enter Concession "> </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group"> <label>Application Fee <span class="badge badge-success">(in %)</span> </label> <input name="application" required type="text" class="form-control" placeholder="Enter Concession "> </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group"> <label>Admission Fee <span class="badge badge-success">(in %)</span> </label> <input name="admission" required type="text" class="form-control" placeholder="Enter Concession "> </div>
        </div>

        <div class="col-lg-3">
            <div class="form-group"> <label>Annual Fee <span class="badge badge-success">(in %)</span> </label> <input name="annual" required type="text" class="form-control" placeholder="Enter Concession "> </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group"> <label>Prospectus Fee <span class="badge badge-success">(in %)</span> </label> <input name="prospectus" required type="text" class="form-control" placeholder="Enter Concession "> </div>
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
                    <th>Name</th>
                    <th>Monthly</th>
                    <th>Computer</th>
                    <th>Transport</th>
                    <th>Id Card</th>
                    <th>Examination</th>
                    <th>Stationary</th>
                    <th>Application</th>
                    <th>Annual</th>
                    <th>Admission</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach($concessions as $concession)
                <tr>
                    <td>{{$concession->id}}</td>
                    <td>{{$concession->name}}</td>
                    <td>{{$concession->monthly}}%</td>
                    <td>{{$concession->computer}}%</td>
                    <td>{{$concession->transport}}%</td>
                    <td>{{$concession->id_card}}%</td>
                    <td>{{$concession->examination}}%</td>
                    <td>{{$concession->stationary}}%</td>
                    <td>{{$concession->application}}%</td>
                    <td>{{$concession->annual}}%</td>
                    <td>{{$concession->admission}}%</td>
                    <td style="display:flex;">
                        <a href="{{route('concession.edit' , $concession->id)}}" style="margin-left:10px;" class="btn btn-md btn-warning">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>




@stop