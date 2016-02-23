<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('auteur');
});
/*
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',

]);


*/
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');


Route::resource('front', 'FrontController');
Route::post('front/commentaire', 'FrontController@commentaire');
Route::get('front/viewer','FrontController@viewer');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
/*
Route::get('auth/login', 'Auth\AuthController@login');
Route::get('auth/register', 'Auth\AuthController@register');
/*
 * DashBoard route
 */
Route::resource('dashboard', 'DashboardController');
Route::post('dashboard/getcolone','DashboardController@getcolone');
Route::post('dashboard/getprojet','DashboardController@getprojet');

/*
 * auteur route
 */

Route::resource('auteur', 'AuteurController');
Route::post('auteur/{auteur}', 'AuteurController@destroy');

/*
 * secteur route
 */

Route::resource('categories', 'CategoriesController');
Route::post('categories/{categories}', 'CategoriesController@destroy');

Route::resource('document', 'DocumentController');
Route::post('document/{document}', 'DocumentController@destroy');
/*
 * notification route
 */

Route::resource('comment', 'CommentController');
Route::post('comment/{comment}', 'CommentController@destroy');




Route::resource('notification', 'NotificationController');
Route::post('notification/{notification}', 'NotificationController@destroy');




/*
*   Front office route
*/

