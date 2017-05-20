@extends('layouts.template')


@section('head')
    <style>
        #apptable{
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

        tfoot {
            display: table-header-group;
        }
        table.dataTable thead .sorting,
        table.dataTable thead .sorting_asc,
        table.dataTable thead .sorting_desc {
            background : none;
        }
    </style>
@endsection
@section('content')
    <table id="archivetable" class="display table" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>name</th>
            <th>cv result</th>
            <th>cv notes</th>
            <th>english</th>
            <th>iq</th>
            <th>technical</th>
            <th>exam result</th>
            <th>interview result</th>
            <th>interview notes</th>
            <th>cv</th>
            <th></th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            {{--<th class="text">name</th>
            <th>gender</th>
            <th>nationality</th>
            <th>religion</th>
            <th class="text">phone</th>
            <th class="text">mail</th>
            <th>address</th>
            <th>military status</th>
            <th class="text">years of experience</th>
            <th class="text">university</th>
            <th class="text">gpa</th>
            <th class="text">graduation year</th>
            <th></th>
            <th></th>--}}
            <th class="text">name</th>
            <th>cv result</th>
            <th>cv notes</th>
            <th class="text">english</th>
            <th class="text">iq</th>
            <th class="text">technical</th>
            <th>exam result</th>
            <th>interview result</th>
            <th>interview notes</th>
            <th></th>
            <th></th>
        </tr>
        </tfoot>
        <tbody>
        @foreach($archive as $applicant)
            <tr>
                <td>{{$applicant->first_name}} {{$applicant->last_name}}</td>
                <td>{{$applicant->cv_result}}</td>
                <td>{{$applicant->cv_notes}}</td>
                <td>{{$applicant->english}}</td>
                <td>{{$applicant->iq}}</td>
                <td>{{$applicant->technical}}</td>
                <td>{{$applicant->exam_result}}</td>
                <td>{{$applicant->interview_result}}</td>
                <td>{{$applicant->interview_notes}}</td>
                <td><a href={{$applicant->cv}}><img class="icon icons8-File" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAA20lEQVRIS+2X8Q1BQQyHv7eBEWzABtjABoxgA2xiE2zABmxgA9LES5C79HdUHsk1ef/17ru2v6Z9DR1Z0xGXHLgHDAofdQQu6pkceAxs1UvufgdgosI98Bk4CQ8YlcI98BpYCeDrg48UeSTYamxm2nDhkeA9MAV2CjwSbFrYANYRC6/mkeCcFJI6iQJb+73aHJgBXwWnorVuWFZwm5qoGtdUWwaquJ50UMXVpqPdQNR5XNvpf9vJhruy7KVq3Afse2ssCnue61IEtvVl6F6pOSSz9nO/MFosH3jdAM/nax9XTAbTAAAAAElFTkSuQmCC" width="30" height="30"></a></td>
                <td>
                    <form action="/app_info" method="POST">
                        {{ csrf_field()}}
                        <div class="form-group">
                            <input type="hidden" name="id"  class="form-control" value={{$applicant->id}}>
                        </div>
                        <button class="btn btn-info" type="submit">view info</button>
                    </form>
                    <form action="/return" method="POST">
                        {{ csrf_field()}}
                        <div class="form-group">
                            <input type="hidden" name="id"  class="form-control" value={{$applicant->id}}>
                        </div>
                        <button class="btn btn-danger" type="submit">Return</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script>
        $(document).ready(function() {

            $('.text').each( function () {
                var title = $(this).text();
                $(this).html( '<input style="width: 100%"type="text" />' );
            } );

            // DataTable
            var table = $('#archivetable').DataTable(
                {
                    initComplete: function () {
                        this.api().columns([1,2,3,6,7]).every( function () {
                            var column = this;
                            var select = $('<select style="width: 100%"><option value=""></option></select>')
                                .appendTo( $(column.footer()).empty() )
                                .on( 'change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex(
                                        $(this).val()
                                    );

                                    column
                                        .search( val ? '^'+val+'$' : '', true, false )
                                        .draw();
                                } );

                            column.data().unique().sort().each( function ( d, j ) {
                                select.append( '<option value="'+d+'">'+d+'</option>' )
                            } );
                        } );
                    },
                    "paging":   false,
                    "info": false,
                    "responsive": true,
                    "bAutoWidth": false
                }
            );

            table.columns([0,4,5,8,9,10,11]).every( function () {
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