<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\ServiceController;
use App\Http\Controllers\backend\ActivityController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\RepairerController;
use App\Http\Controllers\backend\AdminNewsController;
use App\Http\Controllers\backend\AdminProductController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('layout.master');
// });

// @Backend
Route::get('/signin', [AdminController::class, 'signin'])->name('login');
Route::post('/signin-submit', [AdminController::class, 'signinSubmit']);

Route::get('/signup',         [AdminController::class, 'signup']);
Route::post('/signup-submit', [AdminController::class, 'signupSubmit']);


Route::middleware(['auth'])->group(function () {

Route::get('/', [AdminController::class, 'index']);
// @ logout
Route::get('/admin/logout', [AdminController::class, 'UserLogout']);

// * Website logo
// List logo
Route::get('/admin/list-logo' , [AdminController::class , 'ListLogo'])->name('list-logo');
// add logo
Route::get('/admin/add-logo' , [AdminController::class , 'addLogo'] );
Route::post('/admin/add-logo-submit' , [AdminController::class , 'addLogoSubmit'] );
// edit
Route::get('/admin/edit-logo/{id}' , [AdminController::class , 'EditLogo'] );
Route::post('/admin/edit-logo-submit' , [AdminController::class , 'EditLogoSubmit'] );

// remove
Route::get('/admin/remove-logo/{id}' , [AdminController::class , 'RemoveLogo'] );
Route::post('/admin/remove-logo-submit' , [AdminController::class , 'RemoveLogoSubmit'] );



// list
Route::get('/list-service',            [ServiceController::class, 'ListService']); 
// add
Route::get('/add-service',             [ServiceController::class, 'AddService']); 
Route::post('/add-service-submit',     [ServiceController::class, 'AddServiceSubmit']);

// edit
Route::get('/edit-service/{id}',       [ServiceController::class, 'EditService']);
Route::post('/edit-service-submit',    [ServiceController::class, 'EditServiceSubmit']);

// remove
Route::get('/remove-service/{id}',     [ServiceController::class, 'RemoveService']);
Route::post('/remove-service-submit',  [ServiceController::class, 'RemoveServiceSubmit']);


// list repairer
Route::get('/list-repairer',            [RepairerController::class, 'ListRepairer']);

// add repairer
Route::get('/add-repairer',             [RepairerController::class, 'AddRepairer']);
Route::post('/add-repairer-submit',     [RepairerController::class, 'AddRepairerSubmit']);

// edit repairer
Route::get('/edit-repairer/{id}',       [RepairerController::class, 'EditRepairer']);
Route::post('/edit-repairer-submit',    [RepairerController::class, 'EditRepairerSubmit']);

// remove repairer
Route::get('/remove-repairer/{id}',     [RepairerController::class, 'RemoveRepairer']);
Route::post('/remove-repairer-submit',  [RepairerController::class, 'RemoveRepairerSubmit']);

});



