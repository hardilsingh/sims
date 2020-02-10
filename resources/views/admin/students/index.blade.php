@extends('layouts.admin')
@section('heading')
Register Students
@stop

@section('content')




<div class="row">



    <div class="col-lg-12">
        <!-- radio -->
        <h3 class="h3" style="padding: 20px;">Search By</h3>
        <div class="form-group clearfix" style="padding: 10px;">
            <div class="icheck-primary d-inline">
                <input type="radio" checked name="search" id="name" style="margin-right: 10px">
                <label for="name">Student Name or Telephone or Admission Number
                </label>
            </div>
            <div class="icheck-primary d-inline">
                <input type="radio" name="search" id="class" style="margin-right: 10px">
                <label for="class">By Class and Section
                </label>
            </div>
        </div>
    </div>
</div>

<div class="row" id="byname">
    <div class="col-lg-12">
        <div class="form-group">
            <label for="">Enter Student Name or Telephone or Admission Number or Father name</label>
            <input type="text" oninput="this.value = this.value.toUpperCase()" autofocus name="" id="searchIndex" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-md btn-success" id="search">Search</button>
        </div>
    </div>
</div>

<div class="row" id="byclass" style="display: none">

    <div class="div" style="display: flex">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="">Select Class:</label>
                {!! Form::select('class' , $classes , 0 , ['class'=>'form-control' , 'placeholder'=>'Select a class below' ,
                'id'=>'select_class'])
                !!}
            </div>

        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="">Select Section:</label>
                <select name="section_id" id="select_section" class="form-control">
                    <option value="" selected>Select a section below</option>
                    <option value="Rose">Rose</option>
                    <option value="Lotus">Lotus</option>
                    <option value="Marigold">Marigold</option>
                    <option value="Tulip">Tulip</option>
                    <option value="Violet">Violet</option>
                    <option value="D">D</option>
                    <option value="X">X</option>
                </select>
            </div>
        </div>
    </div>

</div>



<!-- Large modal -->
<button type="button" id="tmodal" style="display: none" class="btn btn-default" data-toggle="modal" data-target="#modal-xl">
    Search Results
</button>

<div class="modal fade" id="modal-xl" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="width:min-content">
            <div class="modal-header">
                <h4 class="modal-title">Search Results</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table" style="padding:20px;" id="myTable1">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Adm No.</th>
                            <th scope="col">Father Name</th>
                            <th scope="col">Mother Name</th>
                            <th scope="col">Class</th>
                            <th scope="col">Section</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Gender</th>
                            <th scope="col">View</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Small modal -->


@stop

@section('script-plugins')

