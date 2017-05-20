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
<div class="container">
    <div class="col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 interv">
        <table id="example" class="" cellspacing="0">
            <thead>
            <tr>
                <th>name</th>
                <th>set scores</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th class="text">name</th>
                <th></th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($applicant as $applicant)
                @for($i=0; $i<10; $i++)
                    <tr>
                        <td>{{$applicant->first}} {{$applicant->last}}</td>
                        <td>
                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#{{$i}}">set results</button>
                            <div id={{$i}} class="collapse">
                                <form action="/cv" method="POST">
                                    {{ csrf_field()}}
                                    <div class="form-group">
                                    <input type="hidden" name="id"  class="form-control" value={{$applicant->app_id}}>
                                    </div>
                                    <div class="form-group">
                                        <label for="english">english exam result:</label>
                                        <input name="english" type="number" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="iq">iq exam result:</label>
                                        <input name="iq" type="number" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="technical">technical exam result:</label>
                                        <input name="technical" type="number" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="exam result">interview result:</label>
                                        <select name="exam_result" class="form-control">
                                            <option value="Passed">Passed</option>
                                            <option value="Failed">Failed</option>
                                        </select>
                                    </div>
                                    <button class="btn btn-info" type="submit">submit</button>
                                </form>
                            </div>
                        </td>
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
