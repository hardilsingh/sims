@extends('layouts.admin')

@section('content')


<style>
    .req {
        color: red;
    }
</style>


<button type="button" style="display:none" class="btn btn-primary" id="modal" data-toggle="modal" data-target="#exampleModal" data-backdrop="static" data-keyboard="false" data-whatever="@mdo">Open modal for @mdo</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select class and section</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Class:</label>
                        {!! Form::select('class' ,$classes , 0 , ['class'=>'form-control' , 'placeholder'=>'ALL Classes' ,
                        'id'=>'select_class' , 'required'])
                        !!}
                    </div>
                    <div class="form-group">
                        <label for="">Select Section:</label>
                        <select name="section_id" id="select_section" class="form-control">
                            <option value="ALL" selected>ALL sections</option>
                            <option value="Rose">Rose</option>
                            <option value="Lotus">Lotus</option>
                            <option value="Marigold">Marigold</option>
                            <option value="Tulip">Tulip</option>
                            <option value="Violet">Violet</option>
                            <option value="D">D</option>
                            <option value="X">X</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Convinience:</label>
                        <label for="yes">Yes:
                            <input type="radio" name="con" value="1" id="yes">
                        </label>
                        <label for="no">No:
                            <input type="radio" name="con" value="0" id="no">
                        </label>
                        <label for="allcon">Both:
                            <input type="radio" checked name="con" value="" id="allcon">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="gender" style="margin-bottom: 20px">Select Gender:</label> <br>

                        <label for="male">Male:
                            <input type="radio" name="gender" value="0" id="male">
                        </label>
                        <label for="female">Female:
                            <input type="radio" name="gender" value="1" id="female">
                        </label>
                        <label for="all">Both:
                            <input type="radio" checked name="gender" value="" id="all">
                        </label>
                    </div>

                    <div class="form-group"> <label for="exampleInputName2">Caste Category: <span class="req">(By default all will be displayed) </span></label>
                        {!! Form::select('caste_id' , $castes , 0 , ['class'=>'form-control' , 'placeholder'=>'Select caste ' , 'id'=>'caste']) !!}
                    </div>




                    <div class="form-group"> <label for="exampleInputName2">Religion: <span class="req">(By default all will be displayed) </span> </label>
                        {!! Form::select('religion_id' , $religions , 0 , ['class'=>'form-control' , 'placeholder'=>'Select religion' , 'id'=>'religion']) !!}
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="search" class="btn btn-primary">Get List</button>
            </div>
        </div>
    </div>
</div>


@stop

@section('script-plugins')

<script>
    $(document).ready(function() {
        $("#modal").trigger('click');
    });


    $("#search").click(function() {
        window.location.href = "/searchedlist?classId=" + $('#select_class').val() + "&sectionId=" + $('#select_section').val() + "&gender=" + $("input[name='gender']:checked").val() + "&caste=" + $('#caste').val() + "&religion=" + $('#religion').val() + "&con=" +  $("input[name='con']:checked").val();
    });
</script>

@stop