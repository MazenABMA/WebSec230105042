<?php




use Illuminate\Support\Facades\Route;


use Illuminate\Http\Request;



Route::get('/', function () {


    return view('welcome');


    return view('welcome'); //welcome.blade.php

});



Route::get('/even', function () {


    return view('even');  //even.blade.php


});





Route::get('/prime', function () {


    return view('prime'); //prime.blade.php


});








Route::get('/multable/{number?}', function ($number = null) {


    return view('multable', ['j' => $number ?? 2]); // commented the first one because it already gets the default value from here (multable.blade.php)


});




