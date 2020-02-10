@extends('layouts.admin')


@section('css-plugins')
@stop
@section('heading')
Dues List
@stop

@section('content')



<div class="row">
    <div class="col-lg-12 text-center">
        <a href="/exportDues?month={{$_GET['month']}}&class={{$_GET['class']}}&section={{$_GET['section']}}" class="btn btn-warning btn-md" style="margin-bottom: 10px;">Export Dues List</a>
    </div>
</div>


<table class="table" style="padding:20px;" id="myTable">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Adm No.</th>
            <th scope="col">Father Name</th>
            <th scope="col">Class & Section</th>
            <th scope="col">Telephone</th>
            <th scope="col">Month</th>
            <th scope="col">Amount</th>
            <th scope="col">Total Pending</th>
        </tr>
    </thead>
    <tbody>
        @php
        $j = 1
        @endphp
        <?php
        $month_array = [];
        $fee_array = [];
        foreach ($students as $student) {


            if ($_GET['section'] == null and $_GET['class'] !== null) {
                if ($student->getStudent->class == $_GET['class']) {
                    if ($_GET['month'] >= 4) {
                        for ($i = 4; $i <= $_GET['month']; $i++) {
                            if (App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->count() > 0) {
                                if ($i == 4) {
                                    array_push($month_array, 'April');
                                } elseif ($i == 5) {
                                    array_push($month_array, 'May');
                                } elseif ($i == 6) {
                                    array_push($month_array, 'June');
                                } elseif ($i == 7) {
                                    array_push($month_array, 'July');
                                } elseif ($i == 8) {
                                    array_push($month_array, 'August');
                                } elseif ($i == 9) {
                                    array_push($month_array, 'September');
                                } elseif ($i == 10) {
                                    array_push($month_array, 'October');
                                } elseif ($i == 11) {
                                    array_push($month_array, 'November');
                                } elseif ($i == 12) {
                                    array_push($month_array, 'December');
                                }
                            }
                        }
                    }
                    if ($_GET['month'] >= 4) {
                        for ($i = 4; $i <= $_GET['month']; $i++) {
                            if (App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->count() > 0) {
                                $count = App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->select('5 AS five', '4 as four', '6 as six', '7 as seven', '8 as eight', '9 as nine', '10 as ten', '11 as eleven', '12 as twelve', '1 as one', '2 as two', '3 as three')->first();

                                if ($i == 4) {
                                    array_push($fee_array, $count->four);
                                } elseif ($i == 5) {
                                    array_push($fee_array, $count->five);
                                } elseif ($i == 6) {
                                    array_push($fee_array, $count->six);
                                } elseif ($i == 7) {
                                    array_push($fee_array, $count->seven);
                                } elseif ($i == 8) {
                                    array_push($fee_array, $count->eight);
                                } elseif ($i == 9) {
                                    array_push($fee_array, $count->nine);
                                } elseif ($i == 10) {
                                    array_push($fee_array, $count->ten);
                                } elseif ($i == 11) {
                                    array_push($fee_array, $count->eleven);
                                } elseif ($i == 12) {
                                    array_push($fee_array, $count->twelve);
                                }
                            }
                        }
                    }

                    if ($_GET['month'] == 1) {
                        for ($i = 1; $i <= 12; $i++) {
                            if ($i == 2) {
                                continue;
                            } elseif ($i == 3) {
                                continue;
                            }
                            if (App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->count() > 0) {
                                if ($i == 4) {
                                    array_push($month_array, 'April');
                                } elseif ($i == 5) {
                                    array_push($month_array, 'May');
                                } elseif ($i == 6) {
                                    array_push($month_array, 'June');
                                } elseif ($i == 7) {
                                    array_push($month_array, 'July');
                                } elseif ($i == 8) {
                                    array_push($month_array, 'August');
                                } elseif ($i == 9) {
                                    array_push($month_array, 'September');
                                } elseif ($i == 10) {
                                    array_push($month_array, 'October');
                                } elseif ($i == 11) {
                                    array_push($month_array, 'November');
                                } elseif ($i == 12) {
                                    array_push($month_array, 'December');
                                } elseif ($i == 1) {
                                    array_push($month_array, 'January');
                                }
                            }
                        }
                    }

                    if ($_GET['month'] == 1) {
                        for ($i = 1; $i <= 12; $i++) {
                            if ($i == 2) {
                                continue;
                            } elseif ($i == 3) {
                                continue;
                            }
                            if (App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->count() > 0) {
                                $count = App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->select('5 AS five', '4 as four', '6 as six', '7 as seven', '8 as eight', '9 as nine', '10 as ten', '11 as eleven', '12 as twelve', '1 as one', '2 as two', '3 as three')->first();

                                if ($i == 4) {
                                    array_push($fee_array, $count->four);
                                } elseif ($i == 5) {
                                    array_push($fee_array, $count->five);
                                } elseif ($i == 6) {
                                    array_push($fee_array, $count->six);
                                } elseif ($i == 7) {
                                    array_push($fee_array, $count->seven);
                                } elseif ($i == 8) {
                                    array_push($fee_array, $count->eight);
                                } elseif ($i == 9) {
                                    array_push($fee_array, $count->nine);
                                } elseif ($i == 10) {
                                    array_push($fee_array, $count->ten);
                                } elseif ($i == 11) {
                                    array_push($fee_array, $count->eleven);
                                } elseif ($i == 12) {
                                    array_push($fee_array, $count->twelve);
                                } elseif ($i == 1) {
                                    array_push($fee_array, $count->one);
                                }
                            }
                        }
                    }

                    if ($_GET['month'] == 2) {
                        for ($i = 1; $i <= 12; $i++) {
                            if ($i == 3) {
                                continue;
                            }
                            if (App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->count() > 0) {
                                $count = App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->select('5 AS five', '4 as four', '6 as six', '7 as seven', '8 as eight', '9 as nine', '10 as ten', '11 as eleven', '12 as twelve', '1 as one', '2 as two', '3 as three')->first();
                                if ($i == 4) {
                                    array_push($month_array, 'April');
                                } elseif ($i == 5) {
                                    array_push($month_array, 'May');
                                } elseif ($i == 6) {
                                    array_push($month_array, 'June');
                                } elseif ($i == 7) {
                                    array_push($month_array, 'July');
                                } elseif ($i == 8) {
                                    array_push($month_array, 'August');
                                } elseif ($i == 9) {
                                    array_push($month_array, 'September');
                                } elseif ($i == 10) {
                                    array_push($month_array, 'October');
                                } elseif ($i == 11) {
                                    array_push($month_array, 'November');
                                } elseif ($i == 12) {
                                    array_push($month_array, 'December');
                                } elseif ($i == 1) {
                                    array_push($month_array, 'January');
                                } elseif ($i == 2) {
                                    array_push($month_array, 'February');
                                }
                            }
                        }
                    }

                    if ($_GET['month'] == 2) {
                        for ($i = 1; $i <= 12; $i++) {
                            if ($i == 3) {
                                continue;
                            }
                            if (App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->count() > 0) {
                                $count = App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->select('5 AS five', '4 as four', '6 as six', '7 as seven', '8 as eight', '9 as nine', '10 as ten', '11 as eleven', '12 as twelve', '1 as one', '2 as two', '3 as three')->first();

                                if ($i == 4) {
                                    array_push($fee_array, $count->four);
                                } elseif ($i == 5) {
                                    array_push($fee_array, $count->five);
                                } elseif ($i == 6) {
                                    array_push($fee_array, $count->six);
                                } elseif ($i == 7) {
                                    array_push($fee_array, $count->seven);
                                } elseif ($i == 8) {
                                    array_push($fee_array, $count->eight);
                                } elseif ($i == 9) {
                                    array_push($fee_array, $count->nine);
                                } elseif ($i == 10) {
                                    array_push($fee_array, $count->ten);
                                } elseif ($i == 11) {
                                    array_push($fee_array, $count->eleven);
                                } elseif ($i == 12) {
                                    array_push($fee_array, $count->twelve);
                                } elseif ($i == 1) {
                                    array_push($fee_array, $count->one);
                                } elseif ($i == 2) {
                                    array_push($fee_array, $count->two);
                                }
                            }
                        }
                    }

                    if ($_GET['month'] == 3) {
                        for ($i = 1; $i <= 12; $i++) {

                            if (App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->count() > 0) {
                                $count = App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->select('5 AS five', '4 as four', '6 as six', '7 as seven', '8 as eight', '9 as nine', '10 as ten', '11 as eleven', '12 as twelve', '1 as one', '2 as two', '3 as three')->first();
                                if ($i == 4) {
                                    array_push($month_array, 'April');
                                } elseif ($i == 5) {
                                    array_push($month_array, 'May');
                                } elseif ($i == 6) {
                                    array_push($month_array, 'June');
                                } elseif ($i == 7) {
                                    array_push($month_array, 'July');
                                } elseif ($i == 8) {
                                    array_push($month_array, 'August');
                                } elseif ($i == 9) {
                                    array_push($month_array, 'September');
                                } elseif ($i == 10) {
                                    array_push($month_array, 'October');
                                } elseif ($i == 11) {
                                    array_push($month_array, 'November');
                                } elseif ($i == 12) {
                                    array_push($month_array, 'December');
                                } elseif ($i == 1) {
                                    array_push($month_array, 'January');
                                } elseif ($i == 2) {
                                    array_push($month_array, 'February');
                                } elseif ($i == 3) {
                                    array_push($month_array, 'March');
                                }
                            }
                        }
                    }

                    if ($_GET['month'] == 3) {
                        for ($i = 1; $i <= 12; $i++) {

                            if (App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->count() > 0) {
                                $count = App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->select('5 AS five', '4 as four', '6 as six', '7 as seven', '8 as eight', '9 as nine', '10 as ten', '11 as eleven', '12 as twelve', '1 as one', '2 as two', '3 as three')->first();

                                if ($i == 4) {
                                    array_push($fee_array, $count->four);
                                } elseif ($i == 5) {
                                    array_push($fee_array, $count->five);
                                } elseif ($i == 6) {
                                    array_push($fee_array, $count->six);
                                } elseif ($i == 7) {
                                    array_push($fee_array, $count->seven);
                                } elseif ($i == 8) {
                                    array_push($fee_array, $count->eight);
                                } elseif ($i == 9) {
                                    array_push($fee_array, $count->nine);
                                } elseif ($i == 10) {
                                    array_push($fee_array, $count->ten);
                                } elseif ($i == 11) {
                                    array_push($fee_array, $count->eleven);
                                } elseif ($i == 12) {
                                    array_push($fee_array, $count->twelve);
                                } elseif ($i == 1) {
                                    array_push($fee_array, $count->one);
                                } elseif ($i == 2) {
                                    array_push($fee_array, $count->two);
                                } elseif ($i == 3) {
                                    array_push($fee_array, $count->three);
                                }
                            }
                        }
                    }


                    $name = $student->getStudent->name;
                    $adm = $student->getStudent->adm_no;
                    $father = $student->getStudent->father;
                    $class = $student->getStudent->class == 100 ? 'Pre-Nursery 1' : $student->getStudent->class . "-" . $student->getStudent->section;
                    $tel = $student->getStudent->tel1;

                    echo "<tr>";
                    echo "<td>" . $j++ . "</td>";
                    echo "<td>" . $name . " </td>";
                    echo "<td>" . $adm . "</td>";
                    echo "<td>" . $father . "</td>";
                    echo "<td>" ?>


@if($student->getStudent->class == 100)
                        Pre Nursery-1
                        @endif
                        @if($student->getStudent->class == 101)
                        Nursery
                        @endif
                        @if($student->getStudent->class == 102)
                        L.K.G
                        @endif
                        @if($student->getStudent->class == 103)
                        U.K.G
                        @endif
                        @if($student->getStudent->class < 100) <?php

                                                    $a = $student->getStudent->class;
                                                    echo $a . substr(date('jS', mktime(0, 0, 0, 1, ($a % 10 == 0 ? 9 : ($a % 100 > 20 ? $a % 10 : $a % 100)), 2000)), -2);

                                                    ?> @endif
                    - {{$student->getStudent->section}}
                <?php
                    "</td>";
                    echo "<td>" . $tel . "</td>";
                    echo "<td> <table style='width:100%' class='table table-striped'> ";
                    for ($i = 0; $i < count($month_array); $i++) {
                        echo "<tr>";
                        echo "<td>";
                        echo $month_array[$i];
                        echo "</td>";
                    }

                    echo "</table></td>";
                    echo "<td> <table style='width:100%' class='table table-striped'> ";
                    for ($i = 0; $i < count($fee_array); $i++) {
                        echo "<tr>";
                        echo "<td>";
                        echo "₹ " . number_format($fee_array[$i]);
                        echo "</td>";
                    }


                    echo "</table></td>";
                    echo "<td style='font-weight:bolder'> ₹ " . number_format(array_sum($fee_array)) . "</td>";
                    echo "</tr>";

                    $month_array = [];
                    $fee_array = [];
                }
            }






            if ($_GET['class'] == null and $_GET['section'] == null) {

                if ($_GET['month'] >= 4) {
                    for ($i = 4; $i <= $_GET['month']; $i++) {
                        if (App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->count() > 0) {
                            if ($i == 4) {
                                array_push($month_array, 'April');
                            } elseif ($i == 5) {
                                array_push($month_array, 'May');
                            } elseif ($i == 6) {
                                array_push($month_array, 'June');
                            } elseif ($i == 7) {
                                array_push($month_array, 'July');
                            } elseif ($i == 8) {
                                array_push($month_array, 'August');
                            } elseif ($i == 9) {
                                array_push($month_array, 'September');
                            } elseif ($i == 10) {
                                array_push($month_array, 'October');
                            } elseif ($i == 11) {
                                array_push($month_array, 'November');
                            } elseif ($i == 12) {
                                array_push($month_array, 'December');
                            }
                        }
                    }
                }
                if ($_GET['month'] >= 4) {
                    for ($i = 4; $i <= $_GET['month']; $i++) {
                        if (App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->count() > 0) {
                            $count = App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->select('5 AS five', '4 as four', '6 as six', '7 as seven', '8 as eight', '9 as nine', '10 as ten', '11 as eleven', '12 as twelve', '1 as one', '2 as two', '3 as three')->first();

                            if ($i == 4) {
                                array_push($fee_array, $count->four);
                            } elseif ($i == 5) {
                                array_push($fee_array, $count->five);
                            } elseif ($i == 6) {
                                array_push($fee_array, $count->six);
                            } elseif ($i == 7) {
                                array_push($fee_array, $count->seven);
                            } elseif ($i == 8) {
                                array_push($fee_array, $count->eight);
                            } elseif ($i == 9) {
                                array_push($fee_array, $count->nine);
                            } elseif ($i == 10) {
                                array_push($fee_array, $count->ten);
                            } elseif ($i == 11) {
                                array_push($fee_array, $count->eleven);
                            } elseif ($i == 12) {
                                array_push($fee_array, $count->twelve);
                            }
                        }
                    }
                }

                if ($_GET['month'] == 1) {
                    for ($i = 1; $i <= 12; $i++) {
                        if ($i == 2) {
                            continue;
                        } elseif ($i == 3) {
                            continue;
                        }
                        if (App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->count() > 0) {
                            $count = App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->select('5 AS five', '4 as four', '6 as six', '7 as seven', '8 as eight', '9 as nine', '10 as ten', '11 as eleven', '12 as twelve', '1 as one', '2 as two', '3 as three')->first();
                            if ($i == 4) {
                                array_push($month_array, 'April');
                            } elseif ($i == 5) {
                                array_push($month_array, 'May');
                            } elseif ($i == 6) {
                                array_push($month_array, 'June');
                            } elseif ($i == 7) {
                                array_push($month_array, 'July');
                            } elseif ($i == 8) {
                                array_push($month_array, 'August');
                            } elseif ($i == 9) {
                                array_push($month_array, 'September');
                            } elseif ($i == 10) {
                                array_push($month_array, 'October');
                            } elseif ($i == 11) {
                                array_push($month_array, 'November');
                            } elseif ($i == 12) {
                                array_push($month_array, 'December');
                            } elseif ($i == 1) {
                                array_push($month_array, 'January');
                            }
                        }
                    }
                }

                if ($_GET['month'] == 1) {
                    for ($i = 1; $i <= 12; $i++) {
                        if ($i == 2) {
                            continue;
                        } elseif ($i == 3) {
                            continue;
                        }
                        if (App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->count() > 0) {
                            $count = App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->select('5 AS five', '4 as four', '6 as six', '7 as seven', '8 as eight', '9 as nine', '10 as ten', '11 as eleven', '12 as twelve', '1 as one', '2 as two', '3 as three')->first();

                            if ($i == 4) {
                                array_push($fee_array, $count->four);
                            } elseif ($i == 5) {
                                array_push($fee_array, $count->five);
                            } elseif ($i == 6) {
                                array_push($fee_array, $count->six);
                            } elseif ($i == 7) {
                                array_push($fee_array, $count->seven);
                            } elseif ($i == 8) {
                                array_push($fee_array, $count->eight);
                            } elseif ($i == 9) {
                                array_push($fee_array, $count->nine);
                            } elseif ($i == 10) {
                                array_push($fee_array, $count->ten);
                            } elseif ($i == 11) {
                                array_push($fee_array, $count->eleven);
                            } elseif ($i == 12) {
                                array_push($fee_array, $count->twelve);
                            } elseif ($i == 1) {
                                array_push($fee_array, $count->one);
                            }
                        }
                    }
                }

                if ($_GET['month'] == 2) {
                    for ($i = 1; $i <= 12; $i++) {
                        if ($i == 3) {
                            continue;
                        }
                        if (App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->count() > 0) {
                            $count = App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->select('5 AS five', '4 as four', '6 as six', '7 as seven', '8 as eight', '9 as nine', '10 as ten', '11 as eleven', '12 as twelve', '1 as one', '2 as two', '3 as three')->first();
                            if ($i == 4) {
                                array_push($month_array, 'April');
                            } elseif ($i == 5) {
                                array_push($month_array, 'May');
                            } elseif ($i == 6) {
                                array_push($month_array, 'June');
                            } elseif ($i == 7) {
                                array_push($month_array, 'July');
                            } elseif ($i == 8) {
                                array_push($month_array, 'August');
                            } elseif ($i == 9) {
                                array_push($month_array, 'September');
                            } elseif ($i == 10) {
                                array_push($month_array, 'October');
                            } elseif ($i == 11) {
                                array_push($month_array, 'November');
                            } elseif ($i == 12) {
                                array_push($month_array, 'December');
                            } elseif ($i == 1) {
                                array_push($month_array, 'January');
                            } elseif ($i == 2) {
                                array_push($month_array, 'February');
                            }
                        }
                    }
                }

                if ($_GET['month'] == 2) {
                    for ($i = 1; $i <= 12; $i++) {
                        if ($i == 3) {
                            continue;
                        }
                        if (App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->count() > 0) {
                            $count = App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->select('5 AS five', '4 as four', '6 as six', '7 as seven', '8 as eight', '9 as nine', '10 as ten', '11 as eleven', '12 as twelve', '1 as one', '2 as two', '3 as three')->first();

                            if ($i == 4) {
                                array_push($fee_array, $count->four);
                            } elseif ($i == 5) {
                                array_push($fee_array, $count->five);
                            } elseif ($i == 6) {
                                array_push($fee_array, $count->six);
                            } elseif ($i == 7) {
                                array_push($fee_array, $count->seven);
                            } elseif ($i == 8) {
                                array_push($fee_array, $count->eight);
                            } elseif ($i == 9) {
                                array_push($fee_array, $count->nine);
                            } elseif ($i == 10) {
                                array_push($fee_array, $count->ten);
                            } elseif ($i == 11) {
                                array_push($fee_array, $count->eleven);
                            } elseif ($i == 12) {
                                array_push($fee_array, $count->twelve);
                            } elseif ($i == 1) {
                                array_push($fee_array, $count->one);
                            } elseif ($i == 2) {
                                array_push($fee_array, $count->two);
                            }
                        }
                    }
                }

                if ($_GET['month'] == 3) {
                    for ($i = 1; $i <= 12; $i++) {

                        if (App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->count() > 0) {
                            $count = App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->select('5 AS five', '4 as four', '6 as six', '7 as seven', '8 as eight', '9 as nine', '10 as ten', '11 as eleven', '12 as twelve', '1 as one', '2 as two', '3 as three')->first();
                            if ($i == 4) {
                                array_push($month_array, 'April');
                            } elseif ($i == 5) {
                                array_push($month_array, 'May');
                            } elseif ($i == 6) {
                                array_push($month_array, 'June');
                            } elseif ($i == 7) {
                                array_push($month_array, 'July');
                            } elseif ($i == 8) {
                                array_push($month_array, 'August');
                            } elseif ($i == 9) {
                                array_push($month_array, 'September');
                            } elseif ($i == 10) {
                                array_push($month_array, 'October');
                            } elseif ($i == 11) {
                                array_push($month_array, 'November');
                            } elseif ($i == 12) {
                                array_push($month_array, 'December');
                            } elseif ($i == 1) {
                                array_push($month_array, 'January');
                            } elseif ($i == 2) {
                                array_push($month_array, 'February');
                            } elseif ($i == 3) {
                                array_push($month_array, 'March');
                            }
                        }
                    }
                }

                if ($_GET['month'] == 3) {
                    for ($i = 1; $i <= 12; $i++) {

                        if (App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->count() > 0) {
                            $count = App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->select('5 AS five', '4 as four', '6 as six', '7 as seven', '8 as eight', '9 as nine', '10 as ten', '11 as eleven', '12 as twelve', '1 as one', '2 as two', '3 as three')->first();

                            if ($i == 4) {
                                array_push($fee_array, $count->four);
                            } elseif ($i == 5) {
                                array_push($fee_array, $count->five);
                            } elseif ($i == 6) {
                                array_push($fee_array, $count->six);
                            } elseif ($i == 7) {
                                array_push($fee_array, $count->seven);
                            } elseif ($i == 8) {
                                array_push($fee_array, $count->eight);
                            } elseif ($i == 9) {
                                array_push($fee_array, $count->nine);
                            } elseif ($i == 10) {
                                array_push($fee_array, $count->ten);
                            } elseif ($i == 11) {
                                array_push($fee_array, $count->eleven);
                            } elseif ($i == 12) {
                                array_push($fee_array, $count->twelve);
                            } elseif ($i == 1) {
                                array_push($fee_array, $count->one);
                            } elseif ($i == 2) {
                                array_push($fee_array, $count->two);
                            } elseif ($i == 3) {
                                array_push($fee_array, $count->three);
                            }
                        }
                    }
                }

                $name = $student->getStudent->name;
                $adm = $student->getStudent->adm_no;
                $father = $student->getStudent->father;
                $class = $student->getStudent->class == 100 ? 'Pre-Nursery 1' : $student->getStudent->class . "-" . $student->getStudent->section;
                $tel = $student->getStudent->tel1;

                echo "<tr>";
                echo "<td>" . $j++ . "</td>";
                echo "<td>" . $name . " </td>";
                echo "<td>" . $adm . "</td>";
                echo "<td>" . $father . "</td>";
                echo "<td>" ?>


                        @if($student->getStudent->class == 100)
                        Pre Nursery-1
                        @endif
                        @if($student->getStudent->class == 101)
                        Nursery
                        @endif
                        @if($student->getStudent->class == 102)
                        L.K.G
                        @endif
                        @if($student->getStudent->class == 103)
                        U.K.G
                        @endif
                        @if($student->getStudent->class < 100) <?php

                                                    $a = $student->getStudent->class;
                                                    echo $a . substr(date('jS', mktime(0, 0, 0, 1, ($a % 10 == 0 ? 9 : ($a % 100 > 20 ? $a % 10 : $a % 100)), 2000)), -2);

                                                    ?> @endif
                - {{$student->getStudent->section}}
                <?php
                "</td>";
                echo "<td>" . $tel . "</td>";
                echo "<td> <table style='width:100%' class='table table-striped'> ";
                for ($i = 0; $i < count($month_array); $i++) {
                    echo "<tr>";
                    echo "<td>";
                    echo $month_array[$i];
                    echo "</td>";
                }

                echo "</table></td>";
                echo "<td> <table style='width:100%' class='table table-striped'> ";
                for ($i = 0; $i < count($fee_array); $i++) {
                    echo "<tr>";
                    echo "<td>";
                    echo "₹ " . number_format($fee_array[$i]);
                    echo "</td>";
                }


                echo "</table></td>";
                echo "<td style='font-weight:bolder'> ₹ " . number_format(array_sum($fee_array)) . "</td>";
                echo "</tr>";


                $month_array = [];
                $fee_array = [];
            } elseif ($_GET['section'] !== null and $_GET['class'] !== null) {
                if ( $student->getStudent->section == $_GET['section'] && $student->getStudent->class== $_GET['class']) {
                    if ($_GET['month'] >= 4) {
                        for ($i = 4; $i <= $_GET['month']; $i++) {
                            if (App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->count() > 0) {
                                if ($i == 4) {
                                    array_push($month_array, 'April');
                                } elseif ($i == 5) {
                                    array_push($month_array, 'May');
                                } elseif ($i == 6) {
                                    array_push($month_array, 'June');
                                } elseif ($i == 7) {
                                    array_push($month_array, 'July');
                                } elseif ($i == 8) {
                                    array_push($month_array, 'August');
                                } elseif ($i == 9) {
                                    array_push($month_array, 'September');
                                } elseif ($i == 10) {
                                    array_push($month_array, 'October');
                                } elseif ($i == 11) {
                                    array_push($month_array, 'November');
                                } elseif ($i == 12) {
                                    array_push($month_array, 'December');
                                }
                            }
                        }
                    }
                    if ($_GET['month'] >= 4) {
                        for ($i = 4; $i <= $_GET['month']; $i++) {
                            if (App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->count() > 0) {
                                $count = App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->select('5 AS five', '4 as four', '6 as six', '7 as seven', '8 as eight', '9 as nine', '10 as ten', '11 as eleven', '12 as twelve', '1 as one', '2 as two', '3 as three')->first();
    
                                if ($i == 4) {
                                    array_push($fee_array, $count->four);
                                } elseif ($i == 5) {
                                    array_push($fee_array, $count->five);
                                } elseif ($i == 6) {
                                    array_push($fee_array, $count->six);
                                } elseif ($i == 7) {
                                    array_push($fee_array, $count->seven);
                                } elseif ($i == 8) {
                                    array_push($fee_array, $count->eight);
                                } elseif ($i == 9) {
                                    array_push($fee_array, $count->nine);
                                } elseif ($i == 10) {
                                    array_push($fee_array, $count->ten);
                                } elseif ($i == 11) {
                                    array_push($fee_array, $count->eleven);
                                } elseif ($i == 12) {
                                    array_push($fee_array, $count->twelve);
                                }
                            }
                        }
                    }
    
                    if ($_GET['month'] == 1) {
                        for ($i = 1; $i <= 12; $i++) {
                            if ($i == 2) {
                                continue;
                            } elseif ($i == 3) {
                                continue;
                            }
                            if (App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->count() > 0) {
                                $count = App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->select('5 AS five', '4 as four', '6 as six', '7 as seven', '8 as eight', '9 as nine', '10 as ten', '11 as eleven', '12 as twelve', '1 as one', '2 as two', '3 as three')->first();
                                if ($i == 4) {
                                    array_push($month_array, 'April');
                                } elseif ($i == 5) {
                                    array_push($month_array, 'May');
                                } elseif ($i == 6) {
                                    array_push($month_array, 'June');
                                } elseif ($i == 7) {
                                    array_push($month_array, 'July');
                                } elseif ($i == 8) {
                                    array_push($month_array, 'August');
                                } elseif ($i == 9) {
                                    array_push($month_array, 'September');
                                } elseif ($i == 10) {
                                    array_push($month_array, 'October');
                                } elseif ($i == 11) {
                                    array_push($month_array, 'November');
                                } elseif ($i == 12) {
                                    array_push($month_array, 'December');
                                } elseif ($i == 1) {
                                    array_push($month_array, 'January');
                                }
                            }
                        }
                    }
    
                    if ($_GET['month'] == 1) {
                        for ($i = 1; $i <= 12; $i++) {
                            if ($i == 2) {
                                continue;
                            } elseif ($i == 3) {
                                continue;
                            }
                            if (App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->count() > 0) {
                                $count = App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->select('5 AS five', '4 as four', '6 as six', '7 as seven', '8 as eight', '9 as nine', '10 as ten', '11 as eleven', '12 as twelve', '1 as one', '2 as two', '3 as three')->first();
    
                                if ($i == 4) {
                                    array_push($fee_array, $count->four);
                                } elseif ($i == 5) {
                                    array_push($fee_array, $count->five);
                                } elseif ($i == 6) {
                                    array_push($fee_array, $count->six);
                                } elseif ($i == 7) {
                                    array_push($fee_array, $count->seven);
                                } elseif ($i == 8) {
                                    array_push($fee_array, $count->eight);
                                } elseif ($i == 9) {
                                    array_push($fee_array, $count->nine);
                                } elseif ($i == 10) {
                                    array_push($fee_array, $count->ten);
                                } elseif ($i == 11) {
                                    array_push($fee_array, $count->eleven);
                                } elseif ($i == 12) {
                                    array_push($fee_array, $count->twelve);
                                } elseif ($i == 1) {
                                    array_push($fee_array, $count->one);
                                }
                            }
                        }
                    }
    
                    if ($_GET['month'] == 2) {
                        for ($i = 1; $i <= 12; $i++) {
                            if ($i == 3) {
                                continue;
                            }
                            if (App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->count() > 0) {
                                $count = App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->select('5 AS five', '4 as four', '6 as six', '7 as seven', '8 as eight', '9 as nine', '10 as ten', '11 as eleven', '12 as twelve', '1 as one', '2 as two', '3 as three')->first();
                                if ($i == 4) {
                                    array_push($month_array, 'April');
                                } elseif ($i == 5) {
                                    array_push($month_array, 'May');
                                } elseif ($i == 6) {
                                    array_push($month_array, 'June');
                                } elseif ($i == 7) {
                                    array_push($month_array, 'July');
                                } elseif ($i == 8) {
                                    array_push($month_array, 'August');
                                } elseif ($i == 9) {
                                    array_push($month_array, 'September');
                                } elseif ($i == 10) {
                                    array_push($month_array, 'October');
                                } elseif ($i == 11) {
                                    array_push($month_array, 'November');
                                } elseif ($i == 12) {
                                    array_push($month_array, 'December');
                                } elseif ($i == 1) {
                                    array_push($month_array, 'January');
                                } elseif ($i == 2) {
                                    array_push($month_array, 'February');
                                }
                            }
                        }
                    }
    
                    if ($_GET['month'] == 2) {
                        for ($i = 1; $i <= 12; $i++) {
                            if ($i == 3) {
                                continue;
                            }
                            if (App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->count() > 0) {
                                $count = App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->select('5 AS five', '4 as four', '6 as six', '7 as seven', '8 as eight', '9 as nine', '10 as ten', '11 as eleven', '12 as twelve', '1 as one', '2 as two', '3 as three')->first();
    
                                if ($i == 4) {
                                    array_push($fee_array, $count->four);
                                } elseif ($i == 5) {
                                    array_push($fee_array, $count->five);
                                } elseif ($i == 6) {
                                    array_push($fee_array, $count->six);
                                } elseif ($i == 7) {
                                    array_push($fee_array, $count->seven);
                                } elseif ($i == 8) {
                                    array_push($fee_array, $count->eight);
                                } elseif ($i == 9) {
                                    array_push($fee_array, $count->nine);
                                } elseif ($i == 10) {
                                    array_push($fee_array, $count->ten);
                                } elseif ($i == 11) {
                                    array_push($fee_array, $count->eleven);
                                } elseif ($i == 12) {
                                    array_push($fee_array, $count->twelve);
                                } elseif ($i == 1) {
                                    array_push($fee_array, $count->one);
                                } elseif ($i == 2) {
                                    array_push($fee_array, $count->two);
                                }
                            }
                        }
                    }
    
                    if ($_GET['month'] == 3) {
                        for ($i = 1; $i <= 12; $i++) {
    
                            if (App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->count() > 0) {
                                $count = App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->select('5 AS five', '4 as four', '6 as six', '7 as seven', '8 as eight', '9 as nine', '10 as ten', '11 as eleven', '12 as twelve', '1 as one', '2 as two', '3 as three')->first();
                                if ($i == 4) {
                                    array_push($month_array, 'April');
                                } elseif ($i == 5) {
                                    array_push($month_array, 'May');
                                } elseif ($i == 6) {
                                    array_push($month_array, 'June');
                                } elseif ($i == 7) {
                                    array_push($month_array, 'July');
                                } elseif ($i == 8) {
                                    array_push($month_array, 'August');
                                } elseif ($i == 9) {
                                    array_push($month_array, 'September');
                                } elseif ($i == 10) {
                                    array_push($month_array, 'October');
                                } elseif ($i == 11) {
                                    array_push($month_array, 'November');
                                } elseif ($i == 12) {
                                    array_push($month_array, 'December');
                                } elseif ($i == 1) {
                                    array_push($month_array, 'January');
                                } elseif ($i == 2) {
                                    array_push($month_array, 'February');
                                } elseif ($i == 3) {
                                    array_push($month_array, 'March');
                                }
                            }
                        }
                    }
    
                    if ($_GET['month'] == 3) {
                        for ($i = 1; $i <= 12; $i++) {
    
                            if (App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->count() > 0) {
                                $count = App\Dues::where($i, ">", 0)->where('student_id', $student->student_id)->select('5 AS five', '4 as four', '6 as six', '7 as seven', '8 as eight', '9 as nine', '10 as ten', '11 as eleven', '12 as twelve', '1 as one', '2 as two', '3 as three')->first();
    
                                if ($i == 4) {
                                    array_push($fee_array, $count->four);
                                } elseif ($i == 5) {
                                    array_push($fee_array, $count->five);
                                } elseif ($i == 6) {
                                    array_push($fee_array, $count->six);
                                } elseif ($i == 7) {
                                    array_push($fee_array, $count->seven);
                                } elseif ($i == 8) {
                                    array_push($fee_array, $count->eight);
                                } elseif ($i == 9) {
                                    array_push($fee_array, $count->nine);
                                } elseif ($i == 10) {
                                    array_push($fee_array, $count->ten);
                                } elseif ($i == 11) {
                                    array_push($fee_array, $count->eleven);
                                } elseif ($i == 12) {
                                    array_push($fee_array, $count->twelve);
                                } elseif ($i == 1) {
                                    array_push($fee_array, $count->one);
                                } elseif ($i == 2) {
                                    array_push($fee_array, $count->two);
                                } elseif ($i == 3) {
                                    array_push($fee_array, $count->three);
                                }
                            }
                        }
                    }
    
                    $name = $student->getStudent->name;
                    $adm = $student->getStudent->adm_no;
                    $father = $student->getStudent->father;
                    $class = $student->getStudent->class == 100 ? 'Pre-Nursery 1' : $student->getStudent->class . "-" . $student->getStudent->section;
                    $tel = $student->getStudent->tel1;
    
                    echo "<tr>";
                    echo "<td>" . $j++ . "</td>";
                    echo "<td>" . $name . " </td>";
                    echo "<td>" . $adm . "</td>";
                    echo "<td>" . $father . "</td>";
                    echo "<td>" ?>
    
    
    @if($student->getStudent->class == 100)
                            Pre Nursery-1
                            @endif
                            @if($student->getStudent->class == 101)
                            Nursery
                            @endif
                            @if($student->getStudent->class == 102)
                            L.K.G
                            @endif
                            @if($student->getStudent->class == 103)
                            U.K.G
                            @endif
                            @if($student->getStudent->class < 100) <?php
    
                                                        $a = $student->getStudent->class;
                                                        echo $a . substr(date('jS', mktime(0, 0, 0, 1, ($a % 10 == 0 ? 9 : ($a % 100 > 20 ? $a % 10 : $a % 100)), 2000)), -2);
    
                                                        ?> @endif
                    - {{$student->getStudent->section}}
            <?php
                    "</td>";
                    echo "<td>" . $tel . "</td>";
                    echo "<td> <table style='width:100%' class='table table-striped'> ";
                    for ($i = 0; $i < count($month_array); $i++) {
                        echo "<tr>";
                        echo "<td>";
                        echo $month_array[$i];
                        echo "</td>";
                    }
    
                    echo "</table></td>";
                    echo "<td> <table style='width:100%' class='table table-striped'> ";
                    for ($i = 0; $i < count($month_array); $i++) {
                        echo "<tr>";
                        echo "<td>";
                        echo "₹ " . number_format($fee_array[$i]);
                        echo "</td>";
                    }
    
    
                    echo "</table></td>";
                    echo "<td style='font-weight:bolder'> ₹ " . number_format(array_sum($fee_array)) . "</td>";
                    echo "</tr>";
    
    
                    $month_array = [];
                    $fee_array = [];
                }
                }
                
        }





        ?>



    </tbody>
</table>



@stop

@section('script-plugins')

@stop