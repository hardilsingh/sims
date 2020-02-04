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
use Illuminate\Http\Request;

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

        Fee::findOrFail($id)->update($request->except('particulars', 'fee', 'paid', 'student_id', 'myTable_length', 'late', 'mode', 'refrence'));

        $particulars = explode(",", $request->particulars);
        $fee = explode(",", $request->fee);
        $paid = $request->paid;
        $student_id = $request->student_id;

        $student = Students::findOrFail($student_id);


        $reciepts = Reciept::orderBy('created_at', 'DESC')->where("student_id", $student_id)->first();
        if ($reciepts == null) {
            $count = 0;
        } else {
            $count = $reciepts->count();
        }


        if ($count == 0) {
            $monthly = $student->grade->fee * 12;
            if ($student->convinience_req == 1) {
                $transport = $student->stationName->fee * 12;
            } else {
                $transport = 0;
            }

            $sationary = $student->grade->stationary_fee;

            $examination = $student->grade->stationary;
            $computer = $student->grade->computer_fee * 12;
            $id_card = $student->grade->sports;
            $admission = $student->grade->admission;
            $annual = $student->grade->annaul;

            $total = $monthly + $transport + $sationary + $examination + $computer + $id_card + $admission + $annual;

            $reciept = Reciept::create([
                'student_id' => $student_id,
                'paid' => $paid,
                'outstanding' => $total - $paid,
                'particulars' => serialize($particulars),
                'fee' => serialize($fee),
                'date' => now()->toDateString(),
                'mode' => $request->mode,
                'refrence' => $request->refrence,
            ]);
            $recipet_id = $reciept->id;
        } else {
            $reciept = Reciept::create([
                'student_id' => $student_id,
                'paid' => $paid,
                'outstanding' => $reciepts->outstanding - $paid,
                'particulars' => serialize($particulars),
                'fee' => serialize($fee),
                'date' => now()->toDateString(),
                'mode' => $request->mode,
                'refrence' => $request->refrence,
            ]);
            $recipet_id = $reciept->id;
        }
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


        $monthly = $student->grade->fee * 12;
        if ($student->convinience_req == 1) {
            $transport = $student->stationName->fee * 12;
        } else {
            $transport = 0;
        }

        $sationary = $student->grade->stationary_fee;

        $examination = $student->grade->stationary;
        $computer = $student->grade->computer_fee * 12;
        $id_card = $student->grade->sports;
        $admission = $student->grade->admission;
        $annual = $student->grade->annaul;


        if ($fee->concession == null) {
            $fee_concession = null;
            $total = $monthly + $transport + $sationary + $examination + $computer + $id_card + $admission + $annual;
            return view('admin.fee.manage', compact(['student', 'fee',  'concession', 'fee_concession', 'reciepts', 'total']));
        } else {
            $fee_concession = Concession::findOrFail($fee->concession);

            $monthly_fee = $fee_concession->monthly;
            $transport_fee = $fee_concession->transport;
            $computer_fee = $fee_concession->computer;
            $examination_fee = $fee_concession->examination;
            $activity_fee = $fee_concession->stationary;

            $total = (($monthly_fee == 0 ? 100 : $monthly_fee / 100) * $monthly) + (($transport_fee == 0 ? 100 : $transport_fee / 100) * $transport) + (($computer_fee == 0 ? 100 : $computer_fee / 100) * $computer) + (($activity_fee == 0 ? 100 : $activity_fee / 100) * $sationary) + (($examination_fee == 0 ? 100 : $examination_fee / 100) * $examination);







            return view('admin.fee.manage', compact(['student', 'fee',  'concession', 'fee_concession', 'reciepts', 'total']));
        }
    }

    public function updateConcession()
    {

        $id = $_GET['id'];
        $con_id = $_GET['con_id'];
        $fee = Fee::where('student_id', $id);
        $fee->update([
            'concession' => $con_id,
        ]);
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
