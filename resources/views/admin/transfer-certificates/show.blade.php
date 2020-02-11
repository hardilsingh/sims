<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


</head>


<style>
    div {
        margin-top: -7px;
    }
</style>

<body style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-size:18px; border: 2px solid black">


    <section style="padding: 10px;">
        <table style="width: 100%; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; text-align:center">
            <tbody>
                <tr>
                    <td></td>
                    <td style="text-align:center; line-height:110%">
                        <h2>KALGIDHAR INTERNATIONAL SEN. SEC. SCHOOL</h2>
                        <h3>Vpo. Purana Shalla, Distt. Gurdaspur. Phone No. 8146060115</h3>
                        <h3>English Medium School; CBSE Affiliated No. 1630509, School Code 25273</h3>
                        <div style="margin-top: 20px; border:1px solid black; border-radius:10px;; position:relative; left:50%; transform:translateX(-50%)">
                            <h2><i>TRANSFER CERTIFICATE</i></h2>
                        </div>
                    </td>
                    <TD></TD>
                </tr>


            </tbody>

        </table>

        <table border="1" style="width: 100%; font-size:22px; font-weight:800;  border-collapse:collapse; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; text-align:center; margin-top:10px; margin-bottom:10px; border-width:2px;">
            <tbody>
                <tr>

                    <td><i>File No. - {{$tc->id}}</i></td>
                    <td><i>Sr No. - {{$tc->id}}</i></td>
                    <td><i>Adm. No. - {{$tc->getStudent->adm_no}}</i></td>
                    <td><i>Date: {{$tc->created_at->format('d-m-Y')}}</i></td>

                </tr>

            </tbody>

        </table>

        <div style="display: flex; align-items:center; justify-content:space-between; ">

            <div>
                <p>1. Name of the Pupil - {{$tc->getStudent->name}}</p>
            </div>

            <div>
                <p>Gender - {{$tc->getStudent->gender == 0 ? 'Male' : 'Female'}}</p>
            </div>

            <div>
                <p>2. Nationality: {{$tc->nationality}}</p>
            </div>
        </div>

        <div style="display: flex; align-items:center; justify-content:space-between; ">

            <div>
                <p>3. Father/Gaurdian Name - {{$tc->getStudent->father}}</p>
            </div>

            <div>
                <p>4. Mother Name - {{$tc->getStudent->mother}}</p>
            </div>

        </div>
        <div style="display: flex; align-items:center; justify-content:space-between; ">

            <div>
                <p style="text-transform: capitalize">5. Date of Birth - {{\Carbon\Carbon::parse($tc->getStudent->dob)->format('d-m-Y')}}

                    <?php
                    function numberTowords($num)
                    {

                        $ones = array(
                            0 => "ZERO",
                            1 => "ONE",
                            2 => "TWO",
                            3 => "THREE",
                            4 => "FOUR",
                            5 => "FIVE",
                            6 => "SIX",
                            7 => "SEVEN",
                            8 => "EIGHT",
                            9 => "NINE",
                            10 => "TEN",
                            11 => "ELEVEN",
                            12 => "TWELVE",
                            13 => "THIRTEEN",
                            14 => "FOURTEEN",
                            15 => "FIFTEEN",
                            16 => "SIXTEEN",
                            17 => "SEVENTEEN",
                            18 => "EIGHTEEN",
                            19 => "NINETEEN",
                            "014" => "FOURTEEN"
                        );
                        $tens = array(
                            0 => "ZERO",
                            1 => "TEN",
                            2 => "TWENTY",
                            3 => "THIRTY",
                            4 => "FORTY",
                            5 => "FIFTY",
                            6 => "SIXTY",
                            7 => "SEVENTY",
                            8 => "EIGHTY",
                            9 => "NINETY"
                        );
                        $hundreds = array(
                            "HUNDRED",
                            "THOUSAND",
                            "MILLION",
                            "BILLION",
                            "TRILLION",
                            "QUARDRILLION"
                        ); /* limit t quadrillion */
                        $num = number_format($num, 2, ".", ",");
                        $num_arr = explode(".", $num);
                        $wholenum = $num_arr[0];
                        $decnum = $num_arr[1];
                        $whole_arr = array_reverse(explode(",", $wholenum));
                        krsort($whole_arr, 1);
                        $rettxt = "";
                        foreach ($whole_arr as $key => $i) {

                            while (substr($i, 0, 1) == "0")
                                $i = substr($i, 1, 5);
                            if ($i < 20) {
                                /* echo "getting:".$i; */
                                $rettxt .= $ones[$i];
                            } elseif ($i < 100) {
                                if (substr($i, 0, 1) != "0")  $rettxt .= $tens[substr($i, 0, 1)];
                                if (substr($i, 1, 1) != "0") $rettxt .= " " . $ones[substr($i, 1, 1)];
                            } else {
                                if (substr($i, 0, 1) != "0") $rettxt .= $ones[substr($i, 0, 1)] . " " . $hundreds[0];
                                if (substr($i, 1, 1) != "0") $rettxt .= " " . $tens[substr($i, 1, 1)];
                                if (substr($i, 2, 1) != "0") $rettxt .= " " . $ones[substr($i, 2, 1)];
                            }
                            if ($key > 0) {
                                $rettxt .= " " . $hundreds[$key] . " ";
                            }
                        }
                        if ($decnum > 0) {
                            $rettxt .= " and ";
                            if ($decnum < 20) {
                                $rettxt .= $ones[$decnum];
                            } elseif ($decnum < 100) {
                                $rettxt .= $tens[substr($decnum, 0, 1)];
                                $rettxt .= " " . $ones[substr($decnum, 1, 1)];
                            }
                        }
                        return $rettxt;
                    }


                    $birth_date = ($tc->getStudent->dob);
                    $new_birth_date = explode('-', $birth_date);
                    $year = $new_birth_date[0];
                    $month = $new_birth_date[1];
                    $day  = $new_birth_date[2];
                    $birth_day = numberTowords($day);
                    $birth_year = numberTowords($year);
                    $monthNum = $month;
                    $dateObj = DateTime::createFromFormat('!m', $monthNum); //Convert the number into month name
                    $monthName = strtoupper($dateObj->format('F'));
                    echo "(" . $birth_day . " " . $monthName . " " . $birth_year . ")";
                    ?>
                </p>
            </div>
        </div>

        <div style="display: flex; align-items:center; justify-content:space-between; ">

            <div>
                <p>6. Category: {{App\Caste::findOrFail($tc->getStudent->cast_category)->name}}</p>
            </div>

        </div>

        <hr class="hr">

        <div style="display: flex; align-items:center; justify-content:space-between; ">

            <p>7. Date of Admission in This School/Class-- {{Carbon\Carbon::parse($tc->getStudent->admission_date)->format('d-m-Y')}} /Class -
            @if($tc->getStudent->class == 100)
                    Pre Nursery-1
                    @endif
                    @if($tc->getStudent->class == 101)
                    Nursery
                    @endif
                    @if($tc->getStudent->class == 102)
                    L.K.G
                    @endif
                    @if($tc->getStudent->class == 103)
                    U.K.G
                    @endif
                    @if($tc->getStudent->class < 100) <?php

                                                    $a = $tc->getStudent->class;
                                                    echo $a . substr(date('jS', mktime(0, 0, 0, 1, ($a % 10 == 0 ? 9 : ($a % 100 > 20 ? $a % 10 : $a % 100)), 2000)), -2);

                                                    ?> @endif


            </p>
        </div>
        <div style="display: flex; align-items:center; justify-content:space-between; ">

            <div>
                <p>8. Class Which Pupil Last Studied -
                @if($tc->getStudent->class == 100)
                    Pre Nursery-1
                    @endif
                    @if($tc->getStudent->class == 101)
                    Nursery
                    @endif
                    @if($tc->getStudent->class == 102)
                    L.K.G
                    @endif
                    @if($tc->getStudent->class == 103)
                    U.K.G
                    @endif
                    @if($tc->getStudent->class < 100) <?php

                                                    $a = $tc->getStudent->class;
                                                    echo $a . substr(date('jS', mktime(0, 0, 0, 1, ($a % 10 == 0 ? 9 : ($a % 100 > 20 ? $a % 10 : $a % 100)), 2000)), -2);

                                                    ?> @endif


                </p>
            </div>

        </div>
        <div style="display: flex; align-items:center; justify-content:space-between; ">

            <div>
                <p>9. Last Class Passes/Appeared -
                    @if($tc->getStudent->class == 100)
                    Pre Nursery-1
                    @endif
                    @if($tc->getStudent->class == 101)
                    Nursery
                    @endif
                    @if($tc->getStudent->class == 102)
                    L.K.G
                    @endif
                    @if($tc->getStudent->class == 103)
                    U.K.G
                    @endif
                    @if($tc->getStudent->class < 100) <?php

                                                    $a = $tc->getStudent->class;
                                                    echo $a . substr(date('jS', mktime(0, 0, 0, 1, ($a % 10 == 0 ? 9 : ($a % 100 > 20 ? $a % 10 : $a % 100)), 2000)), -2);

                                                    ?> @endif </p> </div> </div> <div style="display: flex; align-items:center; justify-content:space-between; ">

                        <div>
                            <p>10. Weather failed if so once/twice in the same class - {{$tc->failed}}
                            </p>
                        </div>

            </div>
            <div style="display: flex; align-items:center; justify-content:space-between; ">

                <div>
                    <p>11. Subjects Studided - {{implode(", ",$subjects)}}
                    </p>
                </div>

            </div>
            <div style="display: flex; align-items:center; justify-content:space-between; ">

                <div>
                    <p>12. Weather qualified for promotion to higher class, if so, to which class -


                    @if($tc->getStudent->class == 100)
                    Nursery
                    @endif
                    @if($tc->getStudent->class == 101)
                    L.K.G
                    @endif
                    @if($tc->getStudent->class == 102)
                    U.K.G
                    @endif
                    @if($tc->getStudent->class == 103)
                    <?php

                                                    $a = 1;
                                                    echo $a . substr(date('jS', mktime(0, 0, 0, 1, ($a % 10 == 0 ? 9 : ($a % 100 > 20 ? $a % 10 : $a % 100)), 2000)), -2);

                                                    ?>
                    @endif
                    @if($tc->getStudent->class < 100 && $tc->getStudent->class !== 12 ) <?php
                                                    $a = $tc->getStudent->class + 1;
                                                    echo $a . substr(date('jS', mktime(0, 0, 0, 1, ($a % 10 == 0 ? 9 : ($a % 100 > 20 ? $a % 10 : $a % 100)), 2000)), -2);

                                                    ?> @endif
                    </p>
                </div>


            </div>

            <div style="display: flex; align-items:center; justify-content:space-between; ">

                <div>
                    <p>13. Month upto which dues paid - {{$tc->dues}}
                    </p>
                </div>

            </div>
            <div style="display: flex; align-items:center; justify-content:space-between; ">

                <div>
                    <p>14. Any fee concession available of, if so, the nature of such concession - {{App\Fee::where('student_id' , $tc->student_id)->first()->concession == null ? 'NO' : 'YES'}}
                    </p>
                </div>

            </div>
            <div style="display: flex; align-items:center; justify-content:space-between; ">

                <div>
                    <p>15. Total present days - {{$tc->tpd}}
                    </p>
                </div>
                <div>
                    <p>16. Total working days - {{$tc->twd}}
                    </p>
                </div>

            </div>
            <div style="display: flex; align-items:center; justify-content:space-between; ">

                <div>
                    <p>17. Weather NCC Cadet/Boy Scout/Girl Scout/Girl Guide (Details may be given) - {{$tc->scout}}
                    </p>
                </div>

            </div>
            <div style="display: flex; align-items:center; justify-content:space-between; ">

                <div>
                    <p>18. Games played or Extra/Curricular Activities in which pupil took part - {{$tc->games}}
                    </p>
                </div>





            </div>

            <div style="display: flex; align-items:center; justify-content:space-between; ">

                <div>
                    <p>19. General Conduct - {{$tc->conduct}}
                    </p>
                </div>

            </div>
            <div style="display: flex; align-items:center; justify-content:space-between; ">

                <div>
                    <p>20. Date of application for certificate - {{Carbon\Carbon::parse($tc->doa)->format('d-m-Y')}}
                    </p>
                </div>

            </div>
            <div style="display: flex; align-items:center; justify-content:space-between; ">

                <div>
                    <p>21. Date of issued certificate - {{$tc->created_at->format('d-m-Y')}}
                    </p>
                </div>

            </div>
            <div style="display: flex; align-items:center; justify-content:space-between; margin-top:25px; ">

                <div>
                    <p>Initals of class Teacher/Office assistant
                    </p>
                    <p>Date: </p>
                </div>

                <div>
                    <p>Signature of Principal -
                    </p>
                </div>

            </div>
    </section>





    <script type="text/javascript">
        window.onload = function() {
            window.print();
        }
        window.onafterprint = function(event) {
            window.location.href = '/transfer-certificates'
        };
    </script>


</body>

</html>