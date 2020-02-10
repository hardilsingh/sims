@extends('layouts.admin')

@section("heading")
Transfer Certificates
@stop

@section('content')


<div class="row" style="margin-bottom:100px;" class="text-center">
    <div class="col-lg-6">
        <h2><u>Transfer Certificates</u></h2>
    </div>
</div>





<div class="col-lg-12">
    <table id="myTable" class="display">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Admission Number</th>
                <th>Name</th>
                <th>Class</th>
                <th>Admission Date</th>
                <th>Tel</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1
            @endphp
            @foreach($tcs as $tc)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$tc->getStudent->adm_no}}</td>
                <td>{{$tc->getStudent->name}}</td>
                <td>
                    @if($tc->getStudent->class == 100)
                    Pre Nursery-1
                    @endif
                    @if($tc->getStudent->class == 101)
                    L.K.G
                    @endif
                    @if($tc->getStudent->class == 102)
                    U.K.G
                    @endif
                    @if($tc->getStudent->class !== 100 && $tc->getStudent->class !== 101 &&$tc->getStudent->class !== 102)
                    {{$tc->getStudent->class}}
                    @endif
                    -{{$tc->getStudent->section}}</td>
                    <td>{{Carbon\carbon::parse($tc->getStudent->admission_date)->format('d/m/Y')}}</td>
                    <td>{{$tc->getStudent->tel1}}</td>
                    <td><a href="{{route('transfer-certificates.show' , $tc->id)}}" class="btn btn-md btn-warning">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>




@stop

@section('script-plugins')

@stop