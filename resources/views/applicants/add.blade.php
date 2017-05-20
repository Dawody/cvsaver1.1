@extends('layouts.template')



@section('head')
    <style>
        body{
            /*background: image();*/
        }
        #evaluate{
            margin-top:60px;
            background-color: white;
        }
        .notes{
        }
    </style>
@endsection
@section('content')
<div class="container ">
    <div class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3" id="evaluate">
        <form method="post" action="/update-eval">
            {{csrf_field()}}
            <div class="form-group">
                <label for="cv_notes">cv notes:</label>
                <textarea name="cv_notes" class="form-control notes">{{$applicant->cv_notes}}</textarea>
            </div>
            <div class="form-group">
                <label for="cv_result">cv result:</label>
                <select name="cv_result" class="form-control">
                    <option value="1"
                    @if($applicant->cv_result=='Accepted')
                        {{'selected'}}
                            @endif
                    >Accepted</option>
                    <option value="2"
                    @if($applicant->cv_result=='Rejected')
                        {{'selected'}}
                            @endif
                    >Rejected</option>
                    <option value="0"
                    @if($applicant->cv_result=='N|A')
                        {{'selected'}}
                            @endif
                    >N/A</option>
                </select>
            </div>
            <div class="form-group">
                <label for="english">english exam result:</label>
                <input name="english" type="number" class="form-control" value={{$applicant->english}}>
            </div>
            <div class="form-group">
                <label for="iq">english exam result:</label>
                <input name="iq" type="number" class="form-control" value={{$applicant->iq}}>
            </div>
            <div class="form-group">
                <label for="technical">english exam result:</label>
                <input name="technical" type="number" class="form-control" value={{$applicant->technical}}>
            </div>

            <div class="form-group">
                <label for="exam_result">exam result:</label>
                <select name="exam_result" class="form-control">
                    <option value="2"
                    @if($applicant->exam_result=='Passed')
                        {{'selected'}}
                            @endif
                    >Accepted</option>
                    <option value="1"
                    @if($applicant->exam_result=='Failed')
                        {{'selected'}}
                            @endif
                    >Rejected</option>
                    <option value="0"
                    @if($applicant->exam_result=='N|A')
                        {{'selected'}}
                            @endif
                    >N/A</option>
                </select>
            </div>
            <div class="form-group">
                <label for="interview_notes">interview notes:</label>
                <textarea name="interview_notes" class="form-control">{{$applicant->interview_notes}}</textarea>
            </div>
            <div class="form-group">
                <label for="interview_result">interview result:</label>
                <select name="interview_result" class="form-control">
                    <option value="2"
                    @if($applicant->interview_result=='Accepted')
                        {{'selected'}}
                            @endif
                    >Accepted</option>
                    <option value="1"
                    @if($applicant->interview_result=='Rejected')
                        {{'selected'}}
                            @endif
                    >Rejected</option>
                    <option value="0"
                    @if($applicant->interview_result=='N|A')
                        {{'selected'}}
                            @endif
                    >N/A</option>
                </select>
            </div>
            <div class="form-group">
                <label for="degree">degree:</label>
                <input name="degree" type="number" class="form-control" value= {{$applicant->degree}}>
            </div>
            <div class="form-group">
                <input name="app_id" type="hidden" class="form-control" value={{$applicant->app_id}}>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>
@endsection