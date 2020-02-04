<table>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Adm No.</th>
            <th scope="col">Father Name</th>
            <th scope="col">Class - Section</th>
            <th scope="col">Telephone</th>
        </tr>
    </thead>
    <tbody>
        @php
        $i = 1
        @endphp
        @foreach($students as $student)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$student->getStudent->name}}</td>
            <td>{{$student->getStudent->adm_no}}</td>
            <td>{{$student->getStudent->father}}</td>
            <td>{{$student->getStudent->class == 100 ? 'Pre-Nursery 1' : $student->getStudent->class}} - {{$student->getStudent->section}}</td>
            <td>{{$student->getStudent->tel1}}</td>
        </tr>
        @endforeach
    </tbody>
</table>