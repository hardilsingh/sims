<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Students;
use Illuminate\Http\Request;
use Excel;
use App\Caste;
use App\Religion;
use Illuminate\Support\Facades\DB;
use App\Exports\DuesExport;
use Illuminate\Support\Carbon;
use App\Father;
use App\Mother;


use App\Exports\StudentsExport;
use App\Exports\Transaction;

class PrintController extends Controller
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
        $castes = Caste::pluck('name', 'id');
        $religions = Religion::pluck('name', 'id');
        return view('admin.prints.index', compact(['classes', 'castes', 'religions']));
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
     * @param  \App\StudentsController  $studentsController
     * @return \Illuminate\Http\Response
     */
    public function show(StudentsController $studentsController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentsController  $studentsController
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentsController $studentsController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentsController  $studentsController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentsController $studentsController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentsController  $studentsController
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentsController $studentsController)
    {
        //
    }

    public function prints()
    {
        if (isset($_GET['classId'])) {
            $section = $_GET['sectionId'];
            $class = $_GET['classId'];
            $gender = $_GET['gender'];
            $caste = $_GET['caste'];
            $religion = $_GET['religion'];
            $con = $_GET['con'];



            $query = DB::table('students');

            if ($class !== "") {
                $query->where('class', $class);
            } else {
                $query->select('*');
            }

            if ($section !== "ALL") {
                $query->where('section', $section);
            }

            if ($gender !== "") {
                $query->where('gender', $gender);
            }

            if ($con !== "") {
                $query->where('convinience_req', $con);
            }


            if ($caste !== "") {
                $query->where('cast_category', $caste);
            }

            if ($religion !== "") {
                $query->where('religion', $religion);
            }


            $results = $query->orderBy('name')->get();

            return view('admin.prints.print', compact(['results', 'section', 'class', 'gender', 'caste', 'religion']));
        }
    }


    public function export()
    {
        return Excel::download(new StudentsExport, 'student.xlsx');
    }

    public function exportDues()
    {
        return Excel::download(new DuesExport, 'dues.xlsx');
    }

    public function application()
    {
        $student = Students::findOrFail($_GET['id']);
        $age = Carbon::parse($student->dob)->diff(Carbon::now())
            ->format('%y years, %mmonths and %d days');
        $father = Father::where("student_id", $_GET['id'])->first();
        $mother = Mother::where("student_id", $_GET['id'])->first();
        return view("admin.forms.adm", compact(["student", "age", 'father', 'mother']));
    }

    public function transaction()
    {
        return Excel::download(new Transaction, 'transaction'.now()->toDateString().'.xlsx');
    }
}
