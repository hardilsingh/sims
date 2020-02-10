<?php

namespace App\Http\Controllers;

use App\Students;
use Illuminate\Http\Request;
use App\Tc;

class TcController extends Controller
{
    //

    public function index()
    {   
        $tcs = Tc::orderBy('created_at' , 'DESC')->get();
        return view("admin.transfer-certificates.index" , compact(['tcs']));
    }



    public function create()
    {
        $student = Students::findOrFail($_GET['id']);
        return view('admin.transfer-certificates.create' , compact(['student']));
    }


    public function store(Request $request)
    {

        $tc = Tc::create($request->except(['subjects']));

        $tc->update([
            'subjects'=>serialize($request->subjects),
        ]);
        $request->session()->flash('created', 'Created Successfully');
        return redirect("/transfer-certificates/".$tc->id);

    }


    public function show($id) {
        $tc = Tc::find($id);
        $subjects = unserialize($tc->subjects);
        return view("admin.transfer-certificates.show" , compact(['tc' , 'subjects']));
    }
}
