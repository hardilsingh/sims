<?php

namespace App\Http\Controllers;

use App\Caste;
use App\Concession;
use App\Dues as AppDues;
use App\ExplicitCon;
use App\Father;
use App\Fee;
use App\Grade;
use App\Http\Requests\StudentCreateRequest;
use App\Mother;
use App\Religion;
use App\Section;
use App\Station;
use App\Stream;
use App\Students;
use Dues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
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
        $students_latest = Students::orderBy('admission_date', 'DESC')->paginate(3);

        return view('admin.students.index', compact(['classes', 'students_latest']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $classes = Grade::pluck("class", "id");
        $stations = Station::all();
        $other = ExplicitCon::pluck('name', 'id');
        $streams = Stream::pluck('name', 'id');
        $roll_number = Students::orderBy('id', 'DESC')->first();
        $students_latest = Students::orderBy('created_at', 'DESC')->paginate(10);




        if ($roll_number == null) {
            $new_roll = 1;
        } else {
            $new_roll = $roll_number->roll_number + 1;
        }

        $adm_number = Students::orderBy('id', 'DESC')->first();

        if ($adm_number == null) {
            $new_adm = 1;
        } else {
            $new_adm = $adm_number->adm_no + 1;
        }

        $castes = Caste::pluck('name', 'id');
        $religions = Religion::pluck('name', 'id');
        return view("admin.students.create", compact(['classes', 'stations', 'streams', 'new_roll', 'new_adm', 'religions', 'castes', 'other', 'students_latest']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentCreateRequest $request)
    {
        //

        $input = $request->all();

        $adm = Students::where("adm_no", $input['adm_no'])->count();




        if ($adm == 0) {
            $student = Students::create([
                'name' => $input['name'],
                'admission_date' => $input['date_of_adm'],
                'session' => $input['session'],
                'previous_ad_number' => 0,
                'class' => $input['grade_id'],
                'section' => $request->section_id,
                'stream' => $input['stream_id'],
                'roll_number' => $input['roll_number'],
                'adm_no' => $input['adm_no'],
                'gender' => $input['gender'],
                'DOB_certificate' => $request->dob_cer == null ? 0 : $request->dob_cer,
                'slc' => $request->slc == null ? 0 : $request->slc,
                'report_card' => $request->rc == null ? 0 : $request->rc,
                'aadhar_card' => $request->ac == null ? 0 : $request->ac,
                'tc' => $request->tc == null ? 0 : $request->tc,
                'document_verified' => $input['verified'],
                'father' => $input['father_name'] !== null ? $input['father_name'] : 'Not Given',
                'mother' => $input['mother_name'] !== null ? $input['mother_name'] : 'Not Given',
                'DOB' => $input['DOB'] !== null ? $input['DOB'] : now()->toDateString(),
                'tel1' => $input['tel1'] !== null ? $input['tel1'] : 0,
                'tel2' => $input['tel2'] !== null ? $input['tel2'] : 0,
                'vill' => $input['vill'] !== null ? $input['vill'] : null,
                'postoffice' => $input['postoffice'] !== null ? $input['postoffice'] : null,
                'tehsil' => $input['tehsil'] !== null ? $input['tehsil'] : null,
                'district' => $input['district'] !== null ? $input['district'] : null,
                'pincode' => $input['pincode'] !== null ? $input['pincode'] : null,
                'state' => $input['state'] !== null ? $input['state'] : null,
                'addhar_number' => $input['UID'] == null ? 0 : $input['UID'],
                'convinience_req' => $input['required'] !== null ? $input['required'] : 0,
                'station' => $input['required'] == null ? 0 : $input['station_id'],
                'cast_category' => $input['caste_id'],
                'religion' => $input['religion_id'],
                'blood_group' => $input['blood'] !== null ? $input['blood'] : 0,
                'annual_income' => $input['annual_income'] !== null ? $input['annual_income'] : 0,
                'adm_type' => $input['adm_type'] !== null ? $input['adm_type'] : 0,
                'status' => 1,
                'other_con' => $input['other_con'] == null ? 0 : $input['other_con'],
                'user_id' => Auth::user()->id
            ]);


            if ($input['required'] == null || $input['required'] == 0) {
                $val = 1;
            } else {
                $val = 0;
            }

            if ($student->class == "101" || $student->name == "102" || $student->class == "100" || $student->class == "103") {
                $val2 = 0;
            } else {
                $val2 = 1;
            }




            $fee = Fee::create([
                'student_id' => $student->id,
                'jtf' => $val,
                'ftf' => $val,
                'mtf' => $val,
                'atf' => $val,
                'maytf' => $val,
                'junetf' => $val,
                'julytf' => $val,
                'augtf' => $val,
                'septtf' => $val,
                'octtf' => $val,
                'novtf' => $val,
                'dectf' => $val,
                'jsf' => $val2,
                'fsf' => $val2,
                'msf' => $val2,
                'asf' => $val2,
                'maysf' => $val2,
                'junesf' => $val2,
                'julysf' => $val2,
                'augsf' => $val2,
                'septsf' => $val2,
                'octsf' => $val2,
                'novsf' => $val2,
                'decsf' => $val2,
            ]);


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
            $admission = $input['adm_type'] == 0  ? $student->grade->admission : 0;
            $annual = $student->grade->annual;

            $prospectus =  $input['adm_type'] == 0  ? $student->grade->prospectus : 0;
            $application = $student->grade->application;


            $gross = ($monthly * 12) + ($transport * 12) + ($sationary * 12) + $prospectus + $application + ($examination * 1) + ($computer * 12) + ($id_card * 1) + ($admission * 1) + ($annual * 1);




            $dues = AppDues::create([
                '1' => $monthly + $transport + $sationary + $computer,
                '2' => $monthly + $transport + $sationary + $computer,
                '3' => $monthly + $transport + $sationary + $computer,
                '4' => $monthly + $transport + $sationary + $computer + $admission + $annual + $prospectus + $application,
                '5' => $monthly + $transport + $sationary + $computer,
                '6' => $monthly + $transport + $sationary + $computer,
                '7' => $monthly + $transport + $sationary + $computer + $id_card,
                '8' => $monthly + $transport + $sationary + $computer,
                '9' => $monthly + $transport + $sationary + $computer,
                '10' => $monthly + $transport + $sationary + $computer + $examination,
                '11' => $monthly + $transport + $sationary + $computer,
                '12' => $monthly + $transport + $sationary + $computer,
                'total' => $gross,
                'openingBalance' => $gross,
                'student_id' => $student->id,
                'session' => $student->session,
            ]);





            $mother = Mother::create([
                'student_id' => $student->id,
                'name' => $input['mother_name'] !== null ? $input['mother_name'] : 'N/A',
                'occupation' => $input['mother_occup'] == null ? 'N/A' : $input['mother_occup'],
                'UID' => $input['mother_uid'] == null ? 0 : $input['mother_uid'],
                'qual' => $input['mother_qual'] == null ? 0 : $input['mother_qual'],
            ]);

            $father = Father::create([
                'student_id' => $student->id,
                'name' => $input['father_name'] !== null ? $input['father_name'] : 'N/A',
                'occupation' => $input['father_occup'] == null ? 'N/A' : $input['father_occup'],
                'UID' => $input['father_uid'] == null ? 0 : $input['father_uid'],
                'qual' => $input['father_qual'] == null ? 0 : $input['father_qual'],
            ]);



            if ($request->hasFile('photo')) {
                $path = public_path("/photos");
                $image = $request->file('photo');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move($path, $imageName);


                $student_update = Students::findOrFail($student->id);
                $student_update->update([
                    'path' => $imageName
                ]);
            } else {
                $student_update = Students::findOrFail($student->id);
                $student_update->update([
                    'path' => 0
                ]);
            }
        } else {
            return redirect("/students/create");
        }




        $request->session()->flash('created', "Student registered successfully");
        return redirect('/admForm?id=' . $student->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function show($id)


    {
        //

        $student = Students::findOrFail($id);
        return view('admin.students.show', compact(['student']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $student = Students::findOrFail($id);
        $classes = Grade::pluck("class", "id");
        $stations = Station::pluck('name', 'id');
        $streams = Stream::pluck('name', 'id');
        $roll_number = Students::orderBy('id', 'DESC')->get()->first();
        $adm_number = Students::orderBy('id', 'DESC')->get()->first();
        $castes = Caste::pluck('name', 'id');
        $religions = Religion::pluck('name', 'id');
        $other = ExplicitCon::pluck('name', 'id');

        return view("admin.students.edit", compact(['classes', 'stations', 'streams', 'roll_number', 'adm_number', 'religions', 'castes', 'student', 'other']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $student = Students::findOrFail($id);
        $station_old = $student->station;
        $othe_con_old = $student->other_con;
        $student->update($request->except(['photo']));
        if ($request->convinience_req == 1) {
            $student->update([
                'other_con' => 0
            ]);
        } elseif ($request->convinience == 0) {
            $student->update([
                'station' => 0
            ]);
        }
        $fee = Fee::where('student_id', $student->id)->first();

        if ($request->convinience_req == 1) {
            if ($request->station != $station_old) {
                $old_station = Station::find($station_old);
                $new_station = Station::findOrFail($request->station);

                if ($fee->concession == null) {
                    $old_station_fee = $old_station ? $old_station->fee : 0;
                    $new_station_fee = $new_station->fee;
                }

                if ($fee->concession != null) {
                    $concession = Concession::findOrFail($fee->concession);
                    $onTransportFee = $concession->transport;
                    $old_station_fee = $old_station ? ($old_station->fee - ($old_station->fee * ($onTransportFee / 100))) : 0;
                    $new_station_fee = ($new_station->fee - ($new_station->fee * ($onTransportFee / 100)));
                }
                $dues_update = AppDues::where("student_id", $student->id)->select('5 AS five', '4 AS four', '6 AS six', '7 AS seven', '8 AS eight', '9 AS nine', '10 AS ten', '11 AS eleven', '12 AS twelve', '1 AS one', '2 AS two', '3 AS three', 'id AS id', 'created_at AS created_at', 'updated_at AS updated_at', 'total AS total')->first();
                if ($dues_update->one > $new_station_fee) {
                    $fee->update([
                        'jtf'=>0
                    ]);
                    $pending = ($dues_update->one - $old_station_fee) + $new_station_fee;
                    DB::update('update dues set `1` = ' . $pending . ' where id = ?', [$dues_update->id]);
                }
                if ($dues_update->two >= $new_station_fee) {
                    $fee->update([
                        'ftf'=>0
                    ]);
                    $pending = ($dues_update->two - $old_station_fee) + $new_station_fee;
                    DB::update('update dues set `2` = ' . $pending . ' where id = ?', [$dues_update->id]);
                }
                if ($dues_update->three >= $new_station_fee) {
                    $fee->update([
                        'mtf'=>0
                    ]);
                    $pending = ($dues_update->three - $old_station_fee) + $new_station_fee;
                    DB::update('update dues set `3` = ' . $pending . ' where id = ?', [$dues_update->id]);
                }
                if ($dues_update->four >= $new_station_fee) {
                    $fee->update([
                        'atf'=>0
                    ]);
                    $pending = ($dues_update->four - $old_station_fee) + $new_station_fee;
                    DB::update('update dues set `4` = ' . $pending . ' where id = ?', [$dues_update->id]);
                }
                if ($dues_update->five >= $new_station_fee) {
                    $fee->update([
                        'maytf'=>0
                    ]);
                    $pending = ($dues_update->five - $old_station_fee) + $new_station_fee;
                    DB::update('update dues set `5` = ' . $pending . ' where id = ?', [$dues_update->id]);
                }
                if ($dues_update->six >= $new_station_fee) {
                    $fee->update([
                        'junetf'=>0
                    ]);
                    $pending = ($dues_update->six - $old_station_fee) + $new_station_fee;
                    DB::update('update dues set `6` = ' . $pending . ' where id = ?', [$dues_update->id]);
                }
                if ($dues_update->seven >= $new_station_fee) {
                    $fee->update([
                        'julytf'=>0
                    ]);
                    $pending = ($dues_update->seven - $old_station_fee) + $new_station_fee;
                    DB::update('update dues set `7` = ' . $pending . ' where id = ?', [$dues_update->id]);
                }
                if ($dues_update->eight >= $new_station_fee) {
                    $fee->update([
                        'augtf'=>0
                    ]);
                    $pending = ($dues_update->eight - $old_station_fee) + $new_station_fee;
                    DB::update('update dues set `8` = ' . $pending . ' where id = ?', [$dues_update->id]);
                }
                if ($dues_update->nine >= $new_station_fee) {
                    $fee->update([
                        'septtf'=>0
                    ]);
                    $pending = ($dues_update->nine - $old_station_fee) + $new_station_fee;
                    DB::update('update dues set `9` = ' . $pending . ' where id = ?', [$dues_update->id]);
                }
                if ($dues_update->ten >= $new_station_fee) {
                    $fee->update([
                        'octtf'=>0
                    ]);
                    $pending = ($dues_update->ten - $old_station_fee) + $new_station_fee;
                    DB::update('update dues set `10` = ' . $pending . ' where id = ?', [$dues_update->id]);
                }
                if ($dues_update->eleven >= $new_station_fee) {
                    $fee->update([
                        'novtf'=>0
                    ]);
                    $pending = ($dues_update->eleven - $old_station_fee) + $new_station_fee;
                    DB::update('update dues set `11` = ' . $pending . ' where id = ?', [$dues_update->id]);
                }
                if ($dues_update->twelve >= $new_station_fee) {
                    $fee->update([
                        'dectf'=>0
                    ]);
                    $pending = ($dues_update->twelve - $old_station_fee) + $new_station_fee;
                    DB::update('update dues set `12` = ' . $pending . ' where id = ?', [$dues_update->id]);
                }

                $count2 = AppDues::where('student_id', $id)->select('5 AS five', '4 as four', '6 as six', '7 as seven', '8 as eight', '9 as nine', '10 as ten', '11 as eleven', '12 as twelve', '1 as one', '2 as two', '3 as three', 'concession AS concession', 'total as total')->first();


                $newTotal = $count2->one + $count2->two  + $count2->three  + $count2->four  + $count2->five  + $count2->six  + $count2->seven  + $count2->eight  + $count2->nine  + $count2->ten  + $count2->eleven  + $count2->twelve;

                DB::update('update dues set total = ' . $newTotal . ' where student_id = ?', [$id]);
            }
        }
        if ($request->convinience_req == 0) {
            if ($request->other_con != $othe_con_old) {
                $old_station = Station::findOrFail($station_old);


                if ($fee->concession == null) {
                    $old_station_fee = $old_station ? $old_station->fee : 0;
                }

                if ($fee->concession != null) {
                    $concession = Concession::findOrFail($fee->concession);
                    $onTransportFee = $concession->transport;
                    $old_station_fee = $old_station ? ($old_station->fee - ($old_station->fee * ($onTransportFee / 100))) : 0;
                }
                $dues_update = AppDues::where("student_id", $student->id)->select('5 AS five', '4 AS four', '6 AS six', '7 AS seven', '8 AS eight', '9 AS nine', '10 AS ten', '11 AS eleven', '12 AS twelve', '1 AS one', '2 AS two', '3 AS three', 'id AS id', 'created_at AS created_at', 'updated_at AS updated_at', 'total AS total')->first();
                if ($dues_update->one >= $old_station_fee) {
                    $fee->update([
                        'jtf'=>1
                    ]);
                    $pending = ($dues_update->one - $old_station_fee);
                    DB::update('update dues set `1` = ' . $pending . ' where id = ?', [$dues_update->id]);
                }
                if ($dues_update->two >= $old_station_fee) {
                    $fee->update([
                        'ftf'=>1
                    ]);
                    $pending = ($dues_update->two - $old_station_fee);
                    DB::update('update dues set `2` = ' . $pending . ' where id = ?', [$dues_update->id]);
                }
                if ($dues_update->three >= $old_station_fee) {
                    $fee->update([
                        'mtf'=>1
                    ]);
                    $pending = ($dues_update->three - $old_station_fee);
                    DB::update('update dues set `3` = ' . $pending . ' where id = ?', [$dues_update->id]);
                }
                if ($dues_update->four >= $old_station_fee) {
                    $fee->update([
                        'atf'=>1
                    ]);
                    $pending = ($dues_update->four - $old_station_fee);
                    DB::update('update dues set `4` = ' . $pending . ' where id = ?', [$dues_update->id]);
                }
                if ($dues_update->five >= $old_station_fee) {
                    $fee->update([
                        'maytf'=>1
                    ]);
                    $pending = ($dues_update->five - $old_station_fee);
                    DB::update('update dues set `5` = ' . $pending . ' where id = ?', [$dues_update->id]);
                }
                if ($dues_update->six >= $old_station_fee) {
                    $fee->update([
                        'junetf'=>1
                    ]);
                    $pending = ($dues_update->six - $old_station_fee);
                    DB::update('update dues set `6` = ' . $pending . ' where id = ?', [$dues_update->id]);
                }
                if ($dues_update->seven >= $old_station_fee) {
                    $fee->update([
                        'julytf'=>1
                    ]);
                    $pending = ($dues_update->seven - $old_station_fee);
                    DB::update('update dues set `7` = ' . $pending . ' where id = ?', [$dues_update->id]);
                }
                if ($dues_update->eight >= $old_station_fee) {
                    $fee->update([
                        'augtf'=>1
                    ]);
                    $pending = ($dues_update->eight - $old_station_fee);
                    DB::update('update dues set `8` = ' . $pending . ' where id = ?', [$dues_update->id]);
                }
                if ($dues_update->nine >= $old_station_fee) {
                    $fee->update([
                        'septtf'=>1
                    ]);
                    $pending = ($dues_update->nine - $old_station_fee);
                    DB::update('update dues set `9` = ' . $pending . ' where id = ?', [$dues_update->id]);
                }
                if ($dues_update->ten >= $old_station_fee) {
                    $fee->update([
                        'octtf'=>1
                    ]);
                    $pending = ($dues_update->ten - $old_station_fee);
                    DB::update('update dues set `10` = ' . $pending . ' where id = ?', [$dues_update->id]);
                }
                if ($dues_update->eleven >= $old_station_fee) {
                    $fee->update([
                        'novtf'=>1
                    ]);
                    $pending = ($dues_update->eleven - $old_station_fee);
                    DB::update('update dues set `11` = ' . $pending . ' where id = ?', [$dues_update->id]);
                }
                if ($dues_update->twelve >= $old_station_fee) {
                    $fee->update([
                        'dectf'=>1
                    ]);
                    $pending = ($dues_update->twelve - $old_station_fee);
                    DB::update('update dues set `12` = ' . $pending . ' where id = ?', [$dues_update->id]);
                }

                $count2 = AppDues::where('student_id', $id)->select('5 AS five', '4 as four', '6 as six', '7 as seven', '8 as eight', '9 as nine', '10 as ten', '11 as eleven', '12 as twelve', '1 as one', '2 as two', '3 as three', 'concession AS concession', 'total as total')->first();


                $newTotal = $count2->one + $count2->two  + $count2->three  + $count2->four  + $count2->five  + $count2->six  + $count2->seven  + $count2->eight  + $count2->nine  + $count2->ten  + $count2->eleven  + $count2->twelve;

                DB::update('update dues set total = ' . $newTotal . ' where student_id = ?', [$id]);
            }
        }

        if ($request->hasFile('photo')) {
            $path = public_path("/photos");
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move($path, $imageName);


            $student_update = Students::findOrFail($student->id);
            $student_update->update([
                'path' => $imageName
            ]);
        }
        $request->session()->flash('updated', "Student updated successfully");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        Students::findOrFail($id)->delete();
        session()->flash('deleted', "Deleted Successfully");
        return redirect()->back();
    }

    public function getStudents()
    {
        // Fetch Sections by Classid


        if (isset($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
            $sectionData['data'] = Students::orderBy('name')->where('name', 'like', '%' . $keyword . '%')->orWhere('tel1', $keyword)->orWhere('tel2', $keyword)->orWhere('adm_no', $keyword)->get();
        } else {
            $class = $_GET['grade'];
            $section = $_GET['section'];
            $sectionData['data'] = Students::orderBy('name')->where('class', $class)->where('section', $section)->get();
        }


        echo json_encode($sectionData);
        exit;
    }

    public function report()
    {

        $report = $_GET['by'];


        $students = Students::count();
        $male = Students::where("gender", 0)->count();
        $female = Students::where("gender", 1)->count();

        $religions = Religion::all();
        $classes = Grade::all();
        $castes = Caste::all();
        $students_dis = Students::all();
        $students_latest = Students::orderBy('admission_date', 'DESC')->paginate(5);

        return view('admin.reports.index', compact(['male', 'female', 'students', 'religions', 'classes', 'castes', 'students_dis', 'students_latest', 'report']));
    }


    public function newsession()
    {
        $students = Students::where('adm_type', 1)->get();

        foreach ($students as $student) {
            if ($student->class !== 12) {


                if ($student->class == 103) {
                    $student->update([
                        'class' => 1,
                    ]);
                } else {
                    $student->update([
                        'class' => $student->class + 1,
                    ]);
                }



                if ($student->convinience_req == null || $student->convinience_req == 0) {
                    $val = 1;
                } else {
                    $val = 0;
                }

                if ($student->class == "101" || $student->name == "102" || $student->class == "100" || $student->class == "103") {
                    $val2 = 0;
                } else {
                    $val2 = 1;
                }

                $fee = Fee::where('student_id', $student->id);
                $fee->update([
                    'student_id' => $student->id,
                    'jtf' => $val,
                    'ftf' => $val,
                    'mtf' => $val,
                    'atf' => $val,
                    'maytf' => $val,
                    'junetf' => $val,
                    'julytf' => $val,
                    'augtf' => $val,
                    'septtf' => $val,
                    'octtf' => $val,
                    'novtf' => $val,
                    'dectf' => $val,
                    'jsf' => $val2,
                    'fsf' => $val2,
                    'msf' => $val2,
                    'asf' => $val2,
                    'maysf' => $val2,
                    'junesf' => $val2,
                    'julysf' => $val2,
                    'augsf' => $val2,
                    'septsf' => $val2,
                    'octsf' => $val2,
                    'novsf' => $val2,
                    'decsf' => $val2,
                ]);


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
                $annual = $student->grade->annual;
                $admission = $student->adm_type == 0 ? $student->grade->admission : 0;
                $prospectus = $student->adm_type == 0 ? $student->grade->prospectus : 0;
                $application = $student->grade->application;

                $total = $monthly + $transport + $sationary + $examination + $computer + $id_card + $annual;

                $gross = ($monthly * 12) + ($transport * 12) + ($sationary * 12) + ($examination * 1) + ($computer * 12) + ($id_card * 1) + ($annual * 1);


                $dues = AppDues::create([
                    '1' => $monthly + $transport + $sationary + $computer,
                    '2' => $monthly + $transport + $sationary + $computer,
                    '3' => $monthly + $transport + $sationary + $computer,
                    '4' => $monthly + $transport + $sationary + $computer + $annual,
                    '5' => $monthly + $transport + $sationary + $computer,
                    '6' => $monthly + $transport + $sationary + $computer,
                    '7' => $monthly + $transport + $sationary + $computer + $id_card,
                    '8' => $monthly + $transport + $sationary + $computer,
                    '9' => $monthly + $transport + $sationary + $computer,
                    '10' => $monthly + $transport + $sationary + $computer + $examination,
                    '11' => $monthly + $transport + $sationary + $computer,
                    '12' => $monthly + $transport + $sationary + $computer,
                    'total' => $gross,
                    'student_id' => $student->id,
                    'session' => $student->session,
                ]);
            } elseif ($student->class == 12) {
                $student->update([
                    'status' => 0,
                ]);
            }
        }



        return redirect("/home?session=yes");
    }
}
