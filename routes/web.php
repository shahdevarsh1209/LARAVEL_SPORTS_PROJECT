<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\loginController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\playerController;
use App\Http\Controllers\tournamentController;
use App\Http\Controllers\ContactController;
use App\Notifications\InvoicePaid;


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
//Route::get('/home', [ 'as' => 'admindashboard', 'uses' => 'adminController@index'])->name('admin');
Route::get('/index',[IndexController::class,'index']);
Route::get('/registration',[IndexController::class,'registration']);
Route::post('store',[IndexController::class,'store'])->name('store');

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/' ,[admincontroller::class,'index'])->name('index');

});

Route::get('/login',function(){
    return view('modules.login');

})->name('loginPage');

Route::get('/products',[HomeController::class,'products'])->name('products');
Route::post('/loginAttempt',[loginController::class,'login'])->name('login');
Route::get('/logout',[loginController::class,'logout'])->name('logout');

Route::get('getHash/{txt}',function($txt){
    return Hash::make($txt);
}); 


Route::post('changepassword',[HomeController::class,'changepassword'])->name('changepassword');
Route::get('/profileAdmin',[HomeController::class,'profile'])->name('profile');
Route::post('/profileUpdate',[HomeController::class,'profileUpdate'])->name('profileUpdate');
Route::get('sendMail',[MailController::class,'sendMail'])->name('sendMail');

Route::prefix('category')->name('category.')->group(function(){
    Route::get('/index',[categoryController::class,'index'])->name('index');
    Route::post('/insert',[categoryController::class,'insert'])->name('insert');
    Route::post('/update',[categoryController::class,'update'])->name('update');
    Route::get('/delete{id}',[categoryController::class,'delete'])->name('delete');
    Route::post('bulkUpload',[categoryController::class,'bulkUpload'])->name('bulkUpload');
    Route::get('download',[categoryController::class,'download'])->name('download');
    
});
Route::prefix('player')->name('player.')->group(function(){
    Route::get('/index',[playerController::class,'index'])->name('index');
    Route::post('/insert',[playerController::class,'insert'])->name('insert');
    Route::post('/update',[playerController::class,'update'])->name('update');
    Route::get('/delete{id}',[playerController::class,'delete'])->name('delete'); 

});
Route::prefix('tournament')->name('tournament.')->group(function(){
    Route::get('/index',[tournamentController::class,'index'])->name('index');
    Route::post('/insert',[tournamentController::class,'insert'])->name('insert');
    Route::post('/update',[tournamentController::class,'update'])->name('update');
    Route::get('/delete/{id}',[tournamentController::class,'delete'])->name('delete');
});
Route::get('/customForgotPassword',function(){
    return view('customForgotPassword');
});

Route::post('sendOtpUsingEmail',[HomeController::class,'customForgetPass'])->name('sendOtpUsingEmail');
Route::get('/contact-form', [ContactController::class, 'showForm']);

Route::post('/contact-form', [ContactController::class, 'storeForm'])->name('contact.save');

Route::post('matchOtp',[HomeController::class,'matchOtp'])->name('matchOtp');
Route::get('about',function()
{
    return view('about');
});
Route::get('team',function()
{
    return view('team');
});
Route::get('news',function()
{
    return view('news');
});
Route::get('blog',function()
{
    return view('blog');
});
Route::get('contact',function()
{
    return view('contact');
});
