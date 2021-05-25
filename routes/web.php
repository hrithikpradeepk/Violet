<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registercontroller;
use App\Http\Controllers\admincontroller;
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


//Non-User ACCESS

Route::get('/', function () {
    return view('index');
});

Route::get('/categories', function () {
    return view('categories');
});

Route::get('/ccbrand',[adminController :: class,'ccbrand1']);
Route::get('/ccbrand/{id}',[adminController::class,'ccbrand2']);


Route::get('/contact', function () {
    return view('contact');
});

Route::get('/productpage', function () {
    return view('productpage');
});

Route::get('/ccproduct',[adminController :: class,'ccproduct1']);
Route::get('/ccproduct/{id}',[adminController::class,'ccproduct2']);

Route::get('/cproductdetails',[adminController :: class,'cproductdetails1']);
Route::get('/cproductdetails/{id}',[adminController::class,'cproductdetails2']);


Route::get('/custcategories',[admincontroller::class,'viewcatt2']);

Route::get('/test', function () {
    return view('test');
});

Route::post('/addadmin', [registercontroller::class,'addadmin']);

Route::get('/login',[registercontroller :: class,'createlog']);
Route::post('/login1',[registercontroller :: class,'check']);

Route::get('/sessiondelete',function(){
    if(session()->has('sname'))
    {
        session()->pull('sname');
    }
    return view('login');
});

Route::get('/register',[registerController :: class,'create']);
Route::post('/register',[registerController::class,'store']);

Route::get('/register', function () {
    return view('register');
});

Route::get('/search',[admincontroller::class,'search']);

Route::group(['middleware'=>['LoginCheck']], function(){


Route::get('/adminhome',[admincontroller::class,'adminhome']);


//ADMIN



Route::get('/addcategory', function () {
    return view('addcategory');
});

Route::get('/addbrand', function () {
    return view('addbrand');
});

Route::get('/addproduct', function () {
    return view('addproduct');
});

Route::get('/addcustomer', function () {
    return view('addcustomer');
});

Route::get('/viewproduct', function () {
    return view('viewproduct');
});

Route::get('/editcategory', function () {
    return view('editcategory');
});

Route::get('/changepass', function () {
    return view('changepass');
});


Route::post('/addcategory1',[admincontroller::class,'store']);

Route::get('/addproduct',[admincontroller::class,'view2']);
Route::post('/addproduct1',[admincontroller::class,'store2']);

Route::get('/addbrand',[admincontroller::class,'view']);

Route::post('/addbrand1',[admincontroller::class,'store1']);


Route::get('/viewcategory',[admincontroller::class,'viewcat']);

Route::get('/viewproduct',[admincontroller::class,'viewproduct']);

Route::get('/viewbrand',[admincontroller::class,'viewbrand']);

Route::get('/changepass',[registercontroller::class,'pass']);

Route::get('/viewcustomer',[registercontroller::class,'viewcust']);

Route::get('/vieworders',[admincontroller::class,'vieworders']);

Route::get('/editcategory/{id}', [admincontroller::class,'edit']);
Route::post('/categoryedit1/{id}', [admincontroller::class,'update']);

Route::get('/editbrand/{id}', [admincontroller::class,'edit1']);
Route::post('/editbrand1/{id}', [admincontroller::class,'update1']);

Route::get('/editproduct/{id}', [admincontroller::class,'edit2']);
Route::post('/editproduct1/{id}', [admincontroller::class,'update2']);

Route::get('/editbrand1',[admincontroller::class,'viewcategory']);

Route::get('/cbrand',[adminController :: class,'cbrand1']);
Route::get('/cbrand/{id}',[adminController::class,'cbrand2']);


Route::get('/cproduct',[adminController :: class,'cproduct1']);
Route::get('/cproduct/{id}',[adminController::class,'cproduct2']);


Route::get('/productdetails',[adminController :: class,'productdetails1']);
Route::get('/productdetails/{id}',[adminController::class,'productdetails2']);

Route::get('/deletecategory/{id}', [admincontroller::class,'delete']);

Route::get('/deletebrand/{id}', [admincontroller::class,'delete1']);

Route::get('/deleteproduct/{id}', [admincontroller::class,'delete2']);
Route::get('/deleteproduct/{id}', [admincontroller::class,'delete2']);

Route::get('/deleteitem/{id}', [admincontroller::class,'deleteitem']);

Route::get('/viewreport', [admincontroller::class,'viewreport']);

//Customer


Route::get('/editprofile', function () {
    return view('editprofile');
});

Route::get('/ccontact', function () {
    return view('ccontact');
});


Route::get('/chome', function () {
    return view('chome');
});

Route::get('/cbrand', function () {
    return view('cbrand');
});

Route::get('/deletecart', [admincontroller::class,'deletecart']);

Route::get('/categories',[admincontroller::class,'viewcatt']);
    
Route::post('/order',[admincontroller::class,'order']);

Route::get('/myorders',[admincontroller::class,'myorders']);

Route::get('/cancelorder/{id}', [admincontroller::class,'cancel']);

Route::get('/invoice', function () {
    return view('invoice');
});

Route::post('/invoice1', [admincontroller::class,'bill']);

Route::get('/myprofile',[registercontroller::class,'profile']);
Route::get('/editprofile/{id}', [registercontroller::class,'edit']);
Route::post('/editprofile1/{id}', [registercontroller::class,'update']);
Route::get('/editprofile1',[registercontroller::class,'profile']);


Route::post('/changepassword', [registercontroller::class,'update2']);

Route::get('/addtocart', [admincontroller::class,'createcart']);
Route::post('/addtocart', [admincontroller::class,'cartstore']);


Route::post('/report', [admincontroller::class,'report']);

Route::get('/viewcart', [admincontroller::class,'viewcart']);

Route::get('/checkoutt', [admincontroller::class,'checkout']);

Route::get('/invoice', [admincontroller::class,'invoice']);

Route::get('/orderreport', function () {
    return view('orderreport');
});

});