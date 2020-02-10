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
        <h2><u>School Leaving Certificate</u></h2>
    </div>
</div>


{!! Form::open([
'method'=>'POST',
'action'=>'TcController@store',
])
!!}

<div class="row">
    <div class="col-lg-3">
        <div class="form-group">
            <label for="">Nationality</label>
            <input type="text" required class="form-control" name="nationality"
                oninput="this.value = this.value.toUpperCase()" value="INDIAN">
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label for="">Weather failed once or twice</label>
            <input type="text" required class="form-control" name="failed"
                oninput="this.value = this.value.toUpperCase()" value="NO">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label for="">Subjects</label>
            <select class="js-example-basic-multiple form-control" name="subjects[]" multiple="multiple">
                <option value="HINDI">Hindi</option>
                <option value="ENGLISH">English</option>
                <option value="MATHS">Maths</option>
                <option value="SCIENCE">Science</option>
                <option value="PUNJABI">Punjabi</option>
                <option value="SOCIAL STUDIES">Social Studies</option>
            </select>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-3">
        <div class="form-group">
            <label for="">Total Present Days</label>
            <input type="text" autofocus required class="form-control" name="tpd"
                oninput="this.value = this.value.toUpperCase()" placeholder="Present Days">
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label for="">Total Working Days</label>
            <input type="text" required class="form-control" name="twd" oninput="this.value = this.value.toUpperCase()"
                placeholder="Working Days">
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group">
            <label for="">Weather an NCC cadet/Boy Scout/Girl Scout/Girl Guide:</label>
            <input type="text" required class="form-control" name="scout"
                oninput="this.value = this.value.toUpperCase()" value="NO">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-3">
        <div class="form-group">
            <label for="">Dues Paid Till</label>
            <input type="text" required class="form-control" name="dues" oninput="this.value = this.value.toUpperCase()"
                placeholder="Enter Month here">
        </div>
    </div>

    <div class="col-lg-3">
        <div class="form-group">
            <label for="">Games Played</label>
            <input type="text" required class="form-control" name="games"
                oninput="this.value = this.value.toUpperCase()" value="NO">
        </div>
    </div>

    <div class="col-lg-3">
        <div class="form-group">
            <label for="">General Conduct</label>
            <input type="text" required class="form-control" name="conduct"
                oninput="this.value = this.value.toUpperCase()" value="GOOD">
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label for="">Date of application for certificate</label>
            <input type="date" required class="form-control" name="doa" oninput="this.value = this.value.toUpperCase()"
                value="{{now()->toDateString()}}">
        </div>
    </div>

    <input type="hidden" name="student_id" value="{{$_GET['id']}}">
    <input type="hidden" name="session" value="{{$student->session}}">
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
</div>

<div class="row" style="margin-top: 30px;;">
    <div class="col-lg-3">
        <div class="form-group">
            {!! Form::submit('Issue Certificate' , ['class'=>'btn btn-md btn-warning']) !!}
        </div>
    </div>

</div>

{!! Form::close() !!}


@stop
