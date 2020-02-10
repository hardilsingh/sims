@extends('layouts.admin')



@section('content')


<div class="row" style="margin-bottom:30px;" class="text-center">
    <div class="col-lg-6">
        <h2><u>Character Certificates</u></h2>
    </div>
</div>





<div class="col-lg-12">
    <table id="myTable" class="table">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Admission Number</th>
                <th>Name</th>
                <th>Father name</th>
                <th>Mother name</th>
                <th>Class name</th>
                <th>Issued On</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1
            @endphp
            @foreach($certificates as $certificate)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$certificate->adm_no}}</td>
                <td>{{$certificate->name}}</td>
                <td>{{$certificate->father_name}}</td>
                <td>{{$certificate->mother_name}}</td>
                <td>
                    @if($certificate->class == 100)
                    L.K.G
                    @endif
                    @if($certificate->class == 101)
                    U.K.G
                    @endif
                    @if($certificate->class == 102)
                    <?php

                    $a = $certificate->class;
                    echo $a . substr(date('jS', mktime(0, 0, 0, 1, ($a % 10 == 0 ? 9 : ($a % 100 > 20 ? $a % 10 : $a % 100)), 2000)), -2);

                    ?>
                    @endif
                    @if($certificate->class < 100)
                    <?php

                    $a = $certificate->class + 1;
                    echo $a . substr(date('jS', mktime(0, 0, 0, 1, ($a % 10 == 0 ? 9 : ($a % 100 > 20 ? $a % 10 : $a % 100)), 2000)), -2);

                    ?>
                    @endif
                </td>
                <td>{{$certificate->created_at->toDateString()}}</td>
                <td style="display:flex;">
                    <a href="{{route('character-certificates.edit' , $certificate->id)}}" style="margin-left:10px;" class="btn btn-md btn-warning">Edit</a>
                    <a href="{{route('character-certificates.show' , $certificate->id)}}" style="margin-left:10px;" target="_blank" class="btn btn-md btn-success">Show</a>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>




@stop