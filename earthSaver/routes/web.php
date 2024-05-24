<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\signUpController;
use App\Http\Controllers\signInController;
use App\Http\Controllers\vendorProfileController;
use App\Http\Controllers\industryController;
use App\Http\Controllers\productCategoryController;
use App\Http\Controllers\productController;
use App\Http\Controllers\flightController;
use App\Http\Controllers\userProductController;
use App\Http\Controllers\userFlightController;
use App\Models\industry;
use App\Models\vendor;
use App\Models\euser;
use App\Models\product;
use App\Models\flight;
use App\Models\productCategory;

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
Route::get('navigateSignup', function () {
    return view('signUp');
});
Route::get('logout', function(){
    return view('welcome');
});
Route::get('newIndustryType', function(){
    return view('newIndustryType');
});
Route::resource('signUp',signUpController::class);
Route::resource('signIn',signInController::class);
Route::resource('vendorProfile',vendorProfileController::class);
Route::resource('industry',industryController::class);
Route::get('navigateVendorHome', function () {
    $vendorData = vendor::where('userId', '=', Session::get('userId'))->first();
    $eUserData = euser::where('id','=', Session::get('userId'))->get();
    return view('vendorHome', ['vendorData' => $vendorData, 'approval_status' => $eUserData[0]->approval_status]);
});
Route::resource('productCategory',productCategoryController::class);
Route::resource('product',productController::class);
Route::get('newProductCategory', function(){
    return view('newProductCategory');
});
Route::get('viewProductsVendor', function(){
    $productCategory = productCategory::all();
    return view('vendorViewProducts',['productCategory' => $productCategory]);
});
Route::get('updateProductVendor/{id}', function($id){
    $product = product::where('id','=', $id)->get();
    $productCategory = productCategory::all();
    return view('vendorUpdateProduct',['product' => $product, 'productCategory' => $productCategory]);
});
Route::get('navigateAbout', function () {
    return view('about');
});
Route::get('navigateAbout', function () {
    return view('about');
});
Route::get('navigateCarbonSearch', function () {
    return view('carbonSearch');
});
Route::get('navigateHome', function () {
    return view('welcome');
});
Route::get('newFlight', function () {
    return view('newFlight');
});
Route::resource('flight',flightController::class);
Route::get('viewFlightsVendor', function(){
    $vendorData = vendor::where('userId', '=', Session::get('userId'))->first();
    $flight = flight::where('vendorId','=',$vendorData->id)->get();
    return view('vendorViewFlights',['flight' => $flight]);
});
Route::get('updateFlightVendor/{id}', function($id){
    $flight = flight::where('id','=',$id)->get();
    //dd($flight);
    return view('vendorUpdateFlight',['flight' => $flight]); 
});
Route::get('userSelectCategory', function(){
    return view('userSelectCategory');
});
Route::resource('userProduct',userProductController::class);
Route::resource('userFlight',userFlightController::class);
Route::get('userViewVendors/{vendor}', function($vendor){
    $euser = euser::where('name','=',$vendor)->first();
    $vendor = vendor::where('userId','=',$euser->id)->first();
    return view('userViewVendor',['vendor' => $vendor, 'euser' => $euser]); 
});