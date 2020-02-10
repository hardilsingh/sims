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
                <div id="head2">
                    <div>
                        <select id='gMonth2' class="form-control">
                            <option selected value=''>--Select Month--</option>
                            <option value='1'>Janaury</option>
                            <option value='2'>February</option>
                            <option value='3'>March</option>
                            <option value='4'>April</option>
                            <option value='5'>May</option>
                            <option value='6'>June</option>
                            <option value='7'>July</option>
                            <option value='8'>August</option>
                            <option value='9'>September</option>
                            <option value='10'>October</option>
                            <option value='11'>November</option>
                            <option value='12'>December</option>
                        </select>
                    </div>


                    <div class="div">

                        {!! Form::select('grade_id' , $classes , 0 , ['class'=>'form-control' , 'placeholder'=>'Select class' , 'id'=>'select_class']) !!}
                    </div>


                    <div>
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
        window.location.href = "/getDues?month=" + $('#gMonth2').val() + "&class=" + $("#select_class").val() + "&section=" + $("#select_section").val();
    });
</script>

@stop