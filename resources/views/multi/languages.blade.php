@extends('layouts.app')

@section('content')

    <?php
    $i = 1;
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Table of languages</div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Name</th>
                                <th scope="col">Active</th>
                                <th scope="col">Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($langs as $lang)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $lang->title }}</td>
                                    <td>{{ $lang->name }}</td>
                                    <td>{{ $lang->active }}</td>
                                    <td>
                                        @if ($lang->active == 1)
                                            <form method="post" action="/langs">
                                                @csrf
                                                <input name="title" value={{ $lang->title }} type="hidden">
                                                <input name="activate" value="0" type="hidden">
                                                <button type="submit" class="btn btn-outline-success">Activate</button>
                                            </form>
                                        @else
                                            <form method="post" action="/langs">
                                                @csrf
                                                <input name="title" value={{ $lang->title }} type="hidden">
                                                <input name="activate" value="1" type="hidden">
                                                <button type="submit" class="btn btn-outline-secondary">Deactivate</button>
                                            </form>
                                        @endif
                                        <form method="post" action="/langs">
                                            @csrf
                                            <input name="title" value={{ $lang->title }} type="hidden">
                                            <button type="submit" class="btn btn-outline-danger">Delete language</button>
                                        </form>
                                        <form method="post" action="/localization">
                                            @csrf
                                            <input name="title" value={{ $lang->title }} type="hidden">
                                            <button type="submit" class="btn btn-outline-warning">Translates</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a href="/langs/create" class="btn btn-success" role="button" aria-disabled="true">Add a new language</a>
                    <a href="/keys" class="btn btn-success" role="button" aria-disabled="true">Add a new keys</a>
                </div>
            </div>
        </div>
    </div>
@endsection
