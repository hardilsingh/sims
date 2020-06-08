<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Students;
use Illuminate\Support\Facades\DB;

class StudentsExport implements FromView
{
    public function view(): View
    {

        if (isset($_GET['classId'])) {
            $section = $_GET['sectionId'];
            $class = $_GET['classId'];
            $gender = $_GET['gender'];
            $caste = $_GET['caste'];
            $religion = $_GET['religion'];
			$adm_type = $_GET['adm_type'];

            $query = DB::table('students')->where('status' , '1');

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

            if ($caste !== "") {
                $query->where('cast_category', $caste);
            }

            if ($religion !== "") {
                $query->where('religion', $religion);
            }
			
			if ($adm_type !== "") {
                $query->where('adm_type', $adm_type);
            }


            $results = $query->orderBy('class' , 'ASC')->orderBy('section' , 'ASC')->orderBy('adm_no' , 'ASC')->get();


            return view('admin.exports.classWise', compact('results'));
        }
    }
}
