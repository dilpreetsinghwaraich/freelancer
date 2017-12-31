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
    Route::get('activate/account/{token?}', 'Auth\RegisterController@activate_account');
    
    Route::get('register-freelancer', 'Auth\RegisterController@getFlRegisterForm');
    Route::post('register', 'Auth\RegisterController@store');
    Route::get('forget/password','Auth\LoginController@forget_password');
    Route::post('forget/password/','Auth\LoginController@reset_password_forget');

    Route::get('/reset/password/{reset_token?}','Auth\LoginController@reset_password');
    Route::post('/reset/password/{reset_token?}','Auth\LoginController@reset_update_password');    
    
});

Route::group(['middleware' => ['admin_auth']], function () {
	Route::get('dashboard', 'DashboardController@index');
    Route::resource('categories', 'CategoryController');
    Route::resource('profetionls', 'ProfetionalSkills');
});

Route::group(['middleware' => ['client_auth']], function () {

	Route::get('find/freelancer/{tab?}', 'ClientController@index');

	Route::post('/save/freelancer','ClientController@save_freelancer');

	Route::post('/select/type','JobController@jobpost_type');
    Route::get('jobpost/{job_type?}/{job_id?}', 'JobController@jobpost');
    Route::get('jobpost/{id}/edit', 'JobController@editjobpost');
	Route::post('jobpost/update','JobController@update_job');
    Route::post('createjob', 'JobController@createJob');
    Route::get('joblist', 'JobController@joblisting');
    
    Route::resource('portfolios', 'PortfolioController');
});

Route::group(['middleware' => ['freelancer_auth']], function () {
	Route::get('profile', 'ProfileController@profile')->name('profile');   
    
    Route::post('/profileupdate/{id}', 'ProfileController@update')->name('profileupdate');

    Route::post('/profileupdateImage/', 'ProfileController@profileupdateImage');
    Route::get('educationedit','ProfileController@updateEducation');
	Route::get('find/work','FindworkController@index');
    Route::get('find/search','FindworkController@get_search');

    Route::post('/save/job','FindworkController@save_job');

    Route::get('job/proposal/{key?}','FindworkController@job_proposal');
    Route::get('submit/proposal/{key?}', 'FindworkController@proposal');
    Route::post('createproposal', 'FindworkController@createproposal');

    Route::get('proposals', 'ProposalsController@index');

    Route::get('saved/job', 'ProposalsController@save_job');

    Route::get('my/job', 'ProposalsController@my_completed_job');
    Route::get('my/contract', 'ProposalsController@my_contract_job');
});


Route::get('/home', 'HomeController@index')->name('home');
