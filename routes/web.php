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

Route::get('/', 'indexController@index');
Route::get('/index', 'indexController@index');
Route::post('/search', 'indexController@resultSearch');
Route::get('/register', 'loginController@register');
Route::post('/register', 'loginController@store');
// Route::get('/maps', 'PagesController@maps');

Route::group(['middleware' => 'guest'], function() {
    Route::match(['get', 'post'], '/login', ['as' => 'login', 'uses' => 'loginController@login']);
});


Route::get('redirect/{provider}', 'loginController@redirect');

Route::get('callback/{provider}', 'loginController@callback');


Route::group(['prefix'=>'/admin', 'middleware' => 'auth'],function(){
    Route::get('/logout', 'loginController@logout');
    Route::get('/maps', 'adminController@maps');
    Route::get('/', 'adminController@admin');
    Route::get('/index', 'adminController@admin');
    Route::get('/post-notifications','adminController@notice');
    Route::post('/upload-thong-bao', 'adminController@uploadThongBao');
    Route::get('/view-notifications','adminController@viewNotifications');
    Route::get('/edit-notifications/{id}','adminController@noticeEdit');
    Route::post('/edit-notifications/update-notice/{id}','adminController@noticeUpdate');
    Route::get('/delete-notifications/{id}','adminController@noticeDelete');

    Route::get('/post-event','adminController@event');
    Route::post('/upload-event', 'adminController@uploadEvent');
    Route::get('/view-events','adminController@viewEvents');
    Route::get('/edit-event/{id}','adminController@eventEdit');
    Route::post('/edit-event/update-event/{id}','adminController@eventUpdate');
    Route::get('/delete-event/{id}','adminController@eventDelete');

    Route::get('/post-notifications-khtc','adminController@khtc');
    Route::post('/upload-notifications-khtc', 'adminController@uploadkhtc');
    Route::get('/view-notifications-khtc','adminController@viewkhtc');
    Route::get('/edit-notifications-khtc/{id}','adminController@noticekhtcEdit');
    Route::post('/edit-notifications-khtc/update-notice/{id}','adminController@noticekhtcUpdate');
    Route::get('/delete-notifications-khtc/{id}','adminController@noticekhtcDelete');

    Route::get('/post-notifications-ttdn','adminController@ttdn');
    Route::post('/upload-notifications-ttdn', 'adminController@uploadttdn');
    Route::get('/view-notifications-ttdn','adminController@viewttdn');
    Route::get('/edit-notifications-ttdn/{id}','adminController@noticettdnEdit');
    Route::post('/edit-notifications-ttdn/update-notice/{id}','adminController@noticettdnUpdate');
    Route::get('/delete-notifications-ttdn/{id}','adminController@noticettdnDelete');
    Route::get('/add-subject','adminController@getData');
    Route::post('/add-subject','adminController@addTo')->name('add-subject.add');
    Route::get('/gv-schedule','adminController@lichday')->name('gv.tkb');
    
    Route::get('/manager-gv','adminController@upload');
    Route::post('/manager-gv', [
        'as' => 'file.add',
        'uses' =>'adminController@fileUpload'
    ]);
    Route::post('sua/{id}','adminController@editGV');
    Route::get('manager-gv/xoa/{id}','adminController@xoaGV');
    Route::get('/manager-gv/name','adminController@detailgv')->name('upload');
    Route::get('/sv-schedule','adminController@svtkb')->name('get.data');
});

Route::group(['prefix'=>'/gv', 'middleware' => 'auth'],function(){
    Route::get('/logout', 'loginController@logout')->middleware('auth');
    Route::get('/lich-day-theo-tuan', 'gvController@index');
    Route::get('/lich-day-chi-tiet', 'gvController@lichdaychitiet');
    Route::get('/maps', 'gvController@maps');
});

Route::group(['prefix'=>'/sv', 'middleware' => 'auth'],function(){
    Route::get('/logout', 'loginController@logout');
    Route::get('/lich-hoc-theo-tuan', 'svController@index')->middleware('auth');
    Route::get('/lich-hoc-chi-tiet', 'svController@lichhocchitiet');
    Route::get('/lien-he-giang-vien', 'svController@lienhe');
    Route::get('/maps', 'svController@maps');
    Route::get('/lien-he-giang-vien/nam','svController@detailgv')->name('upload');
    Route::get('/lien-he-giang-vien/theme','svController@theme')->name('theme');
});

Route::get('/notifications/{slug}', ['as' => 'notifications.single', 'uses' => 'slugController@getSingle'])->where('slug', '[\w\d\-\_]+');
Route::get('/notifications-khtc/{slug}', ['as' => 'notifications.single', 'uses' => 'slugController@getSingleKhtc'])->where('slug', '[\w\d\-\_]+');
Route::get('/notifications-ttdn/{slug}', ['as' => 'notifications.single', 'uses' => 'slugController@getSingleTtdn'])->where('slug', '[\w\d\-\_]+');
Route::get('/notifications', 'slugController@getAll');
Route::get('/notifications/thu-thong-bao-ne-ok-chua-na/showview', 'slugController@countview')->name('showview');

//--------------------------------------
// Route::post('/upload')->return(view('upload'));
Route::get('/voice', function() {
    return view('notifications.testVoice');
});


