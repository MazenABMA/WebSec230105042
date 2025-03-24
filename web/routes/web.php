<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\ProductsController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\GradeController;


// ✅ Homepage Route
Route::get('/', function () {
    return view('home'); // Ensure you have resources/views/home.blade.php
})->name('home');

// ✅ Authentication Routes (if needed)
Auth::routes();

// ✅ Dashboard/Home Route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ✅ Grouped Page Routes for Organization
Route::prefix('pages')->group(function () {
    // 🔹 GPA Calculator Page
    Route::get('/gpa-calculator', function () {
        $courses = [
            ['code' => 'CS101', 'title' => 'Introduction to Programming', 'credits' => 3],
            ['code' => 'MATH201', 'title' => 'Calculus II', 'credits' => 4],
            ['code' => 'PHY105', 'title' => 'Physics I', 'credits' => 3],
            ['code' => 'ENG101', 'title' => 'English Composition', 'credits' => 2],
            ['code' => 'HIST210', 'title' => 'World History', 'credits' => 3],
        ];
        return view('gpa-calculator', compact('courses'));
    })->name('gpa.calculator');

    // 🔹 MiniTest Page (Supermarket Bill)
    Route::get('/minitest', function () {
        $bill = [
            ['item' => 'Apples', 'quantity' => 2, 'price' => 3.00],
            ['item' => 'Milk', 'quantity' => 1, 'price' => 2.50],
            ['item' => 'Bread', 'quantity' => 1, 'price' => 1.75],
            ['item' => 'Eggs', 'quantity' => 12, 'price' => 5.00],
        ];
        return view('minitest', compact('bill'));
    })->name('minitest');

    // 🔹 Simple Calculator Page
    Route::get('/calculator', function () {
        return view('calculator');
    })->name('calculator');

Route::get('products', [ProductsController::class,'list'])->name('products_list');
Route::get('products/edit/{product?}', [ProductsController::class, 'edit'])->name('products_edit');
Route::post('products/save/{product?}', [ProductsController::class, 'save'])->name('products_save');
Route::get('products/delete/{product}', [ProductsController::class, 'delete'])->name('products_delete');


Route::get('/users', [UserController::class, 'index'])->name('users_list');
Route::get('/users/create', [UserController::class, 'create'])->name('users_create');
Route::post('/users/store', [UserController::class, 'store'])->name('users_store');
Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users_edit');
Route::post('/users/update/{user}', [UserController::class, 'update'])->name('users_update');
Route::get('/users/delete/{user}', [UserController::class, 'destroy'])->name('users_delete');


Route::resource('grades', GradeController::class);

    // 🔹 Student Transcript Page
    Route::get('/transcript', function () {
        $transcript = [
            ['course' => 'Mathematics', 'grade' => 'A', 'credits' => 3],
            ['course' => 'Physics', 'grade' => 'B+', 'credits' => 4],
            ['course' => 'Chemistry', 'grade' => 'A-', 'credits' => 3],
            ['course' => 'Computer Science', 'grade' => 'A+', 'credits' => 3],
            ['course' => 'English', 'grade' => 'B', 'credits' => 2],
        ];
        return view('transcript', compact('transcript'));
    })->name('transcript');
});
