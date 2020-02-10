<div class="div" style="position:absolute; top:55%; transform:translateY(-50%); padding:0px 75px;">
    <p style="text-align:center; font-size:22px;   margin-bottom:25px;"><u>TO WHOMSOEVER IT MAY CONCERN</u></p>
    <p style="text-align:justify; line-height:200%; font-size:20px;   margin-bottom:50px;">


        <span style="margin-left:50px;"></span>This is to certify that <span style="font-weight:bolder; text-transform:capitalize; text-decoration:underline">{{$certificate->name}}</span> S/O,D/o: <span style="font-weight:bolder; text-transform:capitalize; text-decoration:underline">{{$certificate->father_name}}; Mother name:{{$certificate->mother_name}}; R/O {{$certificate->address}} </span> is a bonafide student of our school. He/She is studying in Class <span style="font-weight:bolder; text-transform:capitalize;">
            @if($certificate->class == 100)
            Pre Nursery-1
            @endif
            @if($certificate->class == 101)
            Nursery
            @endif
            @if($certificate->class == 102)
            L.K.G
            @endif
            @if($certificate->class == 103)
            U.K.G
            @endif
            @if($certificate->class < 100) <?php

                                        $a = $certificate->class;
                                        echo $a . substr(date('jS', mktime(0, 0, 0, 1, ($a % 10 == 0 ? 9 : ($a % 100 > 20 ? $a % 10 : $a % 100)), 2000)), -2);

                                        ?> @endif (Session:{{$certificate->session}})</span> vide Admission no. <span style="font-weight:bolder; text-transform:capitalize; text-decoration:underline">{{$certificate->adm_no}}.</span> His/Her Date of birth is <span style="font-weight:bolder; text-transform:capitalize;">{{date('d-m-Y', strtotime($certificate->dob))}}





            <?php
            // PHP program to convert number to month name 

            // Declare month number and initialize it 


            $month = date('m', strtotime($certificate->dob));
            $date = date('d', strtotime($certificate->dob));
            $year = date('y', strtotime($certificate->dob));
            $monthNum = $month;

            // Create date object to store the DateTime format 
            $dateObj = DateTime::createFromFormat('!m', $monthNum);

            // Store the month name to variable 
            $monthName = $dateObj->format('F');

            // Display output 
            echo "(" . $date . "-" . $monthName . "-" . $year . ")";

            ?>





        </span> as per school record.
    </p>
    <p style="text-align:left; padding:60px 0px; font-size:20px; font-weight:bolder;">PRINCIPAL</p>
</div>