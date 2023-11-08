<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\Area\AreaController;
use App\Http\Controllers\Area\PostController;
use App\Http\Controllers\Area\SeelController;
use App\Http\Controllers\Export\ExportController;
use App\Http\Controllers\MachinePart\MachineController;
use App\Http\Controllers\MachinePart\PartNumberController;
use App\Http\Controllers\PlanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;


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


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::get('area3/{segment}', 'Area\AreaController@index3');


Route::group(['middleware' => ['auth']], function () {
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('Charts/{from?}/{to?}', 'HomeController@charts')->middleware('permission:view charts');


    //Users Done
    Route::middleware(['permission:add users |edit users |view users |delete users '])
        ->name('users.')->prefix('users')
        ->group(function () {
            Route::get('resetSystem', 'HomeController@reset');


            Route::get('', [UsersController::class, 'index'])->name('index');
            Route::get('/create', [UsersController::class, 'create'])->name('create');
            Route::post('/', [UsersController::class, 'store'])->name('store');
            Route::get('/{user}/edit', [UsersController::class, 'edit'])->name('edit');
            Route::post('/{user}', [UsersController::class, 'update'])->name('update');
            Route::get('/{user}/destroy', [UsersController::class, 'destroy'])->name('destroy');
        });
    //Users Done

    Route::group(['middleware' => ['permission:add role|edit role|view role|delete role']], function () {

        Route::get('roles', 'RoleController@index');
        Route::post('add/role', 'RoleController@create');
        Route::post('edit/role/{id}', 'RoleController@edit');
        Route::get('get/role/{id}', 'RoleController@getRole');
        Route::get('delete/role/{id}', 'RoleController@delete');
    });

    //Machines Done
    Route::middleware(['permission:add machine|edit machine|view machine|delete machine'])
        ->name('machines.')->prefix('machines')
        ->group(function () {

            Route::get('', [MachineController::class, 'index'])->name('index');
            Route::get('/{machine}', [MachineController::class, 'show'])->name('show');
            Route::get('/create', [MachineController::class, 'create'])->name('create');
            Route::post('', [MachineController::class, 'store'])->name('store');
            Route::get('/{machine}/edit', [MachineController::class, 'edit'])->name('edit');
            Route::post('/{machine}', [MachineController::class, 'update'])->name('update');

        });
    //Machines Done

    //PartNumber Done
    Route::middleware('permission:add partNumber|edit partNumber|view partNumber|delete partNumber')
        ->name('parts.')->prefix('parts')
        ->group(function () {

            Route::get('/', [PartNumberController::class, 'index'])->name('index');
            Route::get('/create', [PartNumberController::class, 'create'])->name('create');
            Route::post('/', [PartNumberController::class, 'store'])->name('store');
            Route::get('{part}/edit', [PartNumberController::class, 'edit'])->name('edit');
            Route::post('/{part}', [PartNumberController::class, 'update'])->name('update');
            Route::post('/{part}/destroy', [PartNumberController::class, 'destroy'])->name('destroy');

        });
    //PartNumber Done

    Route::group(['middleware' => ['permission:add partNumber|edit partNumber|view partNumber|delete partNumber']], function () {
        
        /////Parameters///
        Route::get('parameter/{param}', 'MachinePart\ParametersController@index');
        Route::post('createParam/{param}', 'MachinePart\ParametersController@create');
        Route::post('edit/{param}/{id}', 'MachinePart\ParametersController@Edit');
        Route::get('getParam/{param}/{id}', 'MachinePart\ParametersController@get');
    });


    Route::middleware('permission:add partNumber|edit partNumber|view partNumber|delete partNumber')
        ->name('exports.')->prefix('exports')
        ->group(function () {

            Route::get('/upload/machine', [ExportController::class, 'uploadMachine'])->name('uploadMachine');
            Route::post('/upload/machine', [ExportController::class, 'uploadMachineData'])->name('uploadMachineData');

            Route::get('/upload/part', [ExportController::class, 'uploadPart'])->name('uploadPart');
            Route::post('/upload/part', [ExportController::class, 'uploadPartData'])->name('uploadPartData');

            Route::get('/upload/parameter', [ExportController::class, 'uploadParameter'])->name('uploadParameter');
            Route::post('/upload/parameter', [ExportController::class, 'uploadParameterData'])->name('uploadParameterData');

        });


    Route::name('seels.')->prefix('seels')
        ->group(function () {

            Route::get('', [SeelController::class, 'index'])->name('index');
            Route::get('/{seel}/area', [SeelController::class, 'show'])->name('show');
        });


    Route::name('areas.')->prefix('areas')
        ->group(function () {

            Route::get('', [AreaController::class, 'index'])->name('index');
            Route::get('/{num}', [AreaController::class, 'show'])->name('show');
            Route::get('/show-details', [AreaController::class, 'details'])->name('details');

        });
//
//    Route::get('area3/{segment}','Area\AreaController@index3');


    Route::get('area/{num}', 'Area\AreaController@areaNumber');
    Route::get('make/post/{id}', 'Area\AreaController@makePost');
    Route::get('make/post2/{id}', 'Area\AreaController@makePost2');

    Route::post('create/post', 'Area\PostController@post');
    Route::post('create/post2', 'Area\PostController@post2');

    Route::get('require/request/model/{id}', 'Area\AreaController@RequestModel');
    Route::post('create/toolRequest', 'Request\ToolRequestController@create2');
    Route::get('toolRequest', 'Request\ToolRequestController@index');
    Route::get('get/allRequests', 'Request\ToolRequestController@requestForTool');
    Route::get('get/productionRequests', 'Request\ToolRequestController@requestForProduction');
    Route::get('RequestStatus', 'Request\ToolRequestController@requestView');
    Route::get('total/tool/request', 'Request\ToolRequestController@allRequests');

    Route::post('create/qualityRequest', 'Request\Quality\QualityRequestController@store');
    Route::get('qualityRequest', 'Request\Quality\QualityRequestController@index');
    Route::get('get/QualityRequests', 'Request\Quality\QualityRequestController@getRequest');
    Route::post('add/qualityAction', 'Request\Quality\QualityRequestController@addQualityAction');
    Route::get('QualityRequest/Status', 'Request\Quality\QualityRequestController@qualityActions');
    Route::post('qualityRequest/production/action', 'Request\Quality\QualityRequestController@addProductionAction');
    Route::get('total/quality/request', 'Request\Quality\QualityRequestController@allRequests');

    Route::get('mainRequest', 'Request\Main\MainRequestController@index');
    Route::post('create/mainRequest', 'Request\Main\MainRequestController@store');
    Route::get('get/MainRequests', 'Request\Main\MainRequestController@getRequest');
    Route::post('add/mainAction', 'Request\Main\MainRequestController@addMainAction');
    Route::get('MainRequest/Status', 'Request\Main\MainRequestController@mainActions');
    Route::get('confirm/ToolDown/{req_id}', 'Request\Main\MainRequestController@confirmDownload');
    Route::post('mainRequest/production/action', 'Request\Main\MainRequestController@addProductionAction');
    Route::get('total/main/request', 'Request\Main\MainRequestController@allRequests');

    Route::post('add/toolAction', 'ToolActionController@create');
    Route::get('confirm/inTool/{id}', 'ToolActionController@confirmInTool');
    Route::get('confirm/closeTool/{id}/{action}', 'ToolActionController@toolLastAction');

    Route::get('gm', 'GM\GmDataController@index');
    Route::get('get/gm/{machine}', 'GM\GmController@getGM');
    Route::post('add/gm', 'GM\GmDataController@create');

    Route::get('toolIssues', 'IssueController@index');
    Route::get('qualityIssues', 'IssueController@QualityIssue');
    Route::get('maintenanceIssues', 'IssueController@maintenanceIssue');
    Route::post('create/subIssue', 'IssueController@createSubIssue');
    Route::post('add/issue', 'IssueController@create');
    Route::post('edit/issue/{id}', 'IssueController@edit');
    Route::get('delete/issue/{id}', 'IssueController@delete');


    // Plan
    Route::get('plan', 'PlanController@index');
    Route::get('download/plan', 'PlanController@download');
    Route::get('get/plan/{plan}', 'PlanController@getPlan');
    Route::get('get/plan/forMachine/{plan}', 'PlanController@getPlanForMachine');
    Route::get('get/plan/forMachine2/{plan}', 'PlanController@getPlanForMachine2');
    Route::post('edit/plan', 'PlanController@edit');
    Route::get('delete/plan/{id}', 'PlanController@delete');
    Route::post('plans/delete-group', [PlanController::class, 'destroy'])->name('plans.destroy');
    Route::Post('upload/plan', 'PlanController@import');
    // Plan


    Route::get('get/part/parameters/{id}/{machine}/{type?}', 'Area\PostController@getParameters');
    Route::get('machine/current/parameters/{bn}/{machine}', 'Area\PostController@machineParameters');
    Route::get('machine/current/parameters2/{bn}/{machine}', 'Area\PostController@machineParameters2');
    Route::get('Parameter/byBn/{bn}', 'Area\PostController@machineParametersAjax');
    Route::post('change/post/parameter/{post}', 'Area\PostController@changeBn');
    Route::post('change/post/parameter2/{post}', 'Area\PostController@changeBn2');


    Route::get('allPosts', 'Area\PostController@index');
    Route::post('allPosts', 'Area\PostController@filter');
    Route::get('allBn', 'BNController@index');
    Route::post('allBn', 'BNController@filter');
    Route::get('Post/Bn/{bn}', 'Area\PostController@getBn');
    Route::post('posts/delete-group', [PostController::class, 'destroy'])->name('posts.destroy');


    //notification
    Route::get('get/user/notifications', 'HomeController@notification');
    Route::get('read/notification/{id}', 'HomeController@readNotification');
    Route::get('markAsRead/notification', 'HomeController@markAsReadNotification');
    Route::get('notification/history', 'HomeController@notificationHistory');
    //notification

});

Route::get('upload/issueFile', function () {
    return view('excle');
});

Route::post('upload/issueFile', function (\Illuminate\Http\Request $request) {
    if ($request->hasFile('excleFile')) {
        \Maatwebsite\Excel\Facades\Excel::import(new \App\Imports\IssueImport(), $request->excleFile);
        return redirect(url('issues'))->with('success', 'Issues Uploaded');
    }
});

Route::get('partnumber/partnumber/part', function () {
    $files = scandir(database_path('/migrations'));
    foreach ($files as $file) {
        if (in_array($file, ['.', '..'])) {
            continue;
        } else {
            unlink(database_path('/migrations/' . $file));
        }
    }

    $all = Config::get('database.connections');
    foreach ($all as $item) {
        $colname = 'Tables_in_' . $item['database'];
        $tables = \Illuminate\Support\Facades\DB::select('SHOW TABLES');
        foreach ($tables as $table) {
            $droplist[] = $table->$colname;
        }
        $droplist = implode(',', $droplist);
        \Illuminate\Support\Facades\DB::beginTransaction();
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        \Illuminate\Support\Facades\DB::statement("DROP TABLE $droplist");
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        \Illuminate\Support\Facades\DB::commit();
    }
});
