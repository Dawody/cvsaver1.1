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



Route::get('/applicants','applicantcontroller@getall');
Route::get('/evaluations','evaluationcontroller@getall');
Route::post('/edit-eval','evaluationcontroller@get');
Route::post('/update-eval','evaluationcontroller@edit');
Route::post('/move-arch',"ArchiveController@movetoarch");
Route::get('/viewarch',"ArchiveController@view");

Route::post('/view-app','applicantcontroller@getapplicant');
Route::post('/app_info',"ArchiveController@app_info");
Route::post('/return',"ArchiveController@movefromarch");




//-------------------------------------------------------------------

//dawod's code

Route::get('/evaluation/starteva','EvaluationController@newevaluation');
Route::get('jobs/jobmanager',  'JobController@displayjobs');
Route::get('/jobs/addjob','JobController@addjob');
Route::post('/jobs/addjob','JobController@addjob');
Route::get('jobs/editjob/{job_id}','JobController@editjob');
Route::post('jobs/editjob/{job_id}','JobController@editjob');
Route::get('/jobs/disactivejob/{job_id}','JobController@disactivejob');
Route::get('/offers/offermanager','EvaluationController@display_app_offer');
Route::get('/offer/{response}/{app_id}','EvaluationController@getresponse');
Route::post('/offer/add/{app_id}','EvaluationController@addoffer');
Route::get('/offer/start_edit/{app_id}','EvaluationController@getoffer');
Route::post('/offer/edit/{app_id}','EvaluationController@editoffer');











Route::get('/alertrepeat','ApplicationController@alert');



Route::get('/Hrfun/jobsoptions',"JobController@addjob");
Route::post('/Hrfun/jobsoptions',"JobController@addjob");
Route::get('/Hrfun/jobsoptions2','JobController@hrdisplayjobs');
Route::post('/Hrfun/jobsoptions2','JobController@editjob_request');
Route::post('/Hrfun/editjob/{jid}','JobController@editjob');


Route::get('/ui/appform',"ApplicantController@newapplication");
Route::POST('/application/thanks','ApplicantController@applayrequenst');
Route::get('/ui/appjobs',"JobController@displayjobs");
Route::POST('/ui/appjobs',"JobController@displayjobs");
Route::get('/ui/description/{id}',"JobController@getjob");

Route::get('/offers','EvaluationController@get_app_offer');

Route::POST('/send_offers/{app_id}','EvaluationController@sendoffer');






































/*Route::get('/viewapp',"ApplicantController@view");
Route::post('/viewapp',"ApplicantController@view");
Route::get('/cv',"ApplicantController@cv");
Route::post('/cv',"ApplicantController@cv");
Route::get('/interview',"ApplicantController@interview");
Route::post('/interview',"ApplicantController@interview");
Route::get('/exam',"ApplicantController@exam");
Route::get('/xy',"ApplicantController@getall");
Route::post('/exam',"ApplicantController@exam");
Route::post('/add-eval',"EvaluationController@add");
//Route::get('/add-eval',"EvaluationController@add");
///app_info
Route::post('/app_info',"ArchiveController@app_info");
Route::post('/find-eval',"EvaluationController@find");
Route::post('/edit-eval',"EvaluationController@edit");
Route::post('/mveroarchive',"ArchiveController@all");
Route::get('/viewarch',"ArchiveController@view");
Route::get('/app_info',"ArchiveController@app_info");
Route::post('/delete_arch',"ArchiveController@delete");



Route::get('/evaluation/starteva','EvaluationController@newevaluation');
Route::get('jobs/jobmanager',  'JobController@displayjobs');
Route::get('/jobs/addjob','JobController@addjob');
Route::post('/jobs/addjob','JobController@addjob');
Route::get('jobs/editjob/{job_id}','JobController@editjob');
Route::post('jobs/editjob/{job_id}','JobController@editjob');
Route::get('/jobs/disactivejob/{job_id}','JobController@disactivejob');
Route::get('/offers/offermanager','EvaluationController@display_app_offer');
Route::get('/offer/{response}/{app_id}','EvaluationController@getresponse');
Route::post('/offer/add/{app_id}','EvaluationController@addoffer');
Route::get('/offer/start_edit/{app_id}','EvaluationController@getoffer');
Route::post('/offer/edit/{app_id}','EvaluationController@editoffer');

//___________________________________________________________________

Route::get('/soso/koko','EvaluationController@get_app_offer');
Route::get('/Hrfun/jobsoptions',"JobController@addjob");
Route::post('/Hrfun/jobsoptions',"JobController@addjob");
Route::get('/Hrfun/jobsoptions2','JobController@hrdisplayjobs');
Route::post('/Hrfun/jobsoptions2','JobController@hrdisplayjobs');
Route::get('/ui/appform',"ApplicantController@newapplication");
Route::POST('/application/thanks','ApplicantController@applayrequenst');
Route::get('/ui/appjobs',"JobController@displayjobs");
Route::POST('/ui/appjobs',"JobController@displayjobs");
Route::get('/ui/description/{id}',"JobController@getjob");*/


Auth::routes();


Route::get('/home', 'HomeController@index');
///////////////////////////////////
Route::get('/x123',"EvaluationController@getcv_ac");
