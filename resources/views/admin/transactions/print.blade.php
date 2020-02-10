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
            <td>{{$reciept->created_at->format('d/m/Y')}}</td>
            <td>{{$reciept->session}}</td>
            <td>{{$reciept->id}}</td>
            <td>{{$reciept->getStudent->adm_no}}</td>
            <td>
                @if($reciept->getStudent->class == 100)
                Pre Nursery-1
                @endif
                @if($reciept->getStudent->class == 101)
                L.K.G
                @endif
                @if($reciept->getStudent->class == 102)
                U.K.G
                @endif
                @if($reciept->getStudent->class !== 100 && $reciept->getStudent->class !== 101 &&$reciept->getStudent->class !== 102)
                {{$reciept->getStudent->class}}
                @endif
            </td>
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