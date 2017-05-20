<?php

namespace App\Http\Controllers;

use App\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Array_;

class JobController extends Controller
{
    protected $table = ['id', 'name', 'description', 'active' , 'announcement_date', 'created_at', 'updated_at'];
    //


    public function addjob(Request $request){
        if($request->isMethod('post')){

            if(Job::where('name',$request->input('name'))->first() !=NULL) {

                $err_msg = "this Job is already existed\n You need to deactivate it first to add it again !";
                $arr=Array('msg'=>$err_msg);
                return view('/Hrfun/error',$arr);
            }





            $job = new Job();
            $job->name=$request->input('name');
            $job->description=nl2br($request->input('description'));
            $mytime = Carbon::now();
            $job->start=$request->input('start_graduation_year');
            $job->end=$request->input('end_graduation_year');
            $job->announcement_date=$mytime->toDateString();
            $job->active=true;
            $job->save();

        }

//        $mytime = Carbon::now();
//        echo $mytime;
//        echo $mytime->toDateString();

        $jobs = Job::all();
        $arr = array('jobs'=>$jobs);
        return view('/Hrfun/jobsoptions',$arr);
    }

    /*
    public function editjob(Request $request ,$job_id){
        $job = Job::where('job_id',$job_id)
            ->update(['name'=>$request->input('name')],
                ['description'=>$request->input('description')]);
        return $this->displayjobs();

    }
*/



//display all jobs and applicant choose one to read it's description
    public function displayjobs(){
        $jobs=Job::where('active',true)->get();
        $arr=array('jobs'=>$jobs);
        return view('/ui/appjobs',$arr);

    }



//display the job managment window for HR to add or edit jobs
    public function hrdisplayjobs(){
        $jobs=Job::where('active',true)->get();
        $arr=array('jobs'=>$jobs);
        return view('/Hrfun/jobsoptions',$arr);

    }



//get job from it's id
    public function getjob($id){
        $job = Job::where('id',$id)->get();
        $arr = array('jobs'=>$job);
        return view('/ui/description',$arr);

    }

//get the edit job page to add some modifications
    public  function editjob_request(Request $request){

        $jobs = Job::where('name',$request->input('job_name'))->get();
        $arr = array('jobs'=>$jobs);
        return view('Hrfun/editjob',$arr);
    }



//edit the job
    public function editjob(Request $request,$job_id){

//        if($request->isMethod('post')){

        echo $request->input('job_active');

        if($request->input('job_active')=="1")
            $act = false;
        else
            $act=true;

//            Job::find($job_id)
//                ->update([
//                        'description'=>$request->input('jdescription_edit'),
//                        'active'=>$act
//                ]);


        DB::table('jobs')
            ->where('id',$job_id)
            ->update([
               'description'=>$request->input('jdescription_edit'),
                'active'=>$act,
                'start'=>$request->input('edit_start_graduation_year'),
                'end'=>$request->input('edit_end_graduation_year')
            ]);





        return $this->hrdisplayjobs();
  //      }

  //      $job=Job::find($job_id)->get();
    //    $arr=array('job'=>$job);
       // return view('jobs.editjob',$arr);
//            return view('Hrfun/editjob',$arr);
    }





/*
    public function disactivejob($job_id){
        echo "start";
        echo $job_id;
        Job::where('id',$job_id)
            ->update(['active'=>false]);


        echo "done";
        return $this->displayjobs();
    }
*/






}
