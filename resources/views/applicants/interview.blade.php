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
    .interv{
        background-color: white;
    }
</style>
@endsection
@section('content')
<body>
<div class="container">
    <div class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 interv">
        <table id="example" class="" cellspacing="0">
            <thead>
            <tr>
                <th>name</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th class="text">name</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($applicant as $applicant)
                @for($i=0; $i<10; $i++)
                    <tr>
                        <td>{{$applicant->first}} {{$applicant->last}}</td>
                    </tr>
                @endfor
            @endforeach
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
