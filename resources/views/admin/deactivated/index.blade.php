@extends('layouts.admin')




@section('heading')
Deactivated Students
@stop

@section('title')
Deactivated Students
@stop
@section('content')




<div class="row">
    <div class="col-lg-12">
        <table class="table" id="myTable">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Adm No.</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Father Name</th>
                    <th scope="col">Class</th>
                    <th scope="col">Section</th>
                    <th scope="col">Tel</th>
                    <th scope="col">Gender</th>
                    <th scope="col">View</th>

                </tr>
            </thead>
            <tbody>

                @php
                $i = 1
                @endphp

                @foreach($results as $result)

                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$result->name}}</td>
                    <td>{{$result->adm_no}}</td>
                    <td>{{\Carbon\Carbon::parse($result->dob)->format('d/m/Y')}}</td>
                    <td>{{$result->father}}</td>
                    <td>
                        @if($result->class == 100)
                        Pre Nursery-1
                        @endif
                        @if($result->class == 101)
                        L.K.G
                        @endif
                        @if($result->class == 102)
                        U.K.G
                        @endif
                        @if($result->class !== 100 && $result->class !== 101 &&$result->class !== 102)
                        {{$result->class}}
                        @endif
                    </td>
                    <td>{{$result->section}}</td>
                    <td>{{$result->tel1}}</td>
                    <td>{{$result->gender == 0 ? 'Male' : 'Female'}}</td>
                    <td>
                        <a href='students/{{$result->id}}' class='btn btn-success'>View</a>
                    </td>


                </tr>

                @endforeach
            </tbody>
        </table>
    </div>



</div>





@stop