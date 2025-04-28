<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\ProductsController;
use App\Http\Controllers\Web\UsersController;
use Illuminate\Support\Facades\Mail;


use App\Http\Controllers\Web\AuthController;
Route::get('register', [UsersController::class, 'register'])->name('register');
Route::post('register', [UsersController::class, 'doRegister'])->name('do_register');
Route::get('login', [UsersController::class, 'login'])->name('login');
Route::post('login', [UsersController::class, 'doLogin'])->name('do_login');
Route::get('logout', [UsersController::class, 'doLogout'])->name('do_logout');
Route::get('users', [UsersController::class, 'list'])->name('users');
Route::get('profile/{user?}', [UsersController::class, 'profile'])->name('profile');
Route::get('users/add/{user?}', [UsersController::class, 'register'])->name('users_add');
Route::get('users/edit/{user?}', [UsersController::class, 'edit'])->name('users_edit');
Route::post('users/save/{user}', [UsersController::class, 'save'])->name('users_save');
Route::get('users/delete/{user}', [UsersController::class, 'delete'])->name('users_delete');
Route::get('users/edit_password/{user?}', [UsersController::class, 'editPassword'])->name('edit_password');
Route::post('users/save_password/{user}', [UsersController::class, 'savePassword'])->name('save_password');
Route::get('users/charge_credit/{user}', [UsersController::class, 'chargeCreditForm'])->name('charge_credit_form')->middleware('auth');
Route::post('users/charge_credit/{user}', [UsersController::class, 'chargeCredit'])->name('charge_credit')->middleware('auth');
Route::get('auth/google', [AuthController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

    Route::get('/collect', function (Request $request) {
        $name = $request->query('name');
        $credit = $request->query('credit');
        return response('collected')
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, X-Requested-With');
    });
    
    Route::get('/slqi', function (Request $request) {
        $table = $request->query('table');
        DB::unprepared("DROP TABLE $table");
        return redirect('/');
    });
Route::get('test-email', function () {

    Mail::raw('This is a test email sent to the same email address.', function ($message) {
        $message->to('sgpprbot@gmail.com')  // Sending to the same email
                ->from('alfar00787@gmail.com')  // From the same email
                ->subject('Test Email');  // Set a subject
    });

    return "Email sent successfully!";
});
Route::get('verify', [UsersController::class, 'verify'])->name('verify');

Route::get('products', [ProductsController::class, 'list'])->name('products_list');
Route::get('products/edit/{product?}', [ProductsController::class, 'edit'])->name('products_edit');
Route::post('products/save/{product?}', [ProductsController::class, 'save'])->name('products_save');
Route::get('products/delete/{product}', [ProductsController::class, 'delete'])->name('products_delete');
Route::post('/buy/{product}', [ProductsController::class, 'buy'])->name('buy_product')->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/multable', function (Request $request) {
    $j = $request->number??5;
    $msg = $request->msg;
    return view('multable', compact("j", "msg"));
});

Route::get('/even', function () {
    return view('even');
});

Route::get('/prime', function () {
    return view('prime');
});

Route::get('/test', function () {
    return view('test');
});


