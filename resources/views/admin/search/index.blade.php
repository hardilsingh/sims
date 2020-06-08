@extends('layouts.admin')
@section('heading')
Search By Station
@stop

@section('content')


<div class="row">
    <div class="col-lg-12">
        <label for="">Select Class:</label>
        <select name="stations" class="form-control" id="station">
            <option value="">Select a station from list</option>

            @foreach($stations as $station)
            <option value="{{$station->id}}">{{$station->name}}</option>
            @endforeach
        </select>
    </div>
    <button id="search" class="btn btn-primary" style="margin: 20px">Search</button>
</div>


@if(isset($_GET['id']))
<div style="display: none;">
    {{$students = App\Students::where('station', $_GET['id'])->get()}}
    {{$station = App\Station::findOrFail($_GET['id'])}}
</div>

<div class="row" style="margin-bottom: 50px;">
    <div class="col-lg-12">
        <table class="table" id="table2">
            <thead class="thead-dark">
                <tr>
                    <th>Sr.</th>
                    <th>Bus Station name</th>
                    <th>Bus No.</th>
                    <th>Route No.</th>
                    <th>No of Students.</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{$station->name}}</td>
                    <td>{{$station->bus}}</td>
                    <td>{{$station->route}}</td>
                    <td>{{count($students)}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <table class="table" id="table2">
            <thead>
                <tr>
                    <th>Sr.</th>
                    <th>Adm No.</th>
                    <th>Name</th>
                    <th>Father Name.</th>
                    <th>Contact</th>
                    <th>Bus Station Name</th>
                    <th>Bus No</th>
                    <th>Bus Route</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i = 1
                @endphp
                @foreach($students as $student)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$student->adm_no}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->father}}</td>
                    <td>{{$student->tel1}}</td>
                    <td>{{$student->stationName->name}}</td>
                    <td>{{$student->stationName->bus}}</td>
                    <td>{{$student->stationName->route}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif


<!-- Small modal -->


@stop

@section('script-plugins')
<script>
    document.getElementById("search").addEventListener('click', () => {
        const id = document.getElementById('station').value
        $(location).attr('href', `/stationSearch?id=${id}`);
    })
</script>
@stop