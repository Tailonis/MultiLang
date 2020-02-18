
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
                                <th scope="col">Translate</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($translates as $translate)
                                <tr>
                                    <th>{{ $i++ }}</th>
                                    <td>{{ $translate->key }}</td>
                                    <td>
                                        <form method="post" action="/localization/save">
                                            @csrf
                                            <input hidden type="text" class="form-control" name="lang" value="{{ $locale }}">
                                            <input hidden type="text" class="form-control" name="key" value="{{ $translate->key }}">
                                            <input type="text" class="form-control" name="localization" value="{{ optional($translate->translate)->localization }}">
                                            <button type="submit" class="btn btn-info">Save</button>
                                        </form>
                                    </td>
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
             // '<td><input type="text" class="form-control" name="key"></td>' +
            '<td>' +
            '<form method="post" action="/localization/save">' +
                '@csrf' +
                '<input hidden type="text" class="form-control" name="lang" value="{{ $locale }}">' +
                '<input  type="text" class="form-control" name="key">' +
                '<input type="text" class="form-control" name="localization">' +
                '<button type="submit" class="btn btn-info">Save</button>' +
            '</form>' +
            '</td>' +
            '</tr>';
            $('tbody').prepend(tr);
        }
    </script>
@endsection







