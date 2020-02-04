<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Fee;

class DuesExport implements FromView
{
    public function view(): View
    {

        $id = $_GET['id'];

        if ($id = 1) {
            $students = Fee::where('jmf', 0)->orWhere('jtf', 0)->get();
        } elseif ($id = 2) {
            $students = Fee::where('fmf', 0)->orWhere('ftf', 0)->get();
        } elseif ($id = 3) {
            $students = Fee::where('mmf', 0)->orWhere('mtf', 0)->get();
        } elseif ($id = 4) {
            $students = Fee::where('amf', 0)->orWhere('atf', 0)->orWhere('acf', 0)->orWhere('aexamination_fee', 0)->orWhere('asf', 0)->get();
        } elseif ($id = 5) {
            $students = Fee::where('maymf', 0)->orWhere('maytf', 0)->get();
        } elseif ($id = 6) {
            $students = Fee::where('junemf', 0)->orWhere('junetf', 0)->get();
        } elseif ($id = 7) {
            $students = Fee::where('julymf', 0)->orWhere('julytf', 0)->get();
        } elseif ($id = 8) {
            $students = Fee::where('augmf', 0)->orWhere('augtf', 0)->get();
        } elseif ($id = 9) {
            $students = Fee::where('septmf', 0)->orWhere('septtf', 0)->get();
        } elseif ($id = 10) {
            $students = Fee::where('octmf', 0)->orWhere('octtf', 0)->orWhere('octcf', 0)->orWhere('octexamination_fee', 0)->orWhere('octsf', 0)->get();
        } elseif ($id = 11) {
            $students = Fee::where('novmf', 0)->orWhere('novtf', 0)->get();
        } elseif ($id = 12) {
            $students = Fee::where('decmf', 0)->orWhere('dectf', 0)->get();
        }

        return view('admin.exports.dues', compact('students'));
    }
}
