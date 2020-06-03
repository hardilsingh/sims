<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Class</th>
            <th scope="col">Section</th>
            <th scope="col">Stream</th>
            <th scope="col">Roll No.</th>
            <th scope="col">Adm No.</th>
            <th scope="col">Name</th>
            <th scope="col">Gender</th>
            <th scope="col">Father Name</th>
            <th scope="col">Mother Name</th>
            <th scope="col">DOB</th>
            <th scope="col">Telephone1</th>
            <th scope="col">Telephone2</th>
            <th scope="col">Village</th>
            <th scope="col">Post Office</th>
            <th scope="col">Tehsil</th>
            <th scope="col">District</th>
            <th scope="col">State</th>
            <th scope="col">Pincode</th>
            <th scope="col">Concession</th>
            <th scope="col">Bus Station</th>
            <th scope="col">Bus Route</th>
            <th scope="col">Bus No</th>
            <th scope="col">Father Occupation</th>
            <th scope="col">Mother Occupation</th>
            <th scope="col">Family annual income</th>
            <th scope="col">Documents Verified</th>
            <th scope="col">Caste</th>
            <th scope="col">Religion</th>
            <th scope="col">Date of Admission</th>
            <th scope="col">Aadhar Card Number</th>

        </tr>
    </thead>
    <tbody>

        @php
        $i = 1
        @endphp

        @foreach($results as $result)

        <tr>
            <td>{{$i++}}</td>
            <td>
                @if($result->class == 100)
                Pre Nursery-1
                @endif
                @if($result->class == 101)
                Nursery
                @endif
                @if($result->class == 102)
                L.K.G
                @endif
                @if($result->class == 103)
                U.K.G
                @endif
                @if($result->class < 100) <?php

                                            $a = $result->class;
                                            echo $a . substr(date('jS', mktime(0, 0, 0, 1, ($a % 10 == 0 ? 9 : ($a % 100 > 20 ? $a % 10 : $a % 100)), 2000)), -2);

                                            ?> @endif </td> <td>{{$result->section}}</td>
            <td>
                @if($result->stream == 1)
                'Medical'
                @endif
                @if($result->stream == 2)
                'Non-Medical'
                @endif
                @if($result->stream == 3)

                @endif
            </td>
            <td>{{$result->roll_number}}</td>
            <td>{{$result->adm_no}}</td>
            <td>{{$result->name}}</td>
            <td>{{$result->gender == 0 ? 'Male' : 'Female'}}</td>
            <td>{{$result->father}}</td>
            <td>{{$result->mother}}</td>
            <td>{{\Carbon\Carbon::parse($result->dob)->format('d/m/Y')}}</td>
            <td>{{$result->tel1}}</td>
            <td>{{$result->tel2}}</td>
            <td>{{$result->vill}}</td>
            <td> {{$result->postoffice}}</td>
            <td>{{$result->tehsil}}</td>
            <td>{{$result->district}}</td>
            <td>{{$result->state}}</td>
            <td>{{$result->pincode}}</td>
            <td>
                @if(App\Fee::where('student_id', $result->id)->first('concession')->concession)
                {{App\Concession::where('id' , App\Fee::where('student_id', $result->id)->first('concession')->concession)->first('name')->name}}
                @endif

            </td>
            <td>{{$result->convinience_req == 1 ? App\Station::findOrFail($result->station)->first('name')->name : "N/A"}}</td>
            <td>
                {{$result->convinience_req == 1 ? App\Station::findOrFail($result->station)->first('route')->route : "N/A"}}
            </td>
            <td>
                {{$result->convinience_req == 1 ? App\Station::findOrFail($result->station)->first('bus')->bus : "N/A"}}
            </td>
            <td>
                {{App\Father::where('student_id', $result->id)->first('occupation')->occupation}}
            </td>
            <td>
                {{App\Mother::where('student_id', $result->id)->first('occupation')->occupation}}
            </td>
            <td>
                {{$result->annual_income}}
            </td>
            <td>{{$result->document_verified == 1 ? 'Verified' : 'Not Verfied'}}</td>
            <td>
                @if($result->cast_category == 1)General @endif
                @if($result->cast_category == 2)SC @endif
                @if($result->cast_category == 3)OBC @endif
                @if($result->cast_category == 4)ST @endif
            </td>
            <td>
                @if($result->religion == 1)Hindu @endif
                @if($result->religion == 2)Sikh @endif
                @if($result->religion == 3)Jain @endif
                @if($result->religion == 4)Muslim @endif
                @if($result->religion == 5)Christian @endif
                @if($result->religion == 6)Other @endif
            </td>
            <td>{{\Carbon\Carbon::parse($result->admission_date)->format('d/m/Y')}}</td>

            <td> <?php
                    $price = $result->addhar_number;

                    $price_text = (string) $price; // convert into a string
                    $arr = str_split($price_text, "4"); // break string in 3 character sets

                    $price_new_text = implode("-", $arr);  // implode array with comma

                    echo $price_new_text; // will output 987,536,453
                    ?></td>

        </tr>

        @endforeach
    </tbody>
</table>