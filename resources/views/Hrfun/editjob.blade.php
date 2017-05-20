<!DOCTYPE html>
<html>
<head>
  <title>Edit job</title>
  
<meta charset="UTF-8">


  <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Raleway:500italic,600italic,600,700,700italic,300italic,300,400,400italic,800,900' rel='stylesheet' type='text/css'>
        
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,300italic,400italic,600italic,700,900' rel='stylesheet' type='text/css'>
        
         <!-- Animate CSS -->
        <link rel="stylesheet"  href="{{ URL::asset('css/animate.css') }}">
        <!-- CSS -->
        <!--<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">-->
        <!--<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- CSS File-->
        <link rel="stylesheet"  href="{{ URL::asset('css/style.css') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".datepicker" ).datepicker();
  } );
  </script>
</head>
<body>

<div class="heading">
Edit Job
</div>

<!--code for edit job-->

{{--<div class="col-lg-12 col-sm-12">--}}
{{--<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo2">Click here to Edit Job</button>--}}
{{--<div id="demo2" class="collapse">--}}
<!--here we will iterate on jobs in our database if he want to edit one of them-->
    @foreach($jobs as $job)
    <form action="/Hrfun/editjob/{{$job->id}}" method="POST">
 {{ csrf_field()}}
  <div class="ui1">


<label for="jobdescriptionedit">Edit Job description</label>
      <div class="form-group">




    <textarea class="form-control" style="height: 300px" name="jdescription_edit"  >
        <?php
            $text = $job->description;
        $breaks = array("<br />","<br>","<br/>");
        $text = str_ireplace($breaks, "\n", $text);

            echo $text;
            ?>
    </textarea>
<br>
          <label class="label1" for="edit_start_graduation">Edit_Start_Graduation_Year</label>
          <select name="edit_start_graduation_year" required="please enter graduation_year">
              <option value="" selected>{{$job->start}} </option>


              @for( $i=1990;$i<2040;$i++)
                  {
                  <option value={{$i}}> {{$i}} </option>
                  }
              @endfor

          </select>
          <br> <br>
          <label class="label1" for="edit_end_graduation">Edit_End_Graduation_Year</label>
          <select name="edit_end_graduation_year" required="please enter graduation_year">
              <option value="" selected> {{$job->end}} </option>


              @for( $i=1990;$i<2040;$i++)
                  {
                  <option value={{$i}}> {{$i}} </option>
                  }
              @endfor

          </select>
          @endforeach

      </div>

<br>

{{--<label for="date of job">Edit Date of anuouncement</label>--}}
{{--<br>--}}
      {{----}}
         {{--<label class="label2" for="job_date">click to choose date</label>--}}
        {{--<input type="text" class="datepicker" name="job_date_edit" >           --}}
                {{--<br><br>--}}
                    <label for="edit job state">Edit job state</label>
  <label class="radio-inline">
      <input type="checkbox" name="job_active" value="1">deactivate</label>
  <br>
      <br>
    <button type="submit" name="job_submit_edit" class="btn btn-default">Click here to Edit job</button>
    <br> 

  </div>
  </form>
  {{--</div>--}}
    {{--</div>--}}
</body>
</html>