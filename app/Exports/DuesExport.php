<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Fee;

use App\Dues as AppDues;

class DuesExport implements FromView
{
    public function view(): View
    {

        if (isset($_GET['month'])) {
            $month = $_GET['month'];
        }


        if ($month == 1) {
            $students = AppDues::where(4, ">", 0)->orWhere(5, ">", 0)->orWhere(6, ">", 0)->orWhere(7, ">", 0)->orWhere(8, ">", 0)->orWhere(9, ">", 0)->orWhere(10, ">", 0)->orWhere(11, ">", 0)->orWhere(12, ">", 0)->orWhere(1, ">", 0)->get();
        } elseif ($month == 2) {
            $students =  AppDues::where(4, ">", 0)->orWhere(5, ">", 0)->orWhere(6, ">", 0)->orWhere(7, ">", 0)->orWhere(8, ">", 0)->orWhere(9, ">", 0)->orWhere(10, ">", 0)->orWhere(11, ">", 0)->orWhere(12, ">", 0)->orWhere(1, ">", 0)->orWhere(2, ">", 0)->get();
        } elseif ($month == 3) {
            $students =  AppDues::where(4, ">", 0)->orWhere(5, ">", 0)->orWhere(6, ">", 0)->orWhere(7, ">", 0)->orWhere(8, ">", 0)->orWhere(9, ">", 0)->orWhere(10, ">", 0)->orWhere(11, ">", 0)->orWhere(12, ">", 0)->orWhere(1, ">", 0)->orWhere(2, ">", 0)->orWhere('3', ">", 0)->get();
        } elseif ($month == 4) {
            $students = AppDues::where(4, ">", 0)->get();
        } elseif ($month == 5) {
            $students = AppDues::where(4, ">", 0)->orWhere(5, ">", 0)->get();
        } elseif ($month == 6) {
            $students = AppDues::where(4, ">", 0)->orWhere(5, ">", 0)->orWhere(6, ">", 0)->get();
        } elseif ($month == 7) {
            $students = AppDues::where(4, ">", 0)->orWhere(5, ">", 0)->orWhere(6, ">", 0)->orWhere(7, ">", 0)->get();
        } elseif ($month == 8) {
            $students = AppDues::where(4, ">", 0)->orWhere(5, ">", 0)->orWhere(6, ">", 0)->orWhere(7, ">", 0)->orWhere(8, ">", 0)->get();
        } elseif ($month == 9) {
            $students = AppDues::where(4, ">", 0)->orWhere(5, ">", 0)->orWhere(6, ">", 0)->orWhere(7, ">", 0)->orWhere(8, ">", 0)->orWhere(9, ">", 0)->get();
        } elseif ($month == 10) {
            $students =  AppDues::where(4, ">", 0)->orWhere(5, ">", 0)->orWhere(6, ">", 0)->orWhere(7, ">", 0)->orWhere(8, ">", 0)->orWhere(9, ">", 0)->orWhere(10, ">", 0)->get();
        } elseif ($month == 11) {
            $students = AppDues::where(4, ">", 0)->orWhere(5, ">", 0)->orWhere(6, ">", 0)->orWhere(7, ">", 0)->orWhere(8, ">", 0)->orWhere(9, ">", 0)->orWhere(10, ">", 0)->orWhere(11, ">", 0)->get();
        } elseif ($month == 12) {
            $students = AppDues::where(4, ">", 0)->orWhere(5, ">", 0)->orWhere(6, ">", 0)->orWhere(7, ">", 0)->orWhere(8, ">", 0)->orWhere(9, ">", 0)->orWhere(10, ">", 0)->orWhere(11, ">", 0)->orWhere(12, ">", 0)->get();
        }
        return view('admin.exports.dues', compact('students', 'month'));
    }
}
