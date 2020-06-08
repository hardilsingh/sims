<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reciept</title>


    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
</head>

<body style="display: flex">


    <style>
        .schoolName {
            margin-top: 30px;
        }

        .row {
            padding: 5px 30px;
        }
    </style>



    <div style="width: 50%; border-right:1px solid grey; padding:10px">
        <img src="/images/logo.png" width="100%" alt="" style="position:relative; left:50%; transform:translateX(-50%)">

        <div style="padding: 20px 20px;">
            <p style="text-align: center; font-size:23px; text-transform:uppercase">
                <b>Kalgidhar International School</b>
            </p>

            <p style="text-align: center; transform:translateY(-20px)">
                V.P.O. Purana Shalla, Distt. Gurdaspur (Punjab)-143530<br>
                Contact: 9646155712, 8146060115, 7837498739<br> CBSE Affiliation No. 1630509

            </p>

            <h3 style=" text-align: center">Office Copy</h3>
        </div>

        <table style="width: 100%; transform:translateX(30px);">

            <tr>
                <td>Date: {{$reciept->created_at->format('d/m/Y')}} {{$reciept->created_at->toTimeString()}}</td>
                <td> Reciept No. {{$reciept->id}}</td>
            </tr>
            <tr>
                <td>
                    Reg No. {{$reciept->getStudent->adm_no}}
                </td>
                <td>Adm No. {{$reciept->getStudent->adm_no}}</td>
            </tr>

            <tr>
                <td>
                    Name: {{$reciept->getStudent->name}}

                </td>
                <td> Class
                    @if($reciept->getStudent->class == 100)
                    Pre Nursery-1
                    @endif
                    @if($reciept->getStudent->class == 101)
                    Nursery
                    @endif
                    @if($reciept->getStudent->class == 102)
                    L.K.G
                    @endif
                    @if($reciept->getStudent->class == 103)
                    U.K.G
                    @endif
                    @if($reciept->getStudent->class < 100) <?php

                                                            $a = $reciept->getStudent->class;
                                                            echo $a . substr(date('jS', mktime(0, 0, 0, 1, ($a % 10 == 0 ? 9 : ($a % 100 > 20 ? $a % 10 : $a % 100)), 2000)), -2);

                                                            ?> @endif -{{$reciept->getStudent->section}}</td> </tr> <tr>
                <td>
                    Father Name: {{$reciept->getStudent->father}}

                </td>
                <td>
                    Mother Name: {{$reciept->getStudent->mother}}

                </td>
            </tr>
            <tr>
                <td>
                    Telephone1: {{$reciept->getStudent->tel1}}

                </td>
                <td>
                    Telephone2: {{$reciept->getStudent->tel2}}
                </td>
            </tr>
            <tr>
                <td>
                    @if($reciept->getStudent->convinience_req == 1)
                    Station: {{$station->name}}
                    @endif
                </td>
            </tr>

        </table>

		<p style="text-align: right; position:relative; right: 30px">Previous Dues: {{$reciept->previous_balance}}</p>
        <div class="row">
            <div class="col-lg-12">

                <table style="width: 100%" class="" border="1">
                    <thead>

                        <th>Sr No.</th>
                        <th>Particulars.</th>
                        <th style="text-align: right">Amount Payable.</th>

                    </thead>
                    <tbody>
					
                        @php
                        $j = 1
                        @endphp
                        <?php

                        if (count($particulars) > 1) {
                            for ($i = 0; $i < count($particulars); $i++) {


                                echo "<tr>";
                                echo "<td>" . $j++ . "</td>";
                                echo "<td>$particulars[$i]</td>";
                                echo "<td style='text-align: right'>
                                        " . $fee[$i] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            for ($i = 0; $i < count($particulars); $i++) {


                                echo "<tr>";
                                echo "<td>" . $j++ . "</td>";
                                echo "<td>Previous Balance</td>";
                                echo "<td style='text-align: right'>
                                        " . number_format($reciept->paid) . "</td>";
                                echo "</tr>";
                            }
                        }



                        ?>
                        <tr>
                            <td></td>
                            <td>Amount Recieved</td>
                            <td style="text-align: right; font-size:20px;"><b>{{number_format($reciept->paid)}}</b></td>
                        </tr>
						                        <tr>
                            <td></td>
                            <td>Outstanding Balance</td>
                            <td style="text-align: right; font-size:20px;"><b>{{$reciept->balance}}</b></td>
                        </tr>
                    </tbody>
                </table>



            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <p class="text-bold text-uppercase">
                    In Words: {{$converted}}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <p class="text-bold text-capitalize">
                    For the Period: @for($i = 0; $i < count($particulars) ; $i++) {{$particulars[$i]}}, @endfor </p> </div> </div> <div class="row">
                        Payment Method: {{$reciept->refrence == null ? 'Cash' : 'Cheque: '. $reciept->refrence}}
            </div>
            <div class="row">
                <h4 class="h4">Part Payment Deatils</h4>
                <table border="1" style="width: 100%">
                    <thead>
                        <th>S.no</th>
                        <th>Date</th>
                        <th>Reciept No.</th>
                        <th style="text-align: right">Amt. Paid</th>
                        <th style="text-align: right">Balance</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="text-align: right">Opening Balance</td>
                            <td style="text-align: right">{{$openingBalance->openingBalance}}</td>
                        </tr>
                        @php
                        $i = 1
                        @endphp
                        @foreach($prev as $p)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{\Carbon\Carbon::parse($p->date)->format('d/m/Y')}}</td>
                            <td>{{$p->id}}</td>
                            <td style="text-align: right">{{number_format($p->paid)}}</td>
                            <td style="text-align: right">{{number_format($p->outstanding)}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            <div class="row" style="margin-top: 60px;">
                <div class="col-lg-12">
                    <p>
                        Office Incharge: <b>{{Auth::user()->name}}</b><br>
                        Signature:

                    </p>
                </div>
            </div>


            <p style="text-align: center">Enabled by CBA Infotech, 9888353434</p>










        </div>
        <div style="width: 50%; border-right:1px solid grey; padding:10px">
            <img src="/images/logo.png" width="100%" alt="" style="position:relative; left:50%; transform:translateX(-50%)">

            <div style="padding: 20px 30px;">
                <p style="text-align: center; font-size:23px; text-transform:uppercase">
                    <b>Kalgidhar International School</b>
                </p>
                <p style="text-align: center; transform:translateY(-20px)">
                    V.P.O. Purana Shalla, Distt. Gurdaspur (Punjab)-143530<br>
                    Contact: 9646155712, 8146060115, 7837498739 <br>CBSE Affiliation No. 1630509


                </p>


                <h3 style=" text-align: center">Student Copy</h3>
            </div>

            <table style="width: 100%; transform:translateX(30px);">

                <tr>
                    <td>Date: {{$reciept->created_at->format('d/m/Y')}} {{$reciept->created_at->toTimeString()}}</td>
                    <td> Reciept No. {{$reciept->id}}</td>
                </tr>
                <tr>
                    <td>
                        Reg No. {{$reciept->getStudent->adm_no}}
                    </td>
                    <td>Adm No. {{$reciept->getStudent->adm_no}}</td>
                </tr>

                <tr>
                    <td>
                        Name: {{$reciept->getStudent->name}}

                    </td>
                    <td> Class @if($reciept->getStudent->class == 100)
                        Pre Nursery-1
                        @endif
                        @if($reciept->getStudent->class == 101)
                        Nursery
                        @endif
                        @if($reciept->getStudent->class == 102)
                        L.K.G
                        @endif
                        @if($reciept->getStudent->class == 103)
                        U.K.G
                        @endif
                        @if($reciept->getStudent->class < 100) <?php

                                                                $a = $reciept->getStudent->class;
                                                                echo $a . substr(date('jS', mktime(0, 0, 0, 1, ($a % 10 == 0 ? 9 : ($a % 100 > 20 ? $a % 10 : $a % 100)), 2000)), -2);

                                                                ?> @endif -{{$reciept->getStudent->section}}</td> </tr> <tr>
                    <td>
                        Father Name: {{$reciept->getStudent->father}}

                    </td>
                    <td>
                        Mother Name: {{$reciept->getStudent->mother}}

                    </td>
                </tr>
                <tr>
                    <td>
                        Telephone1: {{$reciept->getStudent->tel1}}

                    </td>
                    <td>
                        Telephone2: {{$reciept->getStudent->tel2}}
                    </td>
                </tr>
                <tr>
                    <td>
                        @if($reciept->getStudent->convinience_req == 1)
                        Station: {{$station->name}}
                        @endif
                    </td>
                </tr>

            </table>
<p style="text-align: right; position:relative; right: 30px">Previous Dues: {{$reciept->previous_balance}}</p>
            <div class="row">
                <div class="col-lg-12">

                    <table style="width: 100%" class="" border="1">
                        <thead>

                            <th>Sr No.</th>
                            <th>Particulars.</th>
                            <th style="text-align: right">Amount Payable.</th>

                        </thead>
                        <tbody>
						
                            @php
                            $j = 1
                            @endphp

                            <?php


                            if (count($particulars) > 1) {
                                for ($i = 0; $i < count($particulars); $i++) {


                                    echo "<tr>";
                                    echo "<td>" . $j++ . "</td>";
                                    echo "<td>$particulars[$i]</td>";
                                    echo "<td style='text-align: right'>
                " . $fee[$i] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                for ($i = 0; $i < count($particulars); $i++) {


                                    echo "<tr>";
                                    echo "<td>" . $j++ . "</td>";
                                    echo "<td>Previous Balance</td>";
                                    echo "<td style='text-align: right'>
                " . number_format($reciept->paid) . "</td>";
                                    echo "</tr>";
                                }
                            }


                            ?>
                            <tr>
                                <td></td>
                                <td>Amount Paid</td>
                                <td style="text-align: right; font-size:20px;"><b>{{number_format($reciept->paid)}}</b></td>
                            </tr>
							<tr>
                            <td></td>
                            <td>Outstanding Balance</td>
                            <td style="text-align: right; font-size:20px;"><b>{{$reciept->balance}}</b></td>
                        </tr>
                        </tbody>
                    </table>



                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p class="text-bold text-uppercase">
                        In Words: {{$converted}}
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p class="text-bold text-capitalize">
                        For the Period: @for($i = 0; $i < count($particulars) ; $i++) {{$particulars[$i]}}, @endfor </p> </div> </div> <div class="row">
                            Payment Method: {{$reciept->refrence == null ? 'Cash' : 'Cheque: '. $reciept->refrence}}
                </div>
                <div class="row">
                    <h4 class="h4">Part Payment Deatils</h4>
                    <table border="1" style="width: 100%">
                        <thead>
                            <th>S.no</th>
                            <th>Date</th>
                            <th>Reciept No.</th>
                            <th style="text-align: right">Amt. Paid</th>
                            <th style="text-align: right">Balance</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="text-align: right">Opening Balance</td>
                                <td style="text-align: right">{{$openingBalance->openingBalance}}</td>
                            </tr>
                            @php
                            $i = 1
                            @endphp
                            @foreach($prev as $p)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{\Carbon\Carbon::parse($p->date)->format('d/m/Y')}}</td>
                                <td>{{$p->id}}</td>
                                <td style="text-align: right">{{number_format($p->paid)}}</td>
                                <td style="text-align: right">{{number_format($p->outstanding)}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                <div class="row" style="margin-top: 60px;">
                    <div class="col-lg-12">
                        <p>
                            Office Incharge: <b>{{Auth::user()->name}}</b><br>
                            Signature:

                        </p>
                    </div>
                </div>

                <p style="text-align: center">Enabled by CBA Infotech, 9888353434</p>







            </div>



            @if(!isset($_GET['print']))

            <script type="text/javascript">
                window.onload = function() {
                    window.print();
                }
                window.onafterprint = function(event) {
                    window.location.href = '/fee'
                };
            </script>
            @endif

</body>

</html>