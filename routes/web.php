<?php

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



Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin' ,'namespace' => 'Admin'],function (){
      Route::get('login','AdminController@login');
        Route::post('login','AdminController@login')->name('login');
      Route::group(['middleware' =>['admin']],function(){

          Route::get('dashboard' , 'AdminController@dashboard')->name('dashboard');
          Route::get('settings' , 'AdminController@settings')->name('settings');
          Route::any('logout', 'AdminController@logout')->name('logout');
          Route::post('checkAdminPass' , 'AdminController@check_admin_pass');
          Route::post('updateAdminPass' , 'AdminController@updateAdminPass')->name('updateAdminPass');
          Route::match(['get','post'],'updateAdminDetails','AdminController@updateAdminDetails')->name('updateAdminDetails');

          //sections
          Route::resource('sections','SectionController');
          Route::post('updateSectionStatus' , 'SectionController@updateSectionStatus');

          //categories
          Route::resource('users','UserController');
          Route::resource('managers','ManagerController');
          Route::resource('midanies','MidaniController');
          Route::resource('centers','CenterController');
          Route::resource('worksystems','WorkSystemController');
          Route::resource('agencies','AgenciesController');
          Route::resource('jobTitles','JobTitleController');
      });
      Route::get('lang/{lang}',function($lang){
        session()->has('lang') ? session()->forget('lang') : '';
        $lang == 'ar'?session()->put('lang','ar'):session()->put('lang','en');
        return back();
      })->name('lang');
});
/*============================== Test Area ============================= */
    Route::get('test', function() {})->name('test');

    Route::get('get-clear-cache', function() {
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return "Cache is cleared";
    });

    Route::get('get-link-storage', function() {
$exitCode = Artisan::call('storage:link', [] ); echo $exitCode;
    });
