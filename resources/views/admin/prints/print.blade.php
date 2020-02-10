@extends('layouts.admin')
@section('heading')
Search Students
@stop
@section('content')


<div class="row">
    <div class="col-lg-12 text-center">
        <a href="/export?classId={{$class}}&sectionId={{$section}}&gender={{$gender}}&caste={{$caste}}&religion={{$religion}}" class="btn btn-warning btn-md" style="margin-bottom: 10px;">Export Student List</a>
    </div>
</div>


<div class="row">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Adm No.</th>
                <th scope="col">DOB</th>
                <th scope="col">Father Name</th>
                <th scope="col">Mother Name</th>
                <th scope="col">Class</th>
                <th scope="col">Section</th>
                <th scope="col">Telephone</th>
                <th scope="col">Gender</th>
                <th scope="col">Caste</th>
                <th scope="col">Religion</th>
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
                <td>{{$result->mother}}</td>
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
                    <?php

                    $a = $result->class;
                    echo $a . substr(date('jS', mktime(0, 0, 0, 1, ($a % 10 == 0 ? 9 : ($a % 100 > 20 ? $a % 10 : $a % 100)), 2000)), -2);

                    ?>
                    @endif
                </td>
                <td>{{$result->section}}</td>
                <td>{{$result->tel1}}</td>
                <td>{{$result->gender == 0 ? 'Male' : 'Female'}}</td>
                <td>
                    @if($result->cast_category == 1)General @endif
                    @if($result->cast_category == 2)SC @endif
                    @if($result->cast_category == 3)OB @endif
                    @if($result->cast_category == 4)ST @endif
                </td>
                <td>
                    @if($result->religion == 1)Hindu @endif
                    @if($result->religion == 2)Sikh @endif
                    @if($result->religion == 3)Jain @endif
                    @if($result->religion == 4)Muslim @endif
                    @if($result->religion == 5)Christian @endif
                    @if($result->religion == 6)Other @endif
                </td>

            </tr>

            @endforeach
        </tbody>
    </table>


</div>

<div class="row">
    <div class="col-lg-12 text-center">
        <a href="/export?classId={{$class}}&sectionId={{$section}}&gender={{$gender}}&caste={{$caste}}&religion={{$religion}}" class="btn btn-warning btn-md" style="margin-bottom: 10px;">Export Student List</a>
    </div>
</div>




@stop