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


//Auth::routes();

Route::group(['prefix' => ''], function () {
	//Login
    Route::get('login', 'Auth\LoginController@getLogin');
    Route::post('login', 'Auth\LoginController@postLogin');
    Route::get('logout', 'Auth\LoginController@getLogout');

    //Signup
    Route::get('register', 'Auth\RegisterController@getRegisterForm');
    
    Route::get('register-freelancer', 'Auth\RegisterController@getFlRegisterForm');
    Route::post('register', 'Auth\RegisterController@store');
    
});

Route::group(['middleware' => ['admin_auth']], function () {
	Route::get('dashboard', 'DashboardController@index');
    Route::resource('categories', 'CategoryController');
    Route::resource('profetionls', 'ProfetionalSkills');
});

Route::group(['middleware' => ['client_auth']], function () {
	Route::get('cl/{id}/dashboard', 'ClientController@index');
    Route::get('jobpost', 'JobController@jobpost');
    Route::get('jobpost/{id}/edit', 'JobController@editjobpost');
    Route::post('createjob', 'JobController@createJob');
    Route::get('joblist', 'JobController@joblisting');
    
    Route::resource('portfolios', 'PortfolioController');
});

Route::group(['middleware' => ['freelancer_auth']], function () {
	Route::get('profile/{type}/{username}', 'ProfileController@profile')->name('profile');
    
    
    Route::post('createproposal', 'JobController@createproposal');
    Route::post('/profileupdate/{id}', 'ProfileController@update')->name('profileupdate');
    Route::get('educationedit','ProfileController@updateEducation');
});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('jobs/{id}/bidding', 'JobController@jobbidding');
Route::get('proposal/{id}/submit', 'JobController@proposal');

//Clear Cache facade value:
Route::get('/cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('config:cache');
});