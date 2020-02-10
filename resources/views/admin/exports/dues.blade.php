<?php
libxml_use_internal_errors(true);
?>

<table class="table" style="padding:20px;" id="myTable">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Adm No.</th>
            <th scope="col">Father Name</th>
            <th scope="col">Class & Section</th>
            <th scope="col">Telephone</th>
            <th scope="col">Total Pending</th>
        </tr>
    </thead>
    <tbody>
        @php
        $j = 1
        @endphp
        <?php
        $month_array = [];
        $fee_array = [];
        foreach ($students as $student) {



            

                    $name = $student->getStudent->name;
                    $adm = $student->getStudent->adm_no;
                    $father = $student->getStudent->father;
                    $class = $student->getStudent->class == 100 ? 'Pre-Nursery 1' : $student->getStudent->class . "-" . $student->getStudent->section;
                    $tel = $student->getStudent->tel1;

                    echo "<tr>";
                    echo "<td>" . $j++ . "</td>";
                    echo "<td>" . $name . " </td>";
                    echo "<td>" . $adm . "</td>";
                    echo "<td>" . $father . "</td>";
                    echo "<td>"?>


@if($student->getStudent->class == 100)
                    Pre Nursery-1
                    @endif
                    @if($student->getStudent->class == 101)
                    Nursery
                    @endif
                    @if($student->getStudent->class == 102)
                    L.K.G
                    @endif
                    @if($student->getStudent->class == 103)
                    U.K.G
                    @endif
                    @if($student->getStudent->class < 100) <?php

                                                    $a = $student->getStudent->class;
                                                    echo $a . substr(date('jS', mktime(0, 0, 0, 1, ($a % 10 == 0 ? 9 : ($a % 100 > 20 ? $a % 10 : $a % 100)), 2000)), -2);

                                                    ?> @endif
                    - {{$student->getStudent->section}}
                <?php
                    "</td>";
                    echo "<td>" . $tel . "</td>";

                    echo "<td style='font-weight:bolder'> " . $student->total . "</td>";
                    echo "</tr>";

        }
                    ?>



    </tbody>
</table>