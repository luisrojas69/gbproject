<?php

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
    return view('pages.admin.dashboard');
});

Auth::routes(["register" => false]);

// Route::get('email', function(){
// 	return new App\Mail\LoginCredentials(App\User::first(), 123123);	
// });

//Index de la pagina administracion
Route::get('admin', 'HomeController@admin')->name('admin');


Route::get('/home', 'HomeController@index')->name('home');
Route::resource('admin/vehicle', 'Admin\VehicleController');
Route::resource('admin/user', 'Admin\UserController');
Route::resource('admin/role', 'Admin\RoleController');
Route::put('users/{user}/roles', 'Admin\UsersRolesController@update')->name('admin.users.roles.update');
Route::put('users/{user}/permissions', 'Admin\UsersPermissionsController@update')->name('admin.users.permissions.update');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function(){
	

    
	
	Route::get('vehicles/reports', 'VehicleController@reports')->name('vehicles.report');
});