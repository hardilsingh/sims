@extends('layouts.admin')


@section('css-plugins')
@stop
@section('heading')
Dues List
@stop

@section('content')

<div class="row">
    <div class="col-lg-12 text-center">
        <a href="/exportDues?id={{$id}}" class="btn btn-warning btn-md" style="margin-bottom: 10px;">Export Dues List</a>
    </div>
</div>


<table class="table" style="padding:20px;" id="myTable">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Adm No.</th>
            <th scope="col">Father Name</th>
            <th scope="col">Class & Section</th>
            <th scope="col">Telephone</th>
            <!-- <th scope="col">Outstanding</th> -->
            <th scope="col">Fee</th>
        </tr>
    </thead>
    <tbody>
        @php
        $i = 1
        @endphp
        <?php 
        
        foreach ($students as $student) {

            if ($student->getStudent->class !== $_GET['class'] && $student->getStudent->section !== $_GET['section']) {
                continue;
            }

            $name = $student->getStudent->name;
            $adm = $student->getStudent->adm_no;
            $father = $student->getStudent->father;
            $class = $student->getStudent->class == 100 ? 'Pre-Nursery 1' : $student->getStudent->class ."-" .$student->getStudent->section;
            $tel = $student->getStudent->tel1;

            echo "<tr>";
            echo "<td>". $i++."</td>";
            echo "<td>". $name." </td>";
            echo "<td>".$adm."</td>";
            echo "<td>". $father ."</td>";
            echo "<td>".$class."</td>";
            echo "<td>".$tel."</td>";
            // echo"<td>$student->outstanding</td>";
            echo "<td><a href='fee/student/$student->id' class='btn btn-warning'>Fee</a></td>";
            echo "</tr>";
        } 
        
        ?>



    </tbody>
</table>



@stop

@section('script-plugins')

@stop