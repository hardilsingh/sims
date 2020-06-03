<style>
    * {
        white-space: nowrap;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
</style>


<section style="text-align:center; line-height:50%">
    <h2 class="h2">KALGIDHAR INTERNATIONAL SCHOOL</h2>
    <p class="p">12 Mile Stone away Gurdaspur-Mukerian National Highway, VPO. Purana Shalla, Distt. Gurdaspur (PB)</p>
</section>

<div class="row" style="transform: translateY(-15px);">
    <p style="text-align: center;  font-size:28px" class="h2">Transaction Report</p>
    <p style="text-align: center; font-size:22px">From: {{\Carbon\Carbon::parse($_GET['from'])->format('d/m/Y')}} &nbsp;&nbsp;&nbsp; To: {{\Carbon\Carbon::parse($_GET['to'])->format('d/m/Y')}}</p>
</div>

<div class="row" style="transform: translateY(-30px); display:flex; justify-content:space-evenly">
    @foreach($users as $user)
    <p style="text-align: center; font-size:20px"><b>{{$user->name}}:</b> {{App\Reciept::where('user_id' , $user->id)->whereBetween('date', [$_GET['from'], $_GET['to']])->count()}} Reciept(s),<br> Recieved: ₹{{number_format(App\Reciept::where('user_id' , $user->id)->whereBetween('date', [$_GET['from'], $_GET['to']])->sum('paid'))}}</p>
    @endforeach
</div>




<table border="1" style="width: 100%; border-collapse:collapse; transform: translateY(-30px);  ">
    <thead>
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Session</th>
            <th>Rec No.</th>
            <th>Adm No.</th>
            <th>Class</th>
            <th>Name</th>
            <th>User</th>
            <th>Mode</th>
            <th style="text-align: right">Amount Paid</th>
        </tr>

    </thead>

    <tbody>
        @php
        $i = 1
        @endphp
        @foreach($reciepts as $reciept)

        <tr>
            <td>{{$i++}}</td>
            <td>{{$reciept->created_at->format('d/m/Y')}}</td>
            <td>{{$reciept->session}}</td>
            <td>{{$reciept->id}}</td>
            <td>{{$reciept->getStudent->adm_no}}</td>
            <td>
                @if($reciept->getStudent->class == 100)
                Pre Nursery-1-{{$reciept->getStudent->section}}
                @endif
                @if($reciept->getStudent->class == 101)
                Nursery-{{$reciept->getStudent->section}}
                @endif
                @if($reciept->getStudent->class == 102)
                L.K.G-{{$reciept->getStudent->section}}
                @endif
                @if($reciept->getStudent->class == 103)
                U.K.G-{{$reciept->getStudent->section}}
                @endif
                @if($reciept->getStudent->class < 100) <?php

                                                        $a = $reciept->getStudent->class;
                                                        echo $a . substr(date('jS', mktime(0, 0, 0, 1, ($a % 10 == 0 ? 9 : ($a % 100 > 20 ? $a % 10 : $a % 100)), 2000)), -2) . '-'.$reciept->getStudent->section;
                                                        ?> @endif </td> <td>{{$reciept->getStudent->name}}</td>
            <td>{{$reciept->clerkName->name}}</td>
            <td>{{$reciept->refrence == null ? 'Cash' : 'Cheque'}}</td>
            <td style="text-align: right">{{number_format($reciept->paid)}}</td>
        </tr>

        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right"><b>Total</b></td>
            <td style="text-align: right"><b>{{number_format($sum)}}</b></td>
        </tr>
    </tbody>
</table>