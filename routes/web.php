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
use App\Mother;
use App\Reciept;
use App\User;
use Illuminate\Support\Carbon;

Route::get('/', function () {
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


    return view("admin.transactions.show", compact(["reciepts", 'sum' , 'users']));
});
