<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Array_;
use App\Applicant;
use App\Job;
use App\Evaluation;
use App\Applay;
use Illuminate\Support\Facades\Storage;
use File;

class ApplicantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //delete an applicant
    public static function delete(Request $request){

        $applicants=Applicant::where('id',$request->input('applicant_id'));
        $applicants->delete();



    }

    public function delete_applicant_apply_eval(Request $request){
        $app_id = $request->input('app_id');
        ApplayController::delete($app_id);
        EvaluationController::delete($request);

        self::delete($request);
        return self::alert();


    }


    //get all the applicants data
    public function getall()
    {
        $applicant = DB::table('applicants')
            ->join('applays', 'applicants.id', '=', 'applays.app_id')
            ->join('jobs', 'applays.job_id', '=', 'jobs.id')
            ->select('applicants.*','jobs.name')
            ->get();
      //  echo $applicant;
        $arr=Array('applicant'=>$applicant);
      return view('applicants.view',$arr);
    }
    //get all the applicants in a set of ids
    public static function getall_id($id){
        $applicant = DB::table('applicants')
            ->join('applays', 'applicants.id', '=', 'applays.app_id')
            ->join('jobs', 'applays.job_id', '=', 'jobs.id')
            ->select('applicants.*','jobs.name')
            ->get();
        $arr=Array('applicant'=>$applicant);
        return $arr;
    }
    ////////////////
    public static function get(Request $request){
        $applicant=Applicant::where('id',$request->input('applicant_id'))->get()->first();
        return $applicant;
    }

    public function getapplicant(Request $request){
        $applicant=Applicant::where('id',$request->input('app_id'))->get()->first();
       echo "HELLO";
        return view('applicants.applicant_info',compact('applicant'));
    }

    //get an applicant by his id (post)
    public static function get_id(Request $request){

        $applicant = DB::table('applicants')
            ->join('applays', 'applicants.id', '=', 'applays.app_id')
            ->join('jobs', 'applays.job_id', '=', 'jobs.id')
            ->select('applicants.*','jobs.name')
            ->get()->first();
        $arr=Array('applicant'=>$applicant);
    }




    //----------------------------------------------------------------------


    public  function applayrequenst(Request $request){

        //create new applicant

        $app = new Applicant();
        $app->first=$request->input('first_name');
        $app->last=$request->input('last_name');
        $app->gender=$request->input('gender');
        $app->nation=$request->input('nationality');
        $brthdate =$request->input('birth_date');
        $mm=substr($brthdate,0,2);
        $dd=substr($brthdate,3,2);
        $yyyy=substr($brthdate,6,4);
        $date=$yyyy."-".$mm."-".$dd;
        $app->bod=$date;
        $app->religion=$request->input('religion');
        $app->phone=$request->input('phone');
        $app->email=$request->input('email');
        $app->address=$request->input('address');
        $app->military=$request->input('military');
        $app->yoe=2;//$request->input('experience_year');
        $app->university=$request->input('university');
        $app->faculty=$request->input('faculty');
        $app->department=$request->input('department');
        $app->gpa=$request->input('gpa');
        $app->graduation_year=$request->input('graduation_year');
        $uniqueFileName ='new.pdf';
        $app->cv=$uniqueFileName;
        $app->save();


        // prepare the CV

        $file = $request->file('upload_file');
        $file->move(storage_path('app') , $uniqueFileName);
        Storage::move('new.pdf',$app->id.'.pdf');
        Applicant::where('cv','new.pdf')->update(['cv' => $app->id.'.pdf']);


        // applicant apply for the job

        $app_id=$app->id;
        $job = Job::where('name',$request->input('job_name'))->first();
        $job_id=$job->id;
        app('App\Http\Controllers\ApplayController')->newapplay($app_id,$job_id);



        app('App\Http\Controllers\EvaluationController')->newevaluation($app_id);



        //thanks
        return view('/ui/thank');
    }
    public function alert(){


//        select email, count(*) as c from table
//group by email having c > 1
//order by c desc
//________________________________________________________________________-------------
//        $users = DB::table('users')
//            ->select(DB::raw('count(*) as user_count, status'))
//            ->where('status', '<>', 1)
//            ->groupBy('status')
//            ->get();
////___________________________________-------------------------__________________________-----------



        $rep = DB::table('applicants')
            ->select(DB::raw('count(*) as app_count ,email'))
            ->groupby('email')
            ->get();



        $tab=collect();
        foreach ($rep as $r)
        {
//            echo $tab;
            if($r->app_count >1) {
                $mail = $r->email;

                $tab->push(DB::table('applicants')
                    ->join('applays', 'applays.app_id', '=', 'applicants.id')
                    ->join('jobs', 'jobs.id', '=', 'applays.job_id')
                    ->select('first', 'last', 'name', 'applicants.id')
                    ->where('email','=',$mail)
                    ->get());
            }

        }
//
//        $tab =DB::table('applicants')
//            ->join('applays', 'applays.app_id', '=', 'applicants.id')
//            ->join('jobs', 'jobs.id', '=', 'applays.job_id')
//            ->select('first', 'last', 'name', 'applicants.id')
//            ->where('email','=',$mail)
//            ->get();






//            echo $tab;





        $arr=array('data'=>$tab);
        return view('/Hrfun/alert',$arr);

    }
    public function newapplication(){
        $jobs = Job::all();
        $arr = array('jobs'=>$jobs);

        return view('/ui/appform',$arr);
    }



}
