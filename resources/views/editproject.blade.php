@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit project</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            .container {
                width: 100vw;
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="justify-content-center">
                <div class="card">
                    <div class="card-header">Edit project {{$project->name}}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('saveproject', $project->id) }}">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        @if($project->leader == Auth::user()->getId())
                            <div class="form-group row">
                                <label for="name">Name: </label>
                                <input class="form-control" type="text" name="name" id="name" value="{{$project->name}}" required>
                            </div>
                            <div class="form-group row">
                                <label for="description">Description: </label>
                                <textarea  class="form-control" rows=5 name="description" id="description" required>{{$project->description}}</textarea>
                            </div>
                            <div class="form-group row">
                                <label for="price">Price: </label>
                                <input  class="form-control" type="number" name="price" id="price" value="{{$project->price}}"  required>
                            </div>
                            <div class="form-group row">
                        @endif
                                <label for="worksdone">Works done: </label>
                                <textarea  class="form-control" rows=5 name="worksdone" id="worksdone" required> {{$project->works_done}}</textarea>
                            </div>
                        @if($project->leader == Auth::user()->getId())
                            <div class="form-group row">
                                <label for="startdate">Start date: </label>
                                <input  class="form-control" type="datetime-local" name="startdate" id="startdate" value="{{$project->start_date}}"  required>
                            </div>
                            <div class="form-group row">
                                <label for="enddate">End date: </label>
                                <input  class="form-control" type="datetime-local" name="enddate" id="enddate" value="{{$project->end_date}}"  required>
                            </div>
                        @endif
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
@endsection
