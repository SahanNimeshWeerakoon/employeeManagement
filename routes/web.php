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

//============================================================= FRONT END ROUTES ======================================================================
Route::get('/', function () {
    return view('welcome');
});
Route::get('team', 'PagesController@team');
Route::get('clients', 'PagesController@clients');
Route::get('about', 'PagesController@about');
Route::get('send/email', 'PagesController@randomPage');
Route::get('send/quotation', 'PagesController@randomPage');

Route::post('send/email', 'MailController@sendEmail');
Route::post('send/quotation', 'MailController@sendQuotation');

//============================================================= BACK END ROUTES ======================================================================
Route::get('/login', 'PagesController@home');
Route::post('/login', 'PostsController@login');
Route::get('/password/email', 'PagesController@randomPage');

// Employee
Route::get('/employeedashboard', 'PagesController@empDashboard');
Route::get('/requestleave', 'PagesController@requestLeave');
Route::get('/seetasks', 'PagesController@empTasks');
Route::get('/myperks', 'PagesController@myPerks');
Route::get('/markattendence/{id}', 'PagesController@randomPage');

Route::post('/requestleave', 'PostsController@requestLeave');
Route::post('/seetasks', 'PostsController@empTask');
Route::post('/markattendence/{id}', 'PostsController@markAttendence');

// Employer
Route::get('/search', 'PagesController@randomPage');
Route::get('/admindashboard', 'PagesController@adminDashboard');
Route::get('/addemployee', 'PagesController@addemployeeView');
Route::get('/adddepartment', 'PagesController@addDepartmentView');
Route::get('/addperk', 'PagesController@addPerkView');
Route::get('/addtask', 'PagesController@addTask');
Route::get('/leavecontrol', 'PagesController@leaveControl');
Route::get('/payroll', 'PagesController@Payroll');
Route::get('/seeattendence', 'PagesController@seeAttendence');
Route::get('/confirmleave/{id}', 'PagesController@randomPage');
Route::get('/rejectleave/{id}', 'PagesController@randomPage');
Route::get('/delete/{id}', 'PagesController@randomPage');
Route::get('/getdata', 'PagesController@randomPage');
Route::get('/employee/edit/{id}', 'PagesController@editEmployee');
Route::get('/seeattendence/month', 'PagesController@randomPage');
Route::get('/seeattendence/date', 'PagesController@randomPage');
Route::get('/paydetailssearch', 'PagesController@payDetailsSearch');
Route::get('/removedemployees', 'PagesController@removedEmployees');
Route::get('/viewDeleted/{id}', 'PagesController@viewDeleted');

Route::post('/search', 'PostsController@searchResult');
Route::post('/addemployee', 'PostsController@addEmployee');
Route::post('/adddepartment', 'PostsController@addDepartment');
Route::post('/addperk', 'PostsController@addPerk');
Route::post('/addtask', 'PostsController@addTask');
Route::post('/leavecontrol', 'PostsController@leaveControl');
Route::post('/payroll', 'PostsController@payroll');
Route::post('/seeattendence/month', 'PostsController@attendenceMonth');
Route::post('/seeattendence/date', 'PostsController@attendenceDate');
Route::post('/confirmleave/{id}', 'PostsController@confirmleave')->name('confirmleave');
Route::post('/rejectleave/{id}', 'PostsController@rejectleave')->name('rejectleave');
Route::delete('/delete/{id}', 'PostsController@delete');
Route::post('/getdata', 'PostsController@getData');
Route::put('/employee/edit/{id}', 'PostsController@editEmployee');
Route::post('/paydetailssearch', 'PostsController@payrollDetailsView');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// AJAX Controllers
Route::get('/test', 'AjaxdataController@test')->name('ajaxdata');
Route::get('ajaxdata/getdata', 'AjaxdataController@getdata')->name('ajaxdata.getdata');
Route::get('ajaxdata/getperks', 'AjaxdataController@getPerks')->name('ajaxdata.getperks');
Route::get('ajaxdata/gettasks', 'AjaxdataController@getTasks')->name('ajaxdata.gettasks');
Route::get('ajaxdata/getdeletedemployees', 'AjaxdataController@getDeletedEmployees')->name('ajaxdata.getdeletedemployees');
