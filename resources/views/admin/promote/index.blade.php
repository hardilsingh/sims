@extends('layouts.admin')

@section('heading')
Promote Students
@stop


@section('content')




<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Session </h3>

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
                <div style="padding: 50px;">
                <button class="btn btn-lg btn-success" style="position: relative; left:50%; transform: translateX(-50%); padding:30px 60px;" id="session">Start New Session &rarr;</button>
                </div>

                <div>
                    <ul style="font-weight:bolder; font-size: 20px;">
                        <li>Current Session: {{now()->year}}</li>
                        <li>New Session: {{now()->year + 1}}</li>
                        <li>New Session Start Date: {{now()}}</li>
                    </ul>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">

            </div>
            <!-- /.card-footer -->
        </div>
    </div>
</div>


@stop

@section('script-plugins')

<script>
    $(document).ready(function() {
        $("#session").click(function() {
            if(confirm("Are you sure you want to start a new session?")) {
                window.location.href = "/newsession"
            }
        })
    });
</script>

@stop