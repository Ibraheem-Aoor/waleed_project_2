<?php

use App\Http\Controllers\Aadmin\AdminController;
use App\Http\Controllers\Admin\ApplicationFeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ConsultantClientDelegatorController;
use App\Http\Controllers\Admin\DelegatorTransactionController;
use App\Http\Controllers\Admin\PhaseController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProjectRelatedCrudController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\TenderController;
use App\Models\DelegatorTransaction;
use Illuminate\Support\Facades\App;
use Mcamara\LaravelLocalization\LaravelLocalization;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;

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

Route::prefix('admin')->group(function () {



    // Auth Routes
    Route::get('/login', function(){
        return view('admin.auth.login');
    })->middleware('guest');



    Route::group(['middleware' => 'auth', 'as' => 'admin.'], function () {


        Route::get('/', [AdminController::class , 'dashboard'])->name('dashboard');
        Route::get('/projects-table-data', [AdminController::class , 'getTableData'])->name('dashboard.projects_table_date');

        // Prooject Routes
            Route::resource('project', ProjectController::class);
            Route::get('table-data', [ProjectController::class, 'getTableData'])->name('project.table-data');
        // Project Related Models "All Same Utility"
            Route::resource('project-related-crud', ProjectRelatedCrudController::class);
            Route::get('project-related-crud-table-data', [ProjectRelatedCrudController::class , 'getTableData'])->name('project-rleated-crud.table_data');
        // Report routes
        Route::get('reports' , [ReportController::class , 'index'])->name('report.index');
        Route::get('reports-table-data', [ReportController::class , 'getTableData'])->name('report.table-data');
        Route::post('reports-print', [ReportController::class , 'printExcel'])->name('report.print');
    });

});
