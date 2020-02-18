@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add language</div>
                    <div class="card-body">
                        <form action="/langs" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Short name for language</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter title">
                            </div>
                            <div class="form-group">
                                <label>Name for language</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter name">
                            </div>
                            <input hidden type="number" name="activate" class="form-control" placeholder="Enter 0 for active or 1 for deactivate">
                            <input type="submit" class="btn btn-success container" value="Submit" >
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
