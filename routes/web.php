<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Students;
use App\Father;
use App\Fee;
use App\Mother;
use App\Reciept;
use App\User;
use Illuminate\Support\Carbon;

use App\Dues as AppDues;

Route::get('/', function () {
    // for ($i = 334; $i <= 1598; $i++) {

    //     $student = Students::findOrFail($i);
    //     $monthly = $student->grade->fee;
    //         if ($student->convinience_req == 1) {
    //             $transport = $student->stationName->fee;
    //         } else {
    //             $transport = 0;
    //         }

    //         $sationary = $student->grade->stationary_fee;

    //         $examination = $student->grade->stationary;
    //         $computer = $student->grade->computer_fee;
    //         $id_card = $student->grade->sports;
    //         $admission = $student->grade->admission;
    //         $annual = $student->grade->annual;

    //         $total = $monthly + $transport + $sationary + $examination + $computer + $id_card + $admission + $annual;

    //         $gross = ($monthly * 12) + ($transport * 12) + ($sationary * 12) + ($examination * 1) + ($computer * 12) + ($id_card * 1) + ($admission * 1) + ($annual * 1);




    //         $dues = AppDues::create([
    //             '1' => $monthly + $transport + $sationary + $computer,
    //             '2' => $monthly + $transport + $sationary + $computer,
    //             '3' => $monthly + $transport + $sationary + $computer,
    //             '4' => $monthly + $transport + $sationary + $computer + $admission + $annual,
    //             '5' => $monthly + $transport + $sationary + $computer,
    //             '6' => $monthly + $transport + $sationary + $computer,
    //             '7' => $monthly + $transport + $sationary + $computer + $id_card,
    //             '8' => $monthly + $transport + $sationary + $computer,
    //             '9' => $monthly + $transport + $sationary + $computer,
    //             '10' => $monthly + $transport + $sationary + $computer + $examination,
    //             '11' => $monthly + $transport + $sationary + $computer,
    //             '12' => $monthly + $transport + $sationary + $computer,
    //             'total' => $gross,
    //             'student_id' => $student->id,
    //             'session' => $student->session,
    //         ]);

        
    // }
    return view('welcome');
});

Route::get('/redirect', function () {
    return view('admin.redirect');
});

Route::get("/admForm", function () {
    $student = Students::findOrFail($_GET['id']);
    $age = Carbon::parse($student->dob)->diff(Carbon::now())
        ->format('%y years, %mmonths and %d days');
    $father = Father::where("student_id", $_GET['id'])->first();
    $mother = Mother::where("student_id", $_GET['id'])->first();

    return view("admin.forms.adm", compact(["student", "age", 'father', 'mother']));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/students', 'StudentsController');
Route::get('getSections/{id}', 'StudentsController@getSections');
Route::get('getStudents', 'StudentsController@getStudents');
Route::patch('/basicUpdate', 'StudentsController@basicUpdate');

Route::get('/report', 'StudentsController@report');

Route::resource('/classes', 'GradeController');
Route::resource('/streams', 'StreamController');
Route::resource('/sections', 'SectionController');
Route::resource('/stations', 'StationController');
Route::get('/stationSearch', 'StationController@search');
Route::get('/stationSearchnow', 'StationController@searchNow');
Route::resource('/transfer-certificates', 'TcController');
Route::resource('/birth-certificates', 'BcController');
Route::resource('/character-certificates', 'CcController');
Route::resource('/annual-certificates', 'ExpenseController');
Route::resource('/gate-passes', 'GatePassController');
Route::resource('/employee', 'EmployeeController');

Route::get('/feeform', 'FeeController@feeForm');
Route::get('/exempt', 'FeeController@exempt');
Route::get('/saveData', 'FeeController@saveData');


Route::get('/fee/student/{id}', 'FeeController@manage');
Route::resource('/fee', 'FeeController');
Route::get('/concessionapply', 'FeeController@updateConcession');
Route::resource('/concession', 'ConcessionController');
Route::resource('/prints', 'PrintController');
Route::get('/searchedlist', 'PrintController@prints');
Route::get('/export', 'PrintController@export');
Route::get('/exportDues', 'PrintController@exportDues');
Route::get('/printApplication', 'PrintController@application');


Route::get('/exportpdf', 'PrintController@pdf');
Route::resource('/customPrints', 'CustomPrintController');

Route::resource('/deactivated', 'DeactivatedController');
Route::get('/activateStudent', 'DeactivatedController@activate');
Route::get('/deactivateStudent', 'DeactivatedController@deactivate');

Route::resource('/promote', 'PromoteController');
Route::get('/promoteStudents', 'PromoteController@promote');
Route::resource('/reciepts', 'RecieptController');
Route::get('/createReciept', 'RecieptController@createReciept');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::resource('/dues', 'DuesController');
Route::get('/getDues', 'DuesController@getDues');
Route::get("/transaction", 'PrintController@transaction');
Route::get("/transactionReport", function () {

    $date1 = $_GET['from'];
    $date2 = $_GET['to'];
    $reciepts = Reciept::whereBetween('date', [$date1, $date2])->get();
    $sum = Reciept::sum('paid');
    $users = User::all();


    return view("admin.transactions.show", compact(["reciepts", 'sum', 'users']));
});
