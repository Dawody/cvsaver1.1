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
<table id="apptable" class="display table" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>name</th>
        <th>e-mail</th>
        <th>job</th>
        <th>cv result</th>
        <th>english</th>
        <th>iq</th>
        <th>technical</th>
        <th>interview result</th>
        <th></th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th class="text">name</th>
        <th class="text">e-mail</th>
        <th>job</th>
        <th>cv result</th>
        <th class="text">english</th>
        <th class="text">iq</th>
        <th class="text">technical</th>
        <th>interview result</th>
        <th></th>
    </tr>
    </tfoot>
    <tbody>
    @foreach($applicant as $applicant)
        @for($i=0; $i<10; $i++)
            <tr>
                    {{--{{csrf_field()}}--}}
                    <td>{{$applicant->first}} {{$applicant->last}}</td>
                    <td>{{$applicant->email}}</td>
                    <td>{{$applicant->email}}</td>
                    <td>{{$applicant->cv_result}}</td>
                    <td>{{$applicant->english}}</td>
                    <td>{{$applicant->iq}}</td>
                    <td>{{$applicant->technical}}</td>
                    <td>{{$applicant->cv_result}}</td>
                    <td>
                        <form method="post" action="/edit-eval">
                            {{csrf_field()}}
                            <input type="hidden" name="app_id" value={{$applicant->app_id}}>
                            <button class="btn btn-info" type="submit">evaluate</button>
                        </form>
                        <form method="post" action="/view-app">
                            {{csrf_field()}}
                            <input type="hidden" name="app_id" value={{$applicant->app_id}}>
                            <button class="btn btn-danger" type="submit">view info</button>
                        </form>
                    </td>
            </tr>
        @endfor
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
        var table = $('#apptable').DataTable(
            {
                initComplete: function () {
                    this.api().columns([2,3,7]).every( function () {
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

        table.columns([0,1,4,5,6]).every( function () {
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