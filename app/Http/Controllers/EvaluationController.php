<?php

namespace App\Http\Controllers;

use App\Applicant;
use DB;
use Illuminate\Http\Request;
use App\Evaluation;
class EvaluationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function add (Request $request){
        if($request->isMethod('post')){
            $neweval=new evaluation();
            $neweval->cv_notes=$request->input('cv-notes');
            $neweval->cv_result=$request->input('cv-result');
            $neweval->english=$request->input('english');
            $neweval->iq=$request->input('iq');
            $neweval->technical=$request->input('technical');
            $neweval->exam_result=$request->input('exam-result');
            $neweval->interview_notes=$request->input('interview_notes');
            $neweval->interview_result=$request->input('interview-result');
            $neweval->degree=$request->input('degree');
            $neweval->offer=$request->input('offer');
            $neweval->response=$request->input('response');
            $neweval->refuse=$request->input('refuse');
            $neweval->app_id=$request->input('id');
            $neweval->save();
            return redirect("viewapp");
        }
        else
            return view('applicants.add');
    }

    public function edit (Request $request)
    {
        $evaluation=evaluation::where('app_id','=',$request->input('app_id'))->first();
        $evaluation->cv_notes=$request->input('cv_notes');
        $evaluation->cv_result=$request->input('cv_result');
        $evaluation->english=$request->input('english');
        $evaluation->iq=$request->input('iq');
        $evaluation->technical=$request->input('technical');
        $evaluation->exam_result=$request->input('exam_result');
        $evaluation->interview_notes=$request->input('interview_notes');
        $evaluation->interview_result=$request->input('interview_result');
        $evaluation->degree=$request->input('degree');
        $evaluation->offer=$request->input('offer');
        $evaluation->response=$request->input('response');
        $evaluation->refuse=$request->input('refuse');
        $evaluation->save();
        $evaluations=evaluation::where('app_id','=',$request->input('app_id'))->first();
        if($evaluations->cv_result==1)
            $evaluations->cv_result='Accepted';
        else if($evaluations->cv_result==2)
            $evaluations->cv_result='Rejected';
        else $evaluations->cv_result='N|A';

        if($evaluations->exam_result==1)
            $evaluations->exam_result='Passed';
        else if($evaluations->exam_result==2)
            $evaluations->exam_result='Failed';
        else $evaluations->exam_result='N|A';

        if($evaluations->interview_result==1)
            $evaluations->interview_result='Accepted';
        else if($evaluations->interview_result==2)
            $evaluations->interview_result='Rejected';
        else $evaluations->interview_result='N|A';
        $applicant= applicant::where('id','=',$evaluations->app_id)->get()->first();
        $evaluations->email=$applicant->email;
        $evaluations->first=$applicant->first;
        $evaluations->last=$applicant->last;
        return view('applicants.add',array('applicant'=>$evaluations));
    }
    //get an evaluation by the id of the applicant
    public function get(Request $request){
        $evaluations=evaluation::where('app_id','=',$request->input('app_id'))->first();
        if($evaluations->cv_result==1)
            $evaluations->cv_result='Accepted';
        else if($evaluations->cv_result==2)
            $evaluations->cv_result='Rejected';
        else $evaluations->cv_result='N|A';

        if($evaluations->exam_result==1)
            $evaluations->exam_result='Passed';
        else if($evaluations->exam_result==2)
            $evaluations->exam_result='Failed';
        else $evaluations->exam_result='N|A';

        if($evaluations->interview_result==1)
            $evaluations->interview_result='Accepted';
        else if($evaluations->interview_result==2)
            $evaluations->interview_result='Rejected';
        else $evaluations->interview_result='N|A';
        $applicant= applicant::where('id','=',$evaluations->app_id)->get()->first();
        $evaluations->email=$applicant->email;
        $evaluations->first=$applicant->first;
        $evaluations->last=$applicant->last;
        return view('applicants.add',array('applicant'=>$evaluations));
    }
    public static function geteval(Request $request){
        $evaluations=evaluation::where('app_id','=',$request->input('applicant_id'))->first();
       return $evaluations;
    }
    //get all of the evaluations
    public static function getall(Request $request){
        $evaluation=evaluation::all()->sortBy('app_id');
        foreach($evaluation as $evaluations){
            if($evaluations->cv_result==1)
                $evaluations->cv_result='Accepted';
            else if($evaluations->cv_result==2)
                $evaluations->cv_result='Rejected';
            else $evaluations->cv_result='N|A';

            if($evaluations->exam_result==1)
                $evaluations->exam_result='Passed';
            else if($evaluations->exam_result==2)
                $evaluations->exam_result='Failed';
            else $evaluations->exam_result='N|A';

            if($evaluations->interview_result==1)
                $evaluations->interview_result='Passed';
            else if($evaluations->interview_result==2)
                $evaluations->interview_result='Failed';
            else $evaluations->interview_result='N|A';
            $applicant= applicant::where('id','=',$evaluations->app_id)->get()->first();
            $evaluations->email=$applicant->email;
            $evaluations->first=$applicant->first;
            $evaluations->last=$applicant->last;
        }

        $arr=Array('applicant'=>$evaluation);
        return view('applicants.evaluation',$arr);

        //echo $evaluation;
    }

   // ----------------------------------------stages------------------

    public static function delete(Request $request){

        $evaluations=evaluation::where('app_id',$request->input('applicant_id'))->first();
        $evaluations->delete();


    }


    //--------------------------------------------------------





    public function get_app_offer(){


        //this code in comments below has no importance
        /*
        $applys =collect([]);
        $apps=collect([]);
        $jobs=collect([]);

        //get all evaluations that pass interview stage
        $evals = Evaluation::where('interview_result',true)->get();


        //get all applicants who own the previous evaluations
        foreach ($evals as $eval){
            $apps->push(Applicant::where('id',$eval->app_id)->first());
        }

        //get the jobs of the previous applicants
        foreach ($apps as $app){
          $apply=  Applay::where('app_id',$app->id)->first();
          $jobs->push(Job::where('id',  $apply->job_id  )->first());
        }



        $apps_arr=array('apps'=>$apps);


                $jobs_arr=array('jobs'=>$jobs);

        foreach ( $jobs as $job)
        {
            echo $job."|_________ ____|\n\n";}

     //   return view('Hrfun/offers',);


        echo "____________________________________________________________
        __________________________________________________________________
        ______________________________________________________________\n\n";


*/

        $tab = DB::table('evaluations')
            ->join('applicants' , 'applicants.id' ,'=', 'evaluations.app_id')
            ->join('applays' , 'applays.app_id' ,'=','applicants.id')
            ->join('jobs' ,'jobs.id' ,'=','applays.job_id')
            ->where('evaluations.interview_result' , '=' ,true)
            ->select('applicants.first','applicants.last','jobs.name','evaluations.id')
            ->get();

        $arr=array('data'=>$tab);
        return view('/Hrfun/offers',$arr);

        //echo $tab;


    }

    public  function sendoffer(Request $request , $eval_id){
        //the offer from the request
        $offerdata = $request->input('offer_description'.$eval_id);

        DB::table('evaluations')
            ->where('id',$eval_id)
            ->update(['offer' => $offerdata]);

        return $this->get_app_offer();
    }

    public function edit_offer_page(){



        $tab = DB::table('evaluations')
            ->join('applicants' , 'applicants.id' ,'=', 'evaluations.app_id')
            ->join('applays' , 'applays.app_id' ,'=','applicants.id')
            ->join('jobs' ,'jobs.id' ,'=','applays.job_id')
            ->where('evaluations.interview_result' , '=' ,true)
            ->select('applicants.first','applicants.last','jobs.name','evaluations.*')
            ->get();

        $arr=array('data'=>$tab);

        return view('/Hrfun/app_offers',$arr);
    }


    public function edit_offer(Request $request ,$eval_id){

        DB::table('evaluations')
            ->where('id',$eval_id)
            ->update(['offer' => nl2br($request->input('edit_offer_description'.$eval_id))]);

        return $this->edit_offer_page();
    }

    public function edit_response(Request $request ,$eval_id){

        if ($request->input('response_state'.$eval_id)=="Accepted")
            $respo=1;
        elseif($request->input('response_state'.$eval_id)=="Rejected")
            $respo=2;
        else
            $respo=0;


        DB::table('evaluations')
            ->where('id',$eval_id)
            ->update(['response' => $respo]);

        return $this->edit_offer_page();

    }

    public function edit_refuse(Request $request ,$eval_id){

        DB::table('evaluations')
            ->where('id',$eval_id)
            ->update(['refuse' => $request->input('refuse_reason'.$eval_id)]);

        return $this->edit_offer_page();
    }

    public function newevaluation($app_id){

        $eval = new Evaluation();
        $eval->cv_notes="";
        $eval->cv_result=false;
        $eval->english=0;
        $eval->iq=0;
        $eval->technical=0;
        $eval->exam_result=false;
        $eval->interview_notes="";
        $eval->interview_result=false;
        $eval->degree=0;
        $eval->offer="";
        $eval->response="0";
        $eval->refuse="";
        $eval->app_id=$app_id;
        $eval->save();
        //    $last_id = $eval->id;
//        return $last_id;

        //      return view('/evaluation.starteva');
    }


}



















//--------------------------------------------------------------


