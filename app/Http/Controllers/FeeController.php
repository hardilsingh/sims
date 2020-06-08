<?php

namespace App\Http\Controllers;

use App\Concession;
use App\Father;
use App\Fee;
use App\Grade;
use App\Reciept;
use App\Section;
use App\Station;
use App\Students;
use App\Dues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $classes = Grade::pluck('class', 'id');
        $reciepts = Reciept::orderBy('id', 'DESC')->paginate(3);
        $collection = Reciept::where('date', now()->toDateString())->sum('paid');
        return view('admin.fee.index', compact(["classes", 'reciepts', 'collection']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Fee::findOrFail($id)->update($request->except('particulars', 'fee', 'paid', 'student_id', 'myTable_length', 'late', 'mode', 'refrence', 'month'));

        $particulars = explode(",", $request->particulars);
        $fee_ser = explode(",", $request->fee);
        $month = array_map('intval', explode(',', $request->month));
        $paid = $request->paid;
        $student_id = $request->student_id;

        $student = Students::findOrFail($student_id);

        $get =  Dues::where("student_id", $student->id)->first();
        $total_pending = $get->total - $request->paid;
        DB::update('update dues set total = ' . $total_pending . ' where id = ?', [$get->id]);


        for ($i = 0; $i <= count($month) - 1; $i++) {
            $dues_update = Dues::where("student_id", $student->id)->select('5 AS five', '4 AS four', '6 AS six', '7 AS seven', '8 AS eight', '9 AS nine', '10 AS ten', '11 AS eleven', '12 AS twelve', '1 AS one', '2 AS two', '3 AS three', 'id AS id', 'created_at AS created_at', 'updated_at AS updated_at', 'total AS total')->first();
            if ($month[$i] == 1) {
                $pending = $dues_update->one - $fee_ser[$i];
                DB::update('update dues set `1` = ' . $pending . ' where id = ?', [$dues_update->id]);
            } elseif ($month[$i] == 2) {
                $pending = $dues_update->two - $fee_ser[$i];
                DB::update('update dues set `2` = ' . $pending . ' where id = ?', [$dues_update->id]);
            } elseif ($month[$i] == 3) {
                $pending =  $dues_update->three - $fee_ser[$i];
                DB::update('update dues set `3` = ' . $pending . ' where id = ?', [$dues_update->id]);
            } elseif ($month[$i] == 4) {
                $pending = $dues_update->four - $fee_ser[$i];
                DB::update('update dues set `4` = ' . $pending . ' where id = ?', [$dues_update->id]);
            } elseif ($month[$i] == 5) {
                $pending = $dues_update->five - $fee_ser[$i];
                DB::update('update dues set `5` = ' . $pending . ' where id = ?', [$dues_update->id]);
            } elseif ($month[$i] == 6) {
                $pending = $dues_update->six - $fee_ser[$i];
                DB::update('update dues set `6` = ' . $pending . ' where id = ?', [$dues_update->id]);
            } elseif ($month[$i] == 7) {
                $pending = $dues_update->seven - $fee_ser[$i];
                DB::update('update dues set `7` = ' . $pending . ' where id = ?', [$dues_update->id]);
            } elseif ($month[$i] == 8) {
                $pending = $dues_update->eight - $fee_ser[$i];
                DB::update('update dues set `8` = ' . $pending . ' where id = ?', [$dues_update->id]);
            } elseif ($month[$i] == 9) {
                $pending = $dues_update->nine - $fee_ser[$i];
                DB::update('update dues set `9` = ' . $pending . ' where id = ?', [$dues_update->id]);
            } elseif ($month[$i] == 10) {
                $pending = $dues_update->ten - $fee_ser[$i];
                DB::update('update dues set `10` = ' . $pending . ' where id = ?', [$dues_update->id]);
            } elseif ($month[$i] == 11) {
                $pending = $dues_update->eleven - $fee_ser[$i];
                DB::update('update dues set `11` = ' . $pending . ' where id = ?', [$dues_update->id]);
            } elseif ($month[$i] == 12) {
                $pending = $dues_update->twelve - $fee_ser[$i];
                DB::update('update dues set `12` = ' . $pending . ' where id = ?', [$dues_update->id]);
            }
        }


        $reciepts = Reciept::orderBy('created_at', 'DESC')->where("student_id", $student_id)->first();
        if ($reciepts == null) {
            $count = 0;
        } else {
            $count = $reciepts->count();
        }

        if ($count == 0) {
            $reciept = Reciept::create([
                'student_id' => $student_id,
                'paid' => $paid,
                'outstanding' => $get->total - $paid,
                'particulars' => serialize($particulars),
                'fee' => serialize($fee_ser),
                'date' => now()->toDateString(),
                'mode' => $request->mode,
                'refrence' => $request->refrence,
                'user_id' => Auth::user()->id,
				'balance' => $request->outstanding,
				'previous_balance'=> 0
            ]);
        } else {
			
			$previous = Reciept::orderBy('created_at', 'DESC')->where('student_id', $student_id)->first('balance')->balance;
            $reciept = Reciept::create([
                'student_id' => $student_id,
                'paid' => $paid,
                'outstanding' => $get->total - $paid,
                'particulars' => serialize($particulars),
                'fee' => serialize($fee_ser),
                'date' => now()->toDateString(),
                'mode' => $request->mode,
                'refrence' => $request->refrence,
                'user_id' => Auth::user()->id,
				'balance' => $request->outstanding,
				'previous_balance'=> $previous,

            ]);
        }
        $recipet_id = $reciept->id;
        $request->session()->flash('updated', 'updated');
        return redirect('/redirect?id=' . $recipet_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function manage($student_id)
    {

        $student = Students::findOrFail($student_id);
        $fee = Fee::where('student_id', $student_id)->first();
        $concession = Concession::pluck('name', 'id');
        $reciepts = Reciept::where('student_id', $student_id)->get();



        if ($fee->concession == null) {
            $fee_concession = null;
            $count2 = Dues::where('student_id', $student_id)->select('5 AS five', '4 as four', '6 as six', '7 as seven', '8 as eight', '9 as nine', '10 as ten', '11 as eleven', '12 as twelve', '1 as one', '2 as two', '3 as three', 'concession AS concession', 'total as total')->first();

            $total = $count2->one + $count2->two  + $count2->three  + $count2->four  + $count2->five  + $count2->six  + $count2->seven  + $count2->eight  + $count2->nine  + $count2->ten  + $count2->eleven  + $count2->twelve;
        } else {
            $fee_concession = Concession::findOrFail($fee->concession);
            $count2 = Dues::where('student_id', $student_id)->select('5 AS five', '4 as four', '6 as six', '7 as seven', '8 as eight', '9 as nine', '10 as ten', '11 as eleven', '12 as twelve', '1 as one', '2 as two', '3 as three', 'concession AS concession', 'total as total')->first();

            $total = $count2->one + $count2->two  + $count2->three  + $count2->four  + $count2->five  + $count2->six  + $count2->seven  + $count2->eight  + $count2->nine  + $count2->ten  + $count2->eleven  + $count2->twelve;
        }

        return view('admin.fee.manage', compact(['student', 'fee',  'concession', 'fee_concession', 'reciepts', 'total']));
    }

    public function updateConcession()
    {

        $id = $_GET['id'];
        $con_id = $_GET['con_id'];

        $fee = Fee::where('student_id', $id)->first();

        if ($con_id == "") {
            $fee->update([
                'concession' => null,
            ]);
        } else {

            $student = Students::findOrFail($id);


            $monthly = $student->grade->fee;
            if ($student->convinience_req == 1) {
                $transport = $student->stationName->fee;
            } else {
                $transport = 0;
            }

            $sationary = $student->grade->stationary_fee;

            $examination = $student->grade->stationary;
            $computer = $student->grade->computer_fee;
            $id_card = $student->grade->sports;
            $admission = $student->adm_type == 0 ? $student->grade->admission : 0;
            $annual = $student->grade->annual;
            $prospectus = $student->adm_type == 0 ? $student->grade->prospectus : 0;
            $application = $student->grade->application;


            $count = Dues::where('student_id', $id)->select('5 AS five', '4 as four', '6 as six', '7 as seven', '8 as eight', '9 as nine', '10 as ten', '11 as eleven', '12 as twelve', '1 as one', '2 as two', '3 as three', 'concession AS concession', 'total as total')->first();

            $fee_concession = Concession::findOrFail($con_id);

            $onMonthlyFee = $fee_concession->monthly;
            $onComputerFee = $fee_concession->computer;
            $onTransportFee = $fee_concession->transport;
            $onIdFee = $fee_concession->id_card;
            $onExaminationFee = $fee_concession->examination;
            $onStationaryFee = $fee_concession->stationary;
            $onAnnualFee = $fee_concession->annual;
            $onAdmissionFee = $fee_concession->admission;
            $onProspectusFee = $fee_concession->prospectus;
            $onApplicationFee = $fee_concession->application;


            $totalMonthly =
                ($monthly - ($monthly * ($onMonthlyFee / 100))) +
                ($transport - ($transport * ($onTransportFee / 100))) +
                ($computer - ($computer * ($onComputerFee / 100))) +
                ($sationary - ($sationary * ($onStationaryFee / 100)));



            $april =
                ($monthly - ($monthly * ($onMonthlyFee / 100))) +
                ($transport - ($transport * ($onTransportFee / 100))) +
                ($computer - ($computer * ($onComputerFee / 100))) +
                ($sationary - ($sationary * ($onStationaryFee / 100))) +
                ($admission - ($admission * ($onAdmissionFee / 100))) +
                ($annual - ($annual * ($onAnnualFee / 100))) +
                ($application - ($application * ($onApplicationFee / 100))) +
                ($prospectus - ($prospectus * ($onProspectusFee / 100)));





            $july =
                ($monthly - ($monthly * ($onMonthlyFee / 100))) +
                ($transport - ($transport * ($onTransportFee / 100))) +
                ($computer - ($computer * ($onComputerFee / 100))) +
                ($sationary - ($sationary * ($onStationaryFee / 100))) +
                ($id_card - ($id_card * ($onIdFee / 100)));


            $oct =
                ($monthly - ($monthly * ($onMonthlyFee / 100))) +
                ($transport - ($transport * ($onTransportFee / 100))) +
                ($computer - ($computer * ($onComputerFee / 100))) +
                ($sationary - ($sationary * ($onStationaryFee / 100))) +
                ($examination - ($examination * ($onExaminationFee / 100)));



            if ($count->one > 0) {
                $redoing = $totalMonthly;
                DB::update('update dues set `1` = ' . $redoing . ' where student_id = ?', [$id]);
            }

            if ($count->two > 0) {
                $redoing = $totalMonthly;

                DB::update('update dues set `2` = ' . $redoing . ' where student_id = ?', [$id]);
            }
            if ($count->three > 0) {
                $redoing =  $totalMonthly;

                DB::update('update dues set `3` = ' . $redoing . ' where student_id = ?', [$id]);
            }
            if ($count->four > 0) {
                $redoing = $april;

                DB::update('update dues set `4` = ' . $redoing . ' where student_id = ?', [$id]);
            }
            if ($count->five > 0) {
                $redoing = $totalMonthly;

                DB::update('update dues set `5` = ' . $redoing . ' where student_id = ?', [$id]);
            }
            if ($count->six > 0) {
                $redoing = $totalMonthly;

                DB::update('update dues set `6` = ' . $redoing . ' where student_id = ?', [$id]);
            }
            if ($count->seven > 0) {
                $redoing = $july;

                DB::update('update dues set `7` = ' . $redoing . ' where student_id = ?', [$id]);
            }
            if ($count->eight > 0) {
                $redoing = $totalMonthly;

                DB::update('update dues set `8` = ' . $redoing . ' where student_id = ?', [$id]);
            }
            if ($count->nine > 0) {
                $redoing =  $totalMonthly;

                DB::update('update dues set `9` = ' . $redoing . ' where student_id = ?', [$id]);
            }
            if ($count->ten > 0) {
                $redoing = $oct;

                DB::update('update dues set `10` = ' . $redoing . ' where student_id = ?', [$id]);
            }
            if ($count->eleven > 0) {
                $redoing = $totalMonthly;

                DB::update('update dues set `11` = ' . $redoing . ' where student_id = ?', [$id]);
            }
            if ($count->twelve > 0) {
                $redoing = $totalMonthly;

                DB::update('update dues set `12` = ' . $redoing . ' where student_id = ?', [$id]);
            }

            $totalInConcession = ($totalMonthly * 9) + $april + $july + $oct;


            DB::update('update dues set concession = ' . $totalInConcession . ' where student_id = ?', [$id]);
            $count2 = Dues::where('student_id', $id)->select('5 AS five', '4 as four', '6 as six', '7 as seven', '8 as eight', '9 as nine', '10 as ten', '11 as eleven', '12 as twelve', '1 as one', '2 as two', '3 as three', 'concession AS concession', 'total as total')->first();


            $newTotal = $count2->one + $count2->two  + $count2->three  + $count2->four  + $count2->five  + $count2->six  + $count2->seven  + $count2->eight  + $count2->nine  + $count2->ten  + $count2->eleven  + $count2->twelve;

            DB::update('update dues set total = ' . $newTotal . ' where student_id = ?', [$id]);


            $fee->update([
                'concession' => $con_id,
            ]);
        }


        session()->flash('updated', 'success');

        $sectionData['data'] = 0;
        echo json_encode($sectionData);
        exit;
    }

    public function exempt()
    {
        $name = $_GET['name'];
        $id = $_GET['id'];

        Fee::findOrFail($id)->update([
            $name => 1,
        ]);

        session()->flash('updated', 'success');
        return redirect()->back();
    }
}
