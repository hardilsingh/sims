<?php

namespace App\Exports;

use App\Reciept;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Students;
use Illuminate\Support\Facades\DB;

class Transaction implements FromView
{
    public function view(): View

    
    
    {

        $date1 = $_GET['from'];
        $date2 = $_GET['to'];
        $reciepts = Reciept::whereBetween('date', [$date1, $date2])->get();
        $sum = Reciept::sum('paid');

        return view("admin.transactions.print" , compact("reciepts" , 'sum'));
    }
}
