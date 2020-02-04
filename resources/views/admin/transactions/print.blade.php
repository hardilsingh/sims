<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Session</th>
            <th>Reciept No.</th>
            <th>Admission No.</th>
            <th>Class</th>
            <th>Section</th>
            <th>Name</th>
            <th>User Name</th>
            <th>Amount Paid</th>
        </tr>

    </thead>

    <tbody>
        @php
        $i = 1
        @endphp
        @foreach($reciepts as $reciept)

        <tr>
            <td>{{$i++}}</td>
            <td>{{$reciept->date}}</td>
            <td>{{$reciept->session}}</td>
            <td>{{$reciept->id}}</td>
            <td>{{$reciept->getStudent->adm_no}}</td>
            <td>{{$reciept->getStudent->class}}</td>
            <td>{{$reciept->getStudent->section}}</td>
            <td>{{$reciept->getStudent->name}}</td>
            <td>{{$reciept->userName->name}}</td>
            <td>{{$reciept->paid}}</td>
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
            <td><b>Total</td>
            <td>{{$sum}}</b></td>
        </tr>
    </tbody>
</table>