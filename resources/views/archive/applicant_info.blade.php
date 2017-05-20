@extends('layouts.template')


@section('head')
    <style>
        #example{
            border: 1px solid black;
            width: 100%;
        }
        th, td {
            text-align: center;
            border: 1px solid black;
        }
        td{
            word-break: break-all;
        }
        body{
            background-image:url("{{URL::asset('/images/11.jpg')}}")
        }
        tfoot {
            display: table-header-group;
        }
        .info_table{
            background-color: white;
        }
    </style>
@endsection
@section('content')
    <body>
    <div class="container">
        <div class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 info_table">
            <table id="example" class="" cellspacing="0">
                <tbody>
                <tr>
                    <td>name</td>
                    <td>{{$applicant->first}} {{$applicant->last}}</td>
                </tr>
                <tr>
                    <td>gender</td>
                    <td>{{$applicant->gender}}</td>
                </tr>
                <tr>
                    <td>nationality</td>
                    <td>{{$applicant->nation}}</td>
                </tr>
                <tr>
                    <td>birth date</td>
                    <td>{{$applicant->birth_date}}</td>
                </tr>
                <tr>
                    <td>religion</td>
                    <td>{{$applicant->relagion}}</td>
                </tr>
                <tr>
                    <td>phone</td>
                    <td>{{$applicant->phone}}</td>
                </tr>
                <tr>
                    <td>email</td>
                    <td>{{$applicant->email}}</td>
                </tr>
                <tr>
                    <td>address</td>
                    <td>{{$applicant->address}}</td>
                </tr>
                <tr>
                    <td>military status</td>
                    <td>{{$applicant->military}}</td>
                </tr>
                <tr>
                    <td>years of experience</td>
                    <td>{{$applicant->years_experience}}</td>
                </tr>
                <tr>
                    <td>university</td>
                    <td>{{$applicant->university}},{{$applicant->faculty}},{{$applicant->department}}</td>
                </tr>
                <tr>
                    <td>graduation year</td>
                    <td>{{$applicant->graduation_year}}</td>
                </tr>
                <tr>
                    <td>cv</td>
                    <td><a href={{$applicant->cv}}><img class="icon icons8-File" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAA20lEQVRIS+2X8Q1BQQyHv7eBEWzABtjABoxgA2xiE2zABmxgA9LES5C79HdUHsk1ef/17ru2v6Z9DR1Z0xGXHLgHDAofdQQu6pkceAxs1UvufgdgosI98Bk4CQ8YlcI98BpYCeDrg48UeSTYamxm2nDhkeA9MAV2CjwSbFrYANYRC6/mkeCcFJI6iQJb+73aHJgBXwWnorVuWFZwm5qoGtdUWwaquJ50UMXVpqPdQNR5XNvpf9vJhruy7KVq3Afse2ssCnue61IEtvVl6F6pOSSz9nO/MFosH3jdAM/nax9XTAbTAAAAAElFTkSuQmCC" width="30" height="30"></a></td>
                </tr>
                <tr>
                    <td>cv notes</td>
                    <td>{{$applicant->cv_notes}}</td>
                </tr>
                <tr>
                    <td>cv result</td>
                    <td>{{$applicant->cv_result}}</td>
                </tr>
                <tr>
                    <td>english exam</td>
                    <td>{{$applicant->english}}</td>
                </tr>
                <tr>
                    <td>iq exam</td>
                    <td>{{$applicant->iq}}</td>
                </tr>
                <tr>
                    <td>technical exam</td>
                    <td>{{$applicant->technical}}</td>
                </tr>
                <tr>
                    <td>exam result</td>
                    <td>{{$applicant->exam_result}}</td>
                </tr>
                <tr>
                    <td>interview notes</td>
                    <td>{{$applicant->interview_notes}}</td>
                </tr>
                <tr>
                    <td>interview result</td>
                    <td>{{$applicant->interview_result}}</td>
                </tr>
                <tr>
                    <td>degree</td>
                    <td>{{$applicant->degree}}</td>
                </tr>
                <tr>
                    <td>offer</td>
                    <td>{{$applicant->offer}}</td>
                </tr>
                <tr>
                    <td>response</td>
                    <td>{{$applicant->response}}</td>
                </tr>
                <tr>
                    <td>refuse</td>
                    <td>{{$applicant->refuse}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            $('.text').each( function () {
                var title = $(this).text();
                $(this).html( '<input style="width: 100%"type="text" />' );
            } );

            // DataTable
            var table = $('#example').DataTable(
                {
                    "paging":   false,
                    "info": false
                }
            );

            table.columns([0]).every( function () {
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
@endsection
