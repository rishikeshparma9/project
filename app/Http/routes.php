<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
    Route::get('/',['as' => 'signin','uses' => 'UserController@getSignIn']);

    Route::get('/signup', array('as' => 'signup', function () {
        return view('signup');
    }));

    Route::post('/',['as' => 'signin', 'uses' => 'UserController@postSignIn']);

    Route::post('/signup',['as' => 'signup', 'uses' => 'UserController@postSignUp']);

    Route::get('/dashboard',['as' => 'dashboard', 'uses' => 'UserController@getDashBoard','middleware' => 'auth']);

    Route::post('/dashboard',['as' => 'dashboard', 'uses' => 'UserController@postDashBoard','middleware' => 'auth']);

    Route::get('/question/{id}',['as'=>'question','middleware' => 'auth','uses' => 'UserController@getAnswer']);

    Route::post('/question/{id}',['as'=>'question','middleware' => 'auth','uses' => 'UserController@postAnswer']);

    Route::post('/liked',['as'=>'liked','middleware' => 'auth','uses' => 'UserController1@postLike']);

    Route::post('/disliked',['as'=>'disliked','middleware' => 'auth','uses' => 'UserController1@postDislike']);

    Route::get('/logout',['as'=>'logout','middleware' => 'auth','uses' => 'UserController1@getLogout']);

    Route::get('/profile/{name}',['as'=>'profile','middleware' => 'auth','uses' => 'UserController1@getProfile']);

    Route::get('/profilequestion/{name}',['as'=>'profile1','middleware' => 'auth','uses' => 'UserController1@getProfilequestion']);

    Route::get('/profileanswer/{name}',['as'=>'profile2','middleware' => 'auth','uses' => 'UserController1@getProfileanswer']);

    Route::get('/settings',['as'=>'settingsget','middleware' => 'auth','uses' => 'UserController1@getSettings']);

    Route::post('/settings/{formid}',['as'=>'settings','middleware' => 'auth','uses' => 'UserController1@postSettings']);

    Route::post('/comment',['as'=>'comment','middleware' => 'auth','uses' => 'UserController1@postComment']);

    Route::get('/comment/{answer_id}',['as'=>'commen','middleware' => 'auth','uses' => 'UserController1@getComment']);

    Route::get('/userimage/{filename}',['as'=>'userimage','middleware' => 'auth','uses' => 'UserController1@getImage']);

    Route::get('/setting1',['as'=>'setting1','middleware' => 'auth','uses' => 'UserController1@setting1']);

    Route::get('/setting2',['as'=>'setting2','middleware' => 'auth','uses' => 'UserController1@setting2']);
});
