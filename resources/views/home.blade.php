@extends('layouts.admin')
@section('title')
Dashboard
@stop

@section('heading')
Dashboard
@stop

@section('content')


<div class="row">
    <div class="col-lg-12 text-right">
        <ul>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link" style="font-size:35px;"><b>Welcome {{Auth::user()->name}}</b></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link" style="font-size:35px;">{{now()->format('d/m/Y')}}</a>
            </li>

        </ul>

    </div>
</div>

<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Students</span>
                <span class="info-box-number">{{$students}}

                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-money-check-alt"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Collection <b>({{now()->format('d/m/Y')}})</b></span>
                <span class="info-box-number">₹ {{number_format($collection)}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-rupee-sign"></i></span>

            <div class="info-box-content">
                <span class="info-box-text"><a href="{{route('fee.index')}}">Fee Transactions</a></span>
                <span class="info-box-number">Transact Fee</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-female"></i></span>

            <div class="info-box-content">
                <span class="info-box-text"><a href="{{route('students.create')}}">Register Students</a></span>
                <span class="info-box-number">Register Students</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
</div>



<div class="row">
    <div class="col-lg-4">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Male Female Ratio</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <canvas id="donutChart" style="height: 230px; min-height: 230px; display: block; width: 572px; font-size:18px;" width="715" height="287" class="chartjs-render-monitor"></canvas>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text"><a href="/prints">Export Custom Lists</a></span>
                <span class="info-box-number">
                    Student List
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>

    <div class="col-lg-8">
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

                            <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                            <a href="/students/{{$student->id}}" class="product-title">{{$student->name}}
                                <span class="badge badge-warning float-right"></span></a>
                            <span class="product-description">
                                {{\Carbon\Carbon::parse($student->admission_date)->format('d/m/Y')}} | Class: {{$student->grade->class}}-{{$student->section}} | Admission No. {{$student->adm_no}}
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
</div>

<div class="row">
    <div class="col-lg-12">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Gross Payable</th>
                    <th>Gross Concession</th>
                    <th>Net Recieved</th>
                    <th>Net Outstanding</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{App\Dues::sum('openingBalance')}}</td>
                    <td>{{App\Dues::where('concession', '>', 0)->sum('openingBalance') - App\Dues::where('concession', '>', 0)->sum('concession') }}</td>
                    <td>{{App\Reciept::sum('paid')}}</td>
                    <td>{{App\Dues::sum('total')}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>





</div>



@stop

@section('script-plugins')

<!-- ChartJS -->
<script src="/plugins/chart.js/Chart.min.js"></script>


<script>
    var grossPayable = <?php echo App\Dues::sum('openingBalance') ?>;
    var grossConcession = <?php echo App\Dues::where('concession', '>', 0)->sum('openingBalance') - App\Dues::where('concession', '>', 0)->sum('concession') ?>;
    var netRecieved = <?php echo App\Reciept::sum('paid') ?>;
    var netOutstanding = <?php echo App\Dues::sum('total') ?>;

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData = {
        labels: [
            'Gross Payable',
            'Gross Concession',
            'Net Recieved',
            'Net Outstanding',
        ],
        datasets: [{
            data: [parseInt(grossPayable), parseInt(grossConcession), parseInt(netRecieved), parseInt(netOutstanding)],
            backgroundColor: ['#f56954', '#0027DE', '#66E000', '#F900B1'],
        }]
    }
    var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
    })
</script>
@stop