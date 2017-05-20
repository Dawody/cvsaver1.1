<?php

namespace App\Http\Controllers;

use App\Applay;

use Carbon\Carbon;
use Illuminate\Http\Request;

class ApplayController extends Controller
{
    public static function get_id($applicant_id){
    $job_id=Applay::where('app_id','=',$applicant_id)->get()->first();
    return $job_id['job_id'];}

    public static function get_date($applicant_id){
        $job_id=Applay::where('app_id','=',$applicant_id)->get()->first();
        return $job_id['date'];}

    public static function delete($applicant_id){
        $job=Applay::where('app_id','=',$applicant_id)->get()->first;
        $job->delete();
    }

    public function newapplay($app_id, $job_id){
        $aply = new Applay();
        $aply->app_id=$app_id;
        $aply->job_id=$job_id;
        $mytime = Carbon::now();
        $aply->date=$mytime->toDateString();
        $aply->save();
        return $aply->id;


    }

}
