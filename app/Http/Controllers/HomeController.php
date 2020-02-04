<?php

namespace App\Http\Controllers;

use App\Caste;
use App\Grade;
use App\Reciept;
use App\Religion;
use App\Students;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $students = Students::count();
        $male = Students::where("gender" , 0)->count();
        $female = Students::where("gender" , 1)->count();

        $religions = Religion::all();
        $classes = Grade::all();
        $castes = Caste::all();
        $students_dis = Students::all();
        $students_latest = Students::orderBy('created_at' , 'DESC')->paginate(5);
        $collection = Reciept::where('date' , now()->toDateString())->sum('paid');

        return view('home' , compact(['male' , 'female' , 'students' , 'religions' , 'classes' , 'castes' , 'students_dis' , 'students_latest' , 'collection']));
    }
}