<script>
    $(document).ready(function() {


        // Get the input field
        var input = document.getElementById("searchIndex");

        // Execute a function when the user releases a key on the keyboard
        input.addEventListener("keyup", function(event) {
            // Number 13 is the "Enter" key on the keyboard
            if (event.keyCode === 13) {
                // Cancel the default action, if needed
                event.preventDefault();
                // Trigger the button element with a click
                document.getElementById("search").click();
            }
        });




        $('#name').change(function() {
            $('#byname').css('display', 'block');
            $('#byclass').css('display', 'none');

        })

        $('#class').change(function() {
            $('#byname').css('display', 'none');
            $('#byclass').css('display', 'block');

        })


        var id;

        $("#search").click(function() {

            var keyword = document.getElementById('searchIndex').value


            $("#myTable1").find("tr:not(:first)").remove();

            $.ajax({
                url: '/getStudents?keyword=' + keyword,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    var len = 0;
                    if (response['data'] != null) {
                        len = response['data'].length;
                    }

                    if (len > 0) {
                        // Read data and create <option >

                        $(document).ready(function() {
                            $("#tmodal").trigger('click');
                        });
                        var j = 1;
                        for (var i = 0; i < len; i++) {
                            var id = response['data'][i].id;
                            var name = response['data'][i].name;
                            var adm_no = response['data'][i].adm_no;
                            var tel = response['data'][i].tel1;
                            var father = response['data'][i].father;
                            var mother = response['data'][i].mother;
                            var grade = response['data'][i].class;
                            var section = response['data'][i].section;
                            var gender = response['data'][i].gender;

                            var table = document.getElementById("myTable1");

                            // Create an empty <tr> element and add it to the 1st position of the table:
                            var row = table.insertRow(-1);

                            // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
                            var cell1 = row.insertCell(0);
                            var cell2 = row.insertCell(1);
                            var cell3 = row.insertCell(2);
                            var cell4 = row.insertCell(3);
                            var cell5 = row.insertCell(4);
                            var cell6 = row.insertCell(5);
                            var cell7 = row.insertCell(6);
                            var cell8 = row.insertCell(7);
                            var cell9 = row.insertCell(8);
                            var cell10 = row.insertCell(9);


                            var gradeName;

                            if(grade == 100) {
                                gradeName = 'Pre Nursery-1'
                            }else if (grade == 101){
                                gradeName ='LKG'
                            }else if(grade == 102) {
                                gradeName = 'UKG'
                            }else {
                                gradeName = getNumberWithOrdinal(grade);
                            }

                            // Add some text to the new cells:
                            cell1.innerHTML = j++;
                            cell2.innerHTML = name;
                            cell3.innerHTML = adm_no;
                            cell4.innerHTML = father;
                            cell5.innerHTML = mother;
                            cell6.innerHTML = gradeName;
                            cell7.innerHTML = section;
                            cell8.innerHTML = tel;
                            cell9.innerHTML = gender == 0 ? 'Male' : 'Female';
                            cell10.innerHTML = "<a href='students/" + id + "' class='btn btn-success'>View</a>";
                        }
                    } else {
                        alert("No Data Found")
                    }

                }
            });
        })


        $("#select_class").change(function() {
            id = $(this).val();
        })


        function getNumberWithOrdinal(n) {
            var s = ["th", "st", "nd", "rd"],
                v = n % 100;
            return n + (s[(v - 20) % 10] || s[v] || s[0]);
        }



        // Department Change
        $('#select_section').change(function() {

            var section = $(this).val();

            $("#myTable1").find("tr:not(:first)").remove();


            $.ajax({
                url: '/getStudents?grade=' + id + '&section=' + section,
                type: 'get',
                dataType: 'json',
                success: function(response) {


                    console.log('/getStudents?grade=' + id + '&section=' + section)

                    var len = 0;
                    if (response['data'] != null) {
                        len = response['data'].length;
                    }

                    if (len > 0) {


                        $(document).ready(function() {
                            $("#tmodal").trigger('click');
                        });

                        var j = 1
                        // Read data and create <option >
                        for (var i = 0; i < len; i++) {
                            var id = response['data'][i].id;
                            var name = response['data'][i].name;
                            var adm_no = response['data'][i].adm_no;
                            var tel = response['data'][i].tel1;
                            var father = response['data'][i].father;
                            var mother = response['data'][i].mother;
                            var grade = response['data'][i].class;
                            var section = response['data'][i].section;
                            var gender = response['data'][i].gender;

                            var table = document.getElementById("myTable1");

                            // Create an empty <tr> element and add it to the 1st position of the table:
                            var row = table.insertRow(-1);

                            // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
                            var cell1 = row.insertCell(0);
                            var cell2 = row.insertCell(1);
                            var cell3 = row.insertCell(2);
                            var cell4 = row.insertCell(3);
                            var cell5 = row.insertCell(4);
                            var cell6 = row.insertCell(5);
                            var cell7 = row.insertCell(6);
                            var cell8 = row.insertCell(7);
                            var cell9 = row.insertCell(8);
                            var cell10 = row.insertCell(9);

                            var gradeName;

                            if(grade == 100) {
                                gradeName = 'Pre Nursery-1'
                            }else if (grade == 101){
                                gradeName ='LKG'
                            }else if(grade == 102) {
                                gradeName = 'UKG'
                            }else {
                                gradeName = getNumberWithOrdinal(grade);
                            }



                            // Add some text to the new cells:
                            cell1.innerHTML = j++;
                            cell2.innerHTML = name;
                            cell3.innerHTML = adm_no;
                            cell4.innerHTML = father;
                            cell5.innerHTML = mother;
                            cell6.innerHTML = gradeName;
                            cell7.innerHTML = section;
                            cell8.innerHTML = tel;
                            cell9.innerHTML = gender == 0 ? 'Male' : 'Female';
                            cell10.innerHTML = "<a href='students/" + id + "' class='btn btn-success'>View</a>";



                        }
                    } else {
                        alert("No Data Found")
                    }

                }
            });
        })
    });
</script>

@stop