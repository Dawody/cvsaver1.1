<?php

namespace App\Http\Controllers;

use App\archive;
use App\applicant;
use App\applay;
use App\evaluation;
use App\job;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function delete(Request $request){

        $archives=archive::where('id',$request->input('applicant_id'))->first();
        $archives->delete();
        return redirect("viewarch");

    }
    public function view (){
        $archive=archive::all();
        foreach($archive as $applicant){
            if($applicant->cv_result==1)
                $applicant->cv_result='Accepted';
            else if($applicant->cv_result==2)
                $applicant->cv_result='Rejected';
            else $applicant->cv_result='N/A';

            if($applicant->exam_result==1)
                $applicant->exam_result='Passed';
            else if($applicant->exam_result==2)
                $applicant->exam_result='Failed';
            else $applicant->exam_result='N/A';

            if($applicant->interview_result==1)
                $applicant->interview_result='Passed';
            else if($applicant->interview_result==2)
                $applicant->interview_result='Failed';
            else $applicant->interview_result='N/A';
        }
        $arr=Array('archive'=>$archive);
        return view('archive.archive',$arr);
    }
    //////////////////////////////
    public function app_info (Request $request){

        $applicant = archive::where('id',$request->input('id'))->first();
        if($applicant->cv_result==1)
            $applicant->cv_result='Accepted';
        else if($applicant->cv_result==2)
            $applicant->cv_result='Rejected';
        else $applicant->cv_result='N/A';

        if($applicant->exam_result==1)
            $applicant->exam_result='Passed';
        else if($applicant->exam_result==2)
            $applicant->exam_result='Failed';
        else $applicant->exam_result='N/A';

        if($applicant->interview_result==1)
            $applicant->interview_result='Passed';
        else if($applicant->interview_result==2)
            $applicant->interview_result='Failed';
        else $applicant->interview_result='N/A';
        return view('archive.applicant_info',compact('applicant'));
    }
    //////////////////////////////////////////
    public function movetoarch(Request $request){


        $narchive=new archive();
        $narchive->first_name= ApplicantController::get($request)['first'];
        $narchive->last_name= ApplicantController::get($request)['last'];
        $narchive->email= ApplicantController::get($request)['email'];
        $narchive->nationality= ApplicantController::get($request)['nation'];
        $narchive->relagion= ApplicantController::get($request)['religion'];
        $narchive->gender= ApplicantController::get($request)['gender'];
        $narchive->birth_date= ApplicantController::get($request)['bod'];
        $narchive->phone= ApplicantController::get($request)['phone'];
        $narchive->address= ApplicantController::get($request)['address'];
        $narchive->military= ApplicantController::get($request)['military'];
        $narchive->years_experience= ApplicantController::get($request)['yoe'];
        $narchive->university= ApplicantController::get($request)['university'];
        $narchive->faculty= ApplicantController::get($request)['faculty'];
        $narchive->department= ApplicantController::get($request)['department'];
        $narchive->gpa= ApplicantController::get($request)['gpa'];
        $narchive->graduation_year= ApplicantController::get($request)['graduation_year'];
        $narchive->cv= ApplicantController::get($request)['cv'];

        ///////////////////////////////////
        $narchive->cv_notes= EvaluationController::geteval($request)['cv_notes'];
      $narchive->cv_result= EvaluationController::geteval($request)['cv_result'];
        $narchive->english= EvaluationController::geteval($request)['english'];
        $narchive->iq= EvaluationController::geteval($request)['iq'];
        $narchive->exam_result= EvaluationController::geteval($request)['exam_result'];
        $narchive->technical= EvaluationController::geteval($request)['technical'];
        $narchive->interview_notes= EvaluationController::geteval($request)['interview_notes'];
        $narchive->interview_result= EvaluationController::geteval($request)['interview_result'];
        $narchive->degree= EvaluationController::geteval($request)['degree'];
        $narchive->offer= EvaluationController::geteval($request)['offer'];
        $narchive->response= EvaluationController::geteval($request)['response'];
        $narchive->refuse= EvaluationController::geteval($request)['refuse'];
       $narchive->date=ApplayController::get_date($request->input('applicant_id'));
        $narchive->job_id= ApplayController::get_id($request->input('applicant_id'));//call get job id from applay
        $narchive->save();


        EvaluationController::delete($request);
      ApplayController::delete($request->input('applicant_id'));
       ApplicantController::delete($request);
        return redirect("applicants");
    }
    public function movefromarch(Request $request){
        $archive=Archive::where('id','=',$request->input('id'))->first();
        $app = new Applicant();
        $app->first=$archive->first_name;
        $app->last=$archive->last_name;
        $app->gender=$archive->gender;
        $app->nation=$archive->nationality;
        $app->bod=$archive->birth_date;
        $app->religion=$archive->relagion;
        $app->phone=$archive->phone;
        $app->email=$archive->email;
        $app->address=$archive->address;
        $app->military=$archive->military;
        $app->yoe=$archive->years_experience;
        $app->university=$archive->university;
        $app->faculty=$archive->faculty;
        $app->department=$archive->department;
        $app->gpa=$archive->gpa;
        $app->graduation_year=$archive->graduation_year;
        $app->cv=$archive->cv;
        $app->save();
        $apply=new Applay();
        $apply->date=$archive->date;
        $apply->app_id=$app->id;
        $apply->job_id=$archive->job_id;
        $apply->save();
        $eval =new evaluation();
        $eval->cv_notes= $archive->cv_notes;
        $eval->cv_result= $archive->cv_result;
        $eval->english= $archive->english;
        $eval->iq= $archive->iq;
        $eval->app_id=$app->id;
        $eval->technical= $archive->technical;
        $eval->cv_notes= $archive->cv_notes;
        $eval->exam_result= $archive->exam_result;
        $eval->interview_notes= $archive->interview_notes;
        $eval->interview_result= $archive->interview_result;
        $eval->degree= $archive->degree;
        $eval->offer= $archive->offer;
        $eval->response= $archive->response;
        $eval->refuse= $archive->refuse;
        $eval->save();
        $archive->delete();
        return redirect("viewarch");
    }
}
