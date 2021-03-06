
@extends('layouts.app')

@section('content')
    <?php
    $i = 1;
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Table of localization</div>
                    <div class="card-body">
                        <button class = "addRow" type="button" class="btn btn-primary">Add</button>
                        <form role="form" method="post" action="/localization/save">
                        <table class="table table-bordered" id = "myTable">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Key</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($keys as $key)
                                <tr>
                                    <th>{{ $i++ }}</th>
                                    <td>{{ $key->key }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var rowCount = $('#myTable tr').length;

        $('.addRow').on('click', function () {
            addRow();
            rowCount = $('#myTable tr').length;
        });
        function addRow (){
            var tr = '<tr>' +
             '<th>' + rowCount + '</th>' +
            '<td>' +
            '<form method="post" action="/keys">' +
                '@csrf' +
                '<input  type="text" class="form-control" name="key">' +
                '<button type="submit" class="btn btn-info">Save</button>' +
            '</form>' +
            '</td>' +
            '</tr>';
            $('tbody').prepend(tr);
        }
    </script>
@endsection







