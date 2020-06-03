<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <style>
        body {
            font-size: 19px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        td {
            padding: 4px 4px;
            ;
            white-space: nowrap;
        }


        .p {
            transform: translateY(-5px)
        }

        th {
            white-space: nowrap;
        }
    </style>

    <section style="text-align:center; line-height:50%">
        <h2 class="h2">KALGIDHAR INTERNATIONAL SEN. SEC. SCHOOL</h2>
        <p class="p">12 Mile Stone away Gurdaspur-Mukerian National Highway, VPO. Purana Shalla, Distt. Gurdaspur (PB)</p>
        <p class="p"><span><b>Email ID:</b> principalkisps@gmail.com</span> <span style="text-align: right"> <b>Website:</b> www.kalgidharschool.org.in</span><span>, Contact No. 81460-60115, 78374-98739</span></p>
    </section>

    <hr class="hr" style="color: black">


    <div>
        <h2 style="text-align: center;"><U>ADMISSION FORM</U></h2>
        <table style="text-transform:capitalize">
            <tr>
                <td colspan="3">
                    DOB Certificate<input value="1" name="DOB_certificate" {{$student->DOB_certificate == 1 ? 'checked' : false}} type="checkbox" style="margin-right: 10px; margin-left:10px">

                    School Leaving Certificate<input value="1" name="slc" {{$student->slc == 1 ? 'checked' : false}} type="checkbox" style="margin-right: 10px; margin-left:10px">

                    Report Card<input value="1" name="report_card" {{$student->report_card == 1 ? 'checked' : false}} type="checkbox" style="margin-right: 10px; margin-left:10px">

                    Aadhar Card<input value="1" name="aadhar_card" {{$student->aadhar_card == 1 ? 'checked' : false}} type="checkbox" style="margin-right: 10px; margin-left:10px">

                    Transfer Certificate<input value="1" name="tc" {{$student->tc == 1 ? 'checked' : false}} type="checkbox" style="margin-right: 10px; margin-left:10px">
                </td>
            </tr>

            <tr>
                <td>1. Name of the Student <br><br>(Age on the time of admission)</td>
                <td colspan="1" style="text-transform: uppercase">{{$student->name}} &nbsp;&nbsp;&nbsp;({{$student->gender == 0 ? 'Male' : "Female"}}) <br><br> ({{$age}})</td>
                <td>
                    <div style="height: 150px; width:120px; border:2px solid black; border-radius:7px;">
                        <span>Student Photo</span>
                    </div>
                </td>
            </tr>

            <tr>
                <td>2. Father name</td>
                <td style="text-transform: uppercase">{{$student->father}} <br>
                    Father Occupation: {{$father->occupation == 0 ? "N/A" : $father->occupation }}</td>
            </tr>
            <tr>
                <td>3. Mother name</td>
                <td style="text-transform: uppercase">{{$student->mother}}<br>
                    Mother Occupation: {{$mother->occupation == 0 ? "N/A" : $mother->occupation }}
                </td>
            </tr>
            <tr>
                <td>4. Telephone 1</td>
                <td style="text-transform: uppercase"> {{$student->tel1}} , {{$student->tel2 == 0 ? "N/A" : $student->tel2}} </td>

            </tr>
            <tr>
                <td>5. Date Of Birth</td>
                <td style="text-transform: uppercase">{{\Carbon\Carbon::parse($student->dob)->format('d/m/Y')}}<br>
                    DOB in words:

                    <?php
                    // PHP program to convert number to month name 

                    // Declare month number and initialize it 


                    $month = date('m', strtotime($student->dob));
                    $date = date('d', strtotime($student->dob));
                    $year = date('y', strtotime($student->dob));
                    $monthNum = $month;

                    // Create date object to store the DateTime format 
                    $dateObj = DateTime::createFromFormat('!m', $monthNum);

                    // Store the month name to variable 
                    $monthName = $dateObj->format('F');

                    // Display output 
                    echo  $date . "-" . $monthName . "-" . $year;

                    ?>
                </td>
            </tr>
            <tr>
                <td>6. Caste Category</td>
                <td style="text-transform: uppercase">{{$student->casteName->name}} &nbsp;&nbsp;&nbsp; {{$student->religionName->name}}</td>
            </tr>
            <tr>
                <td>7. Aadhar Card Number</td>
                <td style="text-transform: uppercase">
                    <?php
                    $price = $student->addhar_number;

                    $price_text = (string) $price; // convert into a string
                    $arr = str_split($price_text, "4"); // break string in 3 character sets

                    $price_new_text = implode("-", $arr);  // implode array with comma

                    echo $price_new_text; // will output 987,536,453
                    ?>
                </td>

            </tr>
            <tr>
                <td>8. Address</td>
                <td colspan="2" style="text-transform: uppercase">{{$student->vill}}, {{$student->postoffice}},<br>{{$student->tehsil}}, <br>{{$student->district}}, {{$student->pincode}},<br> {{$student->state}}</td>
            </tr>
            <tr>
                <td colspan="3">9. Name of the person responsible for paying fee</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="5">10. Name of the school last studied and Medium of instruction _____________________________________________________________ <br><br>(a)Class studied Upto ___________(School Leaving certificate to be supplied at the time of admission) <br><br> (b) Year of passing in final school examination if promotions are normal.</td>
            </tr>
            <tr>
                <td colspan="5">11. Instructions regarding visitors and special arrangements if any, <br>to be mentioned on the reverse of the form.</td>
            </tr>
            <tr>
                <td colspan="5">12. Name and address of two references<br><br>
                    1.______________________________________________ 2.______________________________________________
                </td>
            </tr>
            <tr>
                <td colspan="5">13. Name of brothers ans sisters studying in school.
                    ______________________________________________________</td>

            </tr>

        </table>

        <b>
            <p class="p" style="font-size: 12px;">The school will not be liable for any damages/charges on account of injuries fatal or otherwise, which may be sustained by the student during his/her stay in the school while taking part in sport/games or any other form of activities of the school within the school premises</p>

            <p style="font-size: 12px;">I undertake follow all school rules and the payment of fee and all sundry expenses in advance. I shall give one month's notice of withdrawl or shall pay the amount in lieu of notice.</p>
        </b>

        <div style="display: flex; align-items:center; margin-bottom:120px; transform:translateY(50px);">
            <p style="margin-right: 30px;">For office seal</p>
            <div style="height: 120px; width:160px; border:2px solid black; border-radius:7px;">
            </div>

            <div class="div" style="position:absolute; right:0;">
            <br><br><br>
                <p>Signature of parents/guardian_______________________________</p>
                <div style="font-size: 25px">
                    <p style="text-align: right">Registration/Adm No.&nbsp;&nbsp;&nbsp;&nbsp; <b>{{$student->adm_no}}</b></p>
                    <p style="text-align: right">Date of joining:&nbsp;&nbsp;&nbsp;&nbsp;<b>{{\Carbon\Carbon::parse($student->admission_date)->format('d/m/Y')}}</b></p>
                    <p style="text-align: right">Class to which admitted: &nbsp;&nbsp;&nbsp;&nbsp;<b> {{$student->grade->class}}</b></p>
                </div>
            </div>

        </div>


        <div style="display: flex; align-items:center; justify-content:space-between; transform: translateY(50px)">
            <p style="text-align: left">Form Filled By: {{$student->clerkName->name}}</p>
            <p style="text-align:right;">Principal Signature</p>

        </div>





    </div>


    <script type="text/javascript">
        window.onload = function() {
            window.print();
        }
        window.onafterprint = function(event) {
            window.location.href = '/students/create'
        };
    </script>
</body>

</html>