@extends('layouts.admin')


@section('heading')
Register Students
@stop


@section('content')


<style>
    /* Style the form */

    label {
        margin-bottom: 10px;
    }

    #myForm {
        background-color: #ffffff;
        margin: 0px auto;
        padding: 40px;
        width: 70%;
        min-width: 300px;
    }

    /* Style the input fields */
    input {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    /* Mark the active step: */
    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #4CAF50;
    }
</style>



<div class="form-three widget-shadow">


    {!! Form::open([

    'action'=>'StudentsController@store',
    'method'=>'POST',
    'class'=>'form-horizontal',
    'enctype'=>'multipart/form-data',
    'id'=>'myForm'

    ]) !!}

    <!-- One "tab" for each step in the form: -->


    <div class="tab">

        <div class="row">
            <div class="col-lg-12 text-center" style="margin-bottom:20px;">
                <h3 class="h3">Admission Information</h3>
            </div>
        </div>




        <div class="row">
            <div class="col-lg-12" style="display: flex;">
                <div class="col-lg-4">
                    <div class="form-group"> <label for="exampleInputName2">Date Of Adm: </label> <span class="badge badge-danger">Required</span> <input type="date" name="date_of_adm" value="{{now()->toDateString()}}" class="form-control" id="exampleInputName2" placeholder="Your name"> </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group"> <label for="exampleInputName2">Session</label> <input type="text" class="form-control" name="session" value="{{now()->year}}-{{now()->year+1}}" id="exampleInputName2" placeholder="" readonly> </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group"> <label for="exampleInputName2">Adm Type: <span class="badge badge-danger">Required</span></label>
                        <select name="adm_type" id="" class="form-control">
                            <option value="">Select Admission Type</option>
                            <option value="0">New Admission</option>
                            <option value="1">Re Admission</option>
                        </select>
                    </div>
                </div>
            </div>


        </div>

        <div class="row">
            <div class="col-lg-12" style="display: flex;">
                <div class="col-lg-4">
                    <div class="form-group"> <label for="exampleInputName2">Class: <span class="badge badge-danger">Required</span></label>
                        {!! Form::select('grade_id' , $classes , 0 , ['class'=>'form-control' , 'placeholder'=>'Select class' , 'id'=>'select_class']) !!}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group"> <label for="exampleInputName2">Section: <span class="badge badge-danger">Required</span></label>
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
                <div class="col-lg-4">
                    <div class="form-group"> <label for="exampleInputName2">Stream:<span class="badge badge-danger">Required</span></label>
                        {!! Form::select('stream_id' , $streams , 0 , ['class'=>'form-control' , 'placeholder'=>'Select Streams' , 'id'=>'stream']) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12" style="display: flex;">
                <div class="col-lg-4">
                    <div class="form-group"> <label for="exampleInputName2">Roll No.</label> <input type="text" name="roll_number" class="form-control" value="{{$new_roll}}" id="roll_number" placeholder="Roll No."> </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group"> <label for="exampleInputName2">Adm No.</label> <input type="text" class="form-control" name="adm_no" value="{{$new_adm}}" id="exampleInputName2" placeholder="Adm No"> </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group"> <label for="exampleInputName2">Photo: <span class="badge badge-warning">Optional</span></label> <input type="file" class="form-control" name="photo" id="exampleInputName2" placeholder=""> </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12" style="display: flex;">
                <div class="col-lg-4">
                    <div class="form-group"> <label for="exampleInputName2">Name: <span class="badge badge-danger">Required</span></label> <input type="text" name="name" class="form-control" oninput="this.value = this.value.toUpperCase()" id="roll_number" placeholder="Enter Name"> </div>

                </div>
                <div class="col-lg-4">
                    <div class="form-group"> <label for="exampleInputName2">Gender: <span class="badge badge-danger">Required</span></label>
                        <select name="gender" id="" class="form-control">
                            <option value="">Select gender</option>
                            <option value="0">Male</option>
                            <option value="1">Female</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group"> <label for="exampleInputName2">Date Of Birth: <span class="badge badge-danger">Required</span></label> <input type="date" class="form-control" name="DOB" id="exampleInputName2" placeholder="Your name"> </div>
                </div>
            </div>
        </div>

    </div>


    <div class="tab">
        <div class="col-lg-12 text-center" style="margin-bottom:20px;">
            <h3 class="h3">Document CheckList</h3>

        </div>

        <div class="form-group">
            <label for="">Documents (Check if submitted): <span class="badge badge-danger"></span></label>

            <input value="1" name="dob_cer" type="checkbox">DOB Certificate
            <input value="1" name="slc" type="checkbox">School Leaving Certificate

            <input value="1" name="rc" type="checkbox">Report Card

            <input value="1" name="ac" type="checkbox">Aadhar Card

            <input value="1" name="tc" type="checkbox">Transfer Certificate

        </div>



        <div class="form-group">

            <label for="">Documents verified? <span class="badge badge-danger"></span></label>
            <div style="display: flex">
                Verified<input value="1" id="verified" name="verified" type="radio">
                Not Verified<input value="0" id="verified" checked name="verified" type="radio">
            </div>



        </div>
    </div>


    <div class="tab">
        <div class="col-lg-12 text-center" style="margin-bottom:20px;">
            <h3 class="h3">Father & Mother Details</h3>
        </div>

        <div class="div" style="display: flex">
            <div class="col-lg-6">
                <div class="form-group"> <label for="exampleInputName2">Father Name: <span class="badge badge-danger">Required</span></label> <input type="text" class="form-control" name="father_name" id="exampleInputName2" oninput="this.value = this.value.toUpperCase()" placeholder="Father Name"> </div>


                <div class="form-group"> <label for="exampleInputName2">Father Occupation: <span class="badge badge-warning">Optional</span></label> <input type="text" class="form-control" name="father_occup" oninput="this.value = this.value.toUpperCase()" id="exampleInputName2" placeholder="Occupation Name"> </div>


                <div class="form-group"> <label for="exampleInputName2">Father UID: <span class="badge badge-warning">Optional</span></label> <input type="text" class="form-control" name="father_uid" id="exampleInputName2" oninput="this.value = this.value.toUpperCase()" placeholder="Father UID"> </div>


                <div class="form-group"> <label for="exampleInputName2">Father Qualification: <span class="badge badge-warning">Optional</span></label> <input type="text" class="form-control" name="father_qual" oninput="this.value = this.value.toUpperCase()" id="exampleInputName2" placeholder="Father Qualification"> </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group"> <label for="exampleInputName2">Mother Name: <span class="badge badge-danger">Required</span></label> <input type="text" class="form-control" name="mother_name" id="exampleInputName2" oninput="this.value = this.value.toUpperCase()" placeholder="Mother Name"> </div>


                <div class="form-group"> <label for="exampleInputName2">Mother Occupation: <span class="badge badge-warning">Optional</span></label> <input type="text" class="form-control" name="mother_occup" oninput="this.value = this.value.toUpperCase()" id="exampleInputName2" placeholder="Occupation Name"> </div>


                <div class="form-group"> <label for="exampleInputName2">Mother UID: <span class="badge badge-warning">Optional</span></label> <input type="text" class="form-control" name="mother_uid" id="exampleInputName2" oninput="this.value = this.value.toUpperCase()" placeholder="Mother UID"> </div>


                <div class="form-group"> <label for="exampleInputName2">Mother Qualification: <span class="badge badge-warning">Optional</span></label> <input type="text" class="form-control" name="mother_qual" oninput="this.value = this.value.toUpperCase()" id="exampleInputName2" placeholder="Mother Qualification"> </div>
            </div>
        </div>






    </div>

    <div class="tab">
        <div class="col-lg-12 text-center" style="margin-bottom:20px;">
            <h3 class="h3">Contact Information</h3>

        </div>


        <div class="row">
            <div class="col-lg-6">
                <div class="form-group"> <label for="exampleInputName2">Contact No. 1: <span class="badge badge-danger">Required</span></label> <input type="tel" class="form-control" name="tel1" id="exampleInputName2" placeholder="Telephone" minlength="10" maxlength="10"> </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group"> <label for="exampleInputName2">Contact No. 2: <span class="badge badge-warning">Optional</span></label> <input type="tel" class="form-control" name="tel2" id="exampleInputName2" maxlength="10" minlength="10" placeholder="Telephone" maxlength="12"> </div>
            </div>
        </div>







        <div class="form-group"> <label for="exampleInputName2">Aadhar UID: <span class="badge badge-warning">Optional</span></label> <input type="text" class="form-control" name="UID" id="exampleInputName2" placeholder="Aadhar UID" minlength="12" maxlength="12"> </div>


        <div class="row">
            <div class="col-lg-4">
                <div class="form-group"> <label for="exampleInputName65656">Vill/Building/House: <span class="badge badge-danger">Required</span></label> <input type="text" class="form-control" name="vill" oninput="this.value = this.value.toUpperCase()" id="exampleInputName65656" placeholder="Vill/Building/House "> </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group"> <label for="exampleInputName2">Post Office: <span class="badge badge-danger">Required</span></label> <input oninput="this.value = this.value.toUpperCase()" type="tel" class="form-control" name="postoffice" id="exampleInputName2" placeholder="Post Office"> </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group"> <label for="exampleInputName2">Tehsil <span class="badge badge-danger">Required</span></label> <input oninput="this.value = this.value.toUpperCase()" type="tel" class="form-control" name="tehsil" id="exampleInputName2" placeholder="Tehsil"> </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group"> <label for="exampleInputName65656">District: <span class="badge badge-danger">Required</span></label> <input oninput="this.value = this.value.toUpperCase()" type="text" class="form-control" name="district" id="exampleInputName65656" placeholder="District "> </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group"> <label for="exampleInputName2">Pincode: <span class="badge badge-danger">Required</span></label> <input oninput="this.value = this.value.toUpperCase()" type="tel" class="form-control" name="pincode" id="exampleInputName2" maxlength="6" placeholder="Pincode"> </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group"> <label for="exampleInputName2">State: <span class="badge badge-danger">Required</span></label> <input oninput="this.value = this.value.toUpperCase()" type="tel" class="form-control" name="state" id="exampleInputName2" placeholder="State" value="PUNJAB"> </div>
            </div>
        </div>





    </div>


    <div class="tab">
        <div class="col-lg-12 text-center" style="margin-bottom:20px;">
            <h3 class="h3">Other Information</h3>

        </div>





        <div class="form-group">
            <label for="">Convinience required?</label>
            <div style="display: flex">
                YES<input value="1" id="req" name="required" type="radio">
                NO<input value="0" id="nreq" name="required" type="radio">
            </div>

        </div>



        <div style="margin-top:20px; display:none;" id="stations" class="form-group"> <label for="exampleInputName2">Stations: <span class="badge badge-danger">Required</span></label>
            {!! Form::select('station_id' , $stations , 0 , ['class'=>'form-control js-example-basic-single' , 'placeholder'=>'Select Station' , 'style'=>'width:100%;']) !!}
        </div>

        <div style="margin-top:20px; display:none;" id="other_con" class="form-group"> <label for="exampleInputName2">Other Convinience: <span class="badge badge-danger">Required</span></label>
            {!! Form::select('other_con' , $other , 0 , ['class'=>'form-control' , 'placeholder'=>'Select Other convinience']) !!}
        </div>




        <div class="form-group"> <label for="exampleInputName2">Parents Annual Income: <span class="badge badge-danger">Required</span></label> <input type="number" name="annual_income" class="form-control" id="exampleInputName2" placeholder="Enter Income"> </div>




        <div class="row">
            <div class="col-lg-6">
                <div class="form-group"> <label for="exampleInputName2">Caste Category: <span class="badge badge-danger">Required</span></label>
                    {!! Form::select('caste_id' , $castes , 0 , ['class'=>'form-control' , 'placeholder'=>'Select caste ']) !!}
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group"> <label for="exampleInputName2">Religion: <span class="badge badge-danger">Required</span></label>
                    {!! Form::select('religion_id' , $religions , 0 , ['class'=>'form-control' , 'placeholder'=>'Select religion']) !!}
                </div>
            </div>

        </div>





        <div class="form-group"> <label for="exampleInputName2">Blood Group: <span class="badge badge-warning">Optional</span></label> <input oninput="this.value = this.value.toUpperCase()" type="text" class="form-control" name="blood" id="exampleInputName2" placeholder="Enter Boold Group"> </div>






    </div>

    <div style="overflow:auto;">
        <div style="float:right;">
            <button type="button" class="btn btn-danger" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
            <button type="button" class="btn btn-warning" id="nextBtn" onclick="nextPrev(1)">Next</button>
        </div>
    </div>

    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
    </div>
</div>








{!! Form::close() !!}

</div>


<div class="col-lg-12" style="padding: 80px 30px;">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Recently Registered Students</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <ul class="products-list product-list-in-card pl-2 pr-2">
                @foreach($students_latest as $student)
                <li class="item">
                    <div class="product-img">

                        <img src="/dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                        <a href="/students/{{$student->id}}" class="product-title">{{$student->name}}
                            <span class="badge badge-warning float-right"></span></a>
                        <span class="product-description">
                            {{$student->admission_date}} | Class: {{$student->grade->class}}-{{$student->section}} | Admission No. {{$student->adm_no}}
                        </span>
                    </div>
                </li>
                @endforeach

            </ul>
        </div>
        <!-- /.card-body -->
        <div class="card-footer text-center">

        </div>
        <!-- /.card-footer -->
    </div>
</div>


@stop

@section('script-plugins')

<!-- Script to get sections -->
<script type='text/javascript'>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form ...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        // ... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
            $('#nextBtn').click(function() {
                document.getElementById("myForm").submit();
            })
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        // ... and run a function that displays the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form... :
        if (currentTab >= x.length) {
            //...the form gets submitted:

            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {


        document.getElementsByClassName("step")[currentTab].className += " finish";


    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class to the current step:
        x[n].className += " active";
    }



    $(document).ready(function() {

        $('#req').change(function() {
            console.log("done")
            $('#stations').css('display', '')
            $('#other_con').hide()
        });



        $("#select_class").change(function() {
            if ($("#select_class").val() == 11 || $("#select_class").val() == 12) {
                console.log("hello")
                $("#stream").val('5');
            } else {
                $("#stream").val('3');
            }
        })



        $('#nreq').change(function() {
            $('#other_con').css('display', '')
            $('#stations').hide()

        });

        // In your Javascript (external .js resource or <script> tag)




    });
</script>

@stop