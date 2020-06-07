@extends('layouts.admin')
@section('heading')
Register Students
@stop


@section('content')


<style>
    .wrap {
        max-width: 980px;
        margin: 10px auto 0;
    }

    #steps {
        margin: 80px 0 0 0
    }

    .commands {
        overflow: hidden;
        margin-top: 30px;
    }

    .prev {
        float: left
    }

    .next,
    .submit {
        float: right
    }

    .error {
        color: #b33;
    }

    #progress {
        position: relative;
        height: 5px;
        background-color: #eee;
        margin-bottom: 20px;
    }

    #progress-complete {
        border: 0;
        position: absolute;
        height: 5px;
        min-width: 10px;
        background-color: #337ab7;
        transition: width .2s ease-in-out;
    }
</style>


<div class="row wrap">
    <div class="col-lg-12">

        {!! Form::open([

        'action'=>'StudentsController@store',
        'method'=>'POST',
        'enctype'=>'multipart/form-data',
        'id'=>'RegisterForm'

        ]) !!}

        <!-- One "tab" for each step in the form: -->
        <div id='progress'>
            <div id='progress-complete'></div>
        </div>

        <fieldset>
            <legend>Basic Information</legend>
            <div class="row">
                <div class="col-lg-12" style="display: flex;">
                    <div class="col-lg-4">
                        <div class="form-group"> <label for="exampleInputName2">Date Of Adm: </label> <span class="badge badge-danger">Required</span> <input type="date" name="date_of_adm" value="{{now()->toDateString()}}" required class="form-control" id="exampleInputName2" placeholder="Your name"> </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group"> <label for="exampleInputName2">Session</label> <input type="text" class="form-control" name="session" value="{{now()->year}}-{{now()->year+1}}" id="exampleInputName2" required placeholder="" readonly> </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group"> <label for="exampleInputName2">Adm Type: <span class="badge badge-danger">Required</span></label>
                            <select name="adm_type" required id="" class="form-control">
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
                            {!! Form::select('grade_id' , $classes , 0 , ['class'=>'form-control' , 'placeholder'=>'Select class' , 'id'=>'select_class' , 'required']) !!}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group"> <label for="exampleInputName2">Section: <span class="badge badge-danger">Required</span></label>
                            <select required name="section_id" id="select_section" class="form-control">
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
                            {!! Form::select('stream_id' , $streams , 0 , ['class'=>'form-control' , 'placeholder'=>'Select Streams' , 'id'=>'stream' , 'required']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12" style="display: flex;">
                    <div class="col-lg-4">
                        <div class="form-group"> <label for="exampleInputName2">Roll No.</label> <input type="text" name="roll_number" required class="form-control" value="{{$new_roll}}" id="roll_number" placeholder="Roll No."> </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group"> <label for="exampleInputName2">Adm No.</label> <input type="text" class="form-control" required name="adm_no" value="{{$new_roll}}" id="exampleInputName2" placeholder="Adm No"> </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group"> <label for="exampleInputName2">Photo: <span class="badge badge-warning">Optional</span></label> <input type="file" class="form-control" name="photo" id="exampleInputName2" placeholder=""> </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12" style="display: flex;">
                    <div class="col-lg-4">
                        <div class="form-group"> <label for="exampleInputName2">Name: <span class="badge badge-danger">Required</span></label> <input required type="text" name="name" class="form-control" oninput="this.value = this.value.toUpperCase()" value="{{old('name')}}" id="roll_number" placeholder="Enter Name"> </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="form-group"> <label for="exampleInputName2">Gender: <span class="badge badge-danger">Required</span></label>
                            <select name="gender" required id="" class="form-control">
                                <option value="">Select gender</option>
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group"> <label for="exampleInputName2">Date Of Birth: <span class="badge badge-danger">Required</span></label> <input type="date" class="form-control" required name="DOB" id="exampleInputName2" placeholder="Your name"> </div>
                    </div>
                </div>
            </div>
        </fieldset>


        <fieldset>
            <legend>Certificates</legend>
            <table class="table">
                <thead>
                    <tr>
                        <th>DOB certificate</th>
                        <th>Aadhaar Card</th>
                        <th>School leaving certificate</th>
                        <th>Report Card</th>
                        <th>Online Tc</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input value="1" name="dob_cer" type="checkbox"></td>
                        <td><input value="1" name="ac" type="checkbox"></td>
                        <td><input value="1" name="slc" type="checkbox"></td>
                        <td><input value="1" name="rc" type="checkbox"></td>
                        <td><input value="1" name="tc" type="checkbox"></td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <label for="">Documents verified? <span class="badge badge-danger"></span></label>
                <div style="display: flex">
                    Verified<input value="1" id="verified" name="verified" type="radio">
                    Not Verified<input value="0" id="verified" checked name="verified" type="radio">
                </div>
            </div>
        </fieldset>


        <fieldset>
            <legend>Father and mother details</legend>

            <div class="div" style="display: flex">
                <div class="col-lg-6">
                    <div class="form-group"> <label for="exampleInputName2">Father Name: <span class="badge badge-danger">Required</span></label> <input type="text" class="form-control" name="father_name" id="exampleInputName2" required oninput="this.value = this.value.toUpperCase()" placeholder="Father Name"> </div>


                    <div class="form-group"> <label for="exampleInputName2">Father Occupation: <span class="badge badge-warning">Optional</span></label> <input type="text" class="form-control" name="father_occup" oninput="this.value = this.value.toUpperCase()" id="exampleInputName2" placeholder="Occupation Name"> </div>


                    <div class="form-group"> <label for="exampleInputName2">Father UID: <span class="badge badge-warning">Optional</span></label> <input type="number" class="form-control" name="father_uid" id="exampleInputName2" maxlength="12" oninput="this.value = this.value.toUpperCase()" placeholder="Father UID"> </div>


                    <div class="form-group"> <label for="exampleInputName2">Father Qualification: <span class="badge badge-warning">Optional</span></label> <input type="text" class="form-control" name="father_qual" oninput="this.value = this.value.toUpperCase()" id="exampleInputName2" placeholder="Father Qualification"> </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group"> <label for="exampleInputName2">Mother Name: <span class="badge badge-danger">Required</span></label> <input type="text" class="form-control" name="mother_name" id="exampleInputName2" required oninput="this.value = this.value.toUpperCase()" placeholder="Mother Name"> </div>


                    <div class="form-group"> <label for="exampleInputName2">Mother Occupation: <span class="badge badge-warning">Optional</span></label> <input type="text" class="form-control" name="mother_occup" oninput="this.value = this.value.toUpperCase()" id="exampleInputName2" placeholder="Occupation Name"> </div>


                    <div class="form-group"> <label for="exampleInputName2">Mother UID: <span class="badge badge-warning">Optional</span></label> <input type="number" class="form-control" name="mother_uid" id="exampleInputName2" maxlength="12" oninput="this.value = this.value.toUpperCase()" placeholder="Mother UID"> </div>


                    <div class="form-group"> <label for="exampleInputName2">Mother Qualification: <span class="badge badge-warning">Optional</span></label> <input type="text" class="form-control" name="mother_qual" oninput="this.value = this.value.toUpperCase()" id="exampleInputName2" placeholder="Mother Qualification"> </div>
                </div>
            </div>






        </fieldset>

        <fieldset>
            <legend>Contact Details</legend>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group"> <label for="exampleInputName2">Contact No. 1: <span class="badge badge-danger">Required</span></label> <input type="tel" class="form-control" name="tel1" id="exampleInputName2" placeholder="Telephone" required minlength="10" maxlength="10"> </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group"> <label for="exampleInputName2">Contact No. 2: <span class="badge badge-warning">Optional</span></label> <input type="tel" class="form-control" name="tel2" id="exampleInputName2" maxlength="10" minlength="10" placeholder="Telephone" maxlength="12"> </div>
                </div>
            </div>







            <div class="form-group"> <label for="exampleInputName2">Aadhar UID: <span class="badge badge-warning">Optional</span></label> <input type="text" class="form-control" name="UID" id="exampleInputName2" placeholder="Aadhar UID" minlength="12" maxlength="12"> </div>


            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group"> <label for="exampleInputName65656">Vill/Building/House: <span class="badge badge-danger">Required</span></label> <input type="text" class="form-control" name="vill" oninput="this.value = this.value.toUpperCase()" id="exampleInputName65656" required placeholder="Vill/Building/House "> </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group"> <label for="exampleInputName2">Post Office: <span class="badge badge-danger">Required</span></label> <input oninput="this.value = this.value.toUpperCase()" type="tel" class="form-control" required name="postoffice" id="exampleInputName2" placeholder="Post Office"> </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group"> <label for="exampleInputName2">Tehsil <span class="badge badge-danger">Required</span></label> <input oninput="this.value = this.value.toUpperCase()" type="tel" class="form-control" required name="tehsil" id="exampleInputName2" placeholder="Tehsil"> </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group"> <label for="exampleInputName65656">District: <span class="badge badge-danger">Required</span></label> <input oninput="this.value = this.value.toUpperCase()" type="text" class="form-control" required name="district" id="exampleInputName65656" placeholder="District "> </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group"> <label for="exampleInputName2">Pincode: <span class="badge badge-danger">Required</span></label> <input oninput="this.value = this.value.toUpperCase()" type="tel" class="form-control" required name="pincode" id="exampleInputName2" maxlength="6" placeholder="Pincode"> </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group"> <label for="exampleInputName2">State: <span class="badge badge-danger">Required</span></label> <input oninput="this.value = this.value.toUpperCase()" type="tel" class="form-control" required name="state" id="exampleInputName2" placeholder="State" value="PUNJAB"> </div>
                </div>
            </div>





        </fieldset>


        <fieldset>

            <legend>Other information</legend>
            <div class="form-group">
                <label for="">Convinience required?</label>
                <div style="display: flex">
                    YES<input value="1" required id="req" name="required" type="radio">
                    NO<input value="0" required id="nreq" name="required" type="radio">
                </div>

            </div>



            <div style="margin-top:20px; display:none;" id="stations" class="form-group"> <label for="exampleInputName2">Stations: <span class="badge badge-danger">Required</span></label>
                <select name="station_id" id="" class="form-control js-example-basic-single">
                    <option value="" selected>Select a station</option>
                    @foreach($stations as $station)
                    <option value="{{$station->id}}">{{$station->name}} | ₹{{$station->fee}}</option>
                    @endforeach
                </select>
            </div>

            <div style="margin-top:20px; display:none;" id="other_con" class="form-group"> <label for="exampleInputName2">Other Convinience: <span class="badge badge-danger">Required</span></label>
                {!! Form::select('other_con' , $other , 0 , ['class'=>'form-control' , 'placeholder'=>'Select Other convinience']) !!}
            </div>




            <div class="form-group"> <label for="exampleInputName2">Parents Annual Income: <span class="badge badge-danger">Required</span></label> <input required type="number" name="annual_income" class="form-control" id="exampleInputName2" placeholder="Enter Income"> </div>




            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group"> <label for="exampleInputName2">Caste Category: <span class="badge badge-danger">Required</span></label>
                        {!! Form::select('caste_id' , $castes , 0 , ['class'=>'form-control' , 'placeholder'=>'Select caste ' , 'required']) !!}
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group"> <label for="exampleInputName2">Religion: <span class="badge badge-danger">Required</span></label>
                        {!! Form::select('religion_id' , $religions , 0 , ['class'=>'form-control' , 'placeholder'=>'Select religion' , 'required']) !!}
                    </div>
                </div>

            </div>

            <div class="form-group"> <label for="exampleInputName2">Blood Group: <span class="badge badge-warning">Optional</span></label> <input oninput="this.value = this.value.toUpperCase()" type="text" class="form-control" name="blood" id="exampleInputName2" placeholder="Enter Boold Group"> </div>
        </fieldset>

        <p>
            <button id="SaveAccount" class="btn btn-primary submit">Submit form</button>
        </p>

        {!! Form::close() !!}

    </div>
</div>


@stop

@section('script-plugins')

<script src="/jqueryW.js"></script>
<script src="/validateJquery.js"></script>
<script src="/jquery.formtowizard.js"></script>
<script>
    $(function() {
        var $signupForm = $('#RegisterForm');

        $signupForm.validate({
            errorElement: 'em'
        });

        $signupForm.formToWizard({
            submitButton: 'SaveAccount',
            nextBtnClass: 'btn btn-primary next',
            prevBtnClass: 'btn btn-default prev',
            buttonTag: 'button',
            validateBeforeNext: function(form, step) {
                var stepIsValid = true;
                var validator = form.validate();
                $(':input', step).each(function(index) {
                    var xy = validator.element(this);
                    stepIsValid = stepIsValid && (typeof xy == 'undefined' || xy);
                });
                return stepIsValid;
            },
            progress: function(i, count) {
                $('#progress-complete').width('' + (i / count * 100) + '%');
            }
        });
    });
</script>


<script>
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