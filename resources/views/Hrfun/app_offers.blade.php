<!DOCTYPE html>
<html>
<head>
  <title>Applicant' Offer</title>
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
<body>

  <div class="heading">
Applicants with offers
</div>
<div class="ui2">
        {{--<div class="col-md-12 col-lg-12 col-xs-12 col-xl-12" style="border-style: double;">--}}
        <div id="mytable">
            <table id="example" class="display table" cellspacing="0">
                <thead>
                <tr>
       <th>Applicant Name</th>
       <th>Job</th>
       {{--<th>Show Offer</th>--}}
    <th>Edit Offer</th>
    <th>Show response</th>
    <th>State of response </th>
    <th> Enter Reason of refuse </th>
    <th> View Reason of refuse </th>

                </tr>
                </thead>
                <tfoot>
                <tr>
      <th>Applicant Name</th>
      <th>job</th>
      {{--<th>""</th>--}}
    <th>""</th>
    <th>""</th>
    <th>""</th>
    <th>""</th>
    <th>""</th>

                </tr>
                </tfoot>
                <tbody>





                {{--_________________________________________________________--}}








  @foreach($data as $row)

   <tr>
    <td>{{$row->first}} {{$row->last}}</td>
    <td>{{$row->name}}</td>

       {{--____________||||||||||||||||||||||||||||||||||||||______________________--}}


       {{--<form action="{{'/editoffer'.$row->id}}" method="post">--}}
{{--{{ csrf_field()}}--}}
           {{--<td>--}}
{{----}}
{{--<button type='button' class='btn btn-info' style="width:100%; height:40px; font-style: normal; font-size: medium;" data-toggle='collapse' data-target="#edit_offer{{$row->id}}">Edit offer</button>--}}
{{--<div id="edit_offer{{$row->id}}" class='collapse'>--}}
{{----}}
  {{--<div class="ui1">--}}
{{----}}
{{--<label for="offer">Edit Offer</label>--}}
{{----}}
 {{--<div class="form-group">--}}
    {{--<textarea class="form-control"  name="{{'edit_offer_description'.$row->id}}">{{$row->offer}}</textarea>--}}
{{--</div>--}}
{{--<br>--}}
    {{--<button type="submit" name="edit_offer" class="btn btn-default">Send</button>--}}
    {{--<br> --}}
{{----}}
  {{--</div>--}}
  {{--</div>--}}
           {{--</td>--}}
{{----}}
{{--</form>--}}

       {{--____________||||||||||||||||||||||||||||||||||||||______________________--}}




       <form action="{{'/editoffer'.$row->id}}" method="post">
           {{ csrf_field()}}

           <td>

<button type='button' class='btn btn-info btn-lg' style="width:100%; height:40px; font-style: normal; font-size: medium;" data-toggle='modal' data-target="#show_offer{{$row->id}}">Show Offer</button>

<div id="show_offer{{$row->id}}" class='modal fade' role='dialog'>


<!-- Trigger the modal with a button -->

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss='{{"show offer".$row->id}}'></button>
        <h4 class="modal-title">Sent Offer</h4>
      </div>
      <div class="modal-body">

         <textarea class="form-control" style="height: 300px" name="edit_offer_description{{$row->id}}">
        <?php



             $text =$row->offer;
             $breaks = array("<br />","<br>","<br/>");
             $text = str_ireplace($breaks, "\n", $text);

             echo $text;
             ?>
    </textarea>
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="edit_offer" class="btn btn-default">Send</button>
      </div>
    </div>

  </div>
</div>
 
 </td>
       </form>

<td>

<button type='button' class='btn btn-info btn-lg' style="width:100%; height:40px; font-style: normal; font-size: medium;" data-toggle='modal' data-target='#show_response{{$row->id}}'>Show Response</button>

<div id='show_response{{$row->id}}' class='modal fade' role='dialog'>


<!-- Trigger the modal with a button -->

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss='{{"show response".$row->id}}'></button>
        <h4 class="modal-title">show response</h4>
      </div>
      <div class="modal-body">
          <p>
          @if($row->response==0)
                NO RESPONSE
          @elseif($row->response=='1')
                OFFER ACCEPTED
          @elseif($row->response==2)
                OFFER REFUSED
          @endif



        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
 
 </td>
       {{--____________||||||||||||||||||||||||||||||||||||||______________________--}}

       <form action="/edit_response{{$row->id}}" method="POST">
{{ csrf_field()}}
<td>
<button type='button' class='btn btn-info' style="width:100%; height:40px; font-style: normal; font-size: medium;" data-toggle='collapse' data-target='#enter_response{{$row->id}}'>Edit Response</button>
<div id='enter_response{{$row->id}}' class='collapse'>

  {{--<div class="ui1">--}}
 <div class="ui1">
<label for="response">select response state</label>
<select required="please enter respnse state" name="response_state{{$row->id}}">
  <option selected="choose response" value="">choose response</option>
  <option value="Accepted">Accepted</option>
  <option value="Rejected">Rejected</option>
  <option value="No response">No response</option>

</select>
<br>
<br>
    <button type="submit" name="respons_state" class="btn btn-default">Send</button>
<br>
</div>
</div>
 </td>
</form>

       {{--____________||||||||||||||||||||||||||||||||||||||______________________--}}

       <form action="/edit_refuse/{{$row->id}}" method="POST" >
{{ csrf_field()}}

<td>

<button type='button' class='btn btn-info' style="width:100%; height:40px; font-style: normal; font-size: medium;"  data-toggle='collapse' data-target='#enter_refuse{{$row->id}}'>Enter Refuse</button>
<div id='enter_refuse{{$row->id}}' class='collapse'>

  <div class="ui1">

<label for="refuse">Enter Refuse Reason</label>

 <div class="form-group">
    <textarea class="form-control" name="refuse_reason{{$row->id}}" placeholder="Write reason"  required="plese enter reason"></textarea>
</div>
<br>
    <button type="submit" name="refuse" class="btn btn-default">Send</button>
    <br> 

  </div>
  </div>
 </td>
</form>



       {{--____________||||||||||||||||||||||||||||||||||||||______________________--}}








 <td>

<button type='button' class='btn btn-info btn-lg' style="width:100%; height:40px; font-style: normal; font-size: medium;" data-toggle='modal' data-target='#show_refuse{{$row->id}}'>Show Refuse</button>

<div id='show_refuse{{$row->id}}' class='modal fade' role='dialog'>";

?>
<!-- Trigger the modal with a button -->

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss='{{"show refuse".$row->id}}'></button>
        <h4 class="modal-title">Refuse reason</h4>
      </div>
      <div class="modal-body">
        <p>{{$row->refuse}}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
 
 </td>


   </tr>
   @endforeach



                {{--_____________________________________________________________--}}
</tbody>
            </table>
        </div>
        {{--</div>--}}
         </div>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script>
//            $(document).ready(function() {
//                $('#example').DataTable( {
//                    "paging":   false,
//                    "ordering": true,
//                    "info":     false,
//                    "searching": true,
//                    "ordering": false
//                } );
//            } );
            $(document).ready(function() {
                // Setup - add a text input to each footer cell
                $('#example tfoot th').each( function () {
                    var title = $(this).text();
                    $(this).html( '<input style=" width:60px"type="text" placeholder='+title+' />' );
                } );

                // DataTable
                var table = $('#example').DataTable(
                    {
                        "paging":   false,
                        "info": false
                    }
                );

                // Apply the search
                table.columns().every( function () {
                    var that = this;

                    $( 'input', this.footer() ).on( 'keyup change', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );
                } );
            } );
        </script>
    </body>
</html>







