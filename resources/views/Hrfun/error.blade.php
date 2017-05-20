
<!DOCTYPE html>
<html>
<head>
	<title>Error</title>
		<meta charset="UTF-8">

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
        <meta charset=utf-8>
        <meta content="IE=edge" http-equiv=X-UA-Compatible>
        <meta content="width=device-width,initial-scale=1" name=viewport>
        {{--<link rel="stylesheet" type="text/css" href="css/bootstrap.css">--}}
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
        <style>
            td{
                text-align: center;
            }
            thead th{
                color: black;
            }
            tfoot th{
                color:black;
            }
        </style>
        {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
        {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>--}}
        {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
</head>
<body style="background-color: white;">
<div class="heading">
  OOOPS ERROR!!!!
</div>
<div class="container">

  <div class="col-md-12 col-lg-12 col-xs-12 col-xl-12">

      <p style="font-family: bold; font-size:50px; text-align: center; color:red;">{{$msg}}</p>

  </div>
</div>
</body>
</html>