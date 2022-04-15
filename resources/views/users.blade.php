@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Choose a user</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            .container {
                width: 100vw;
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .justify-content-center {
                width: 800px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            @if(count($users) > 0)
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <th>ID</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        @if($user->id != Auth::user()->getId())
                        <td><div>{{$user->id}}</div></td>
                        <td><div>{{$user->name}}</div></td>
                        <td><div>{{$user->email}}</div></td>
                        <td>
                            <form id="form" action="{{ route('adduser')}}" method="POST">
                                @csrf
                                <input type=number value="{{$project_id}}" name="project_id" id="project_id" style=" display:none">
                                <input type=number value="{{$user->id}}" name="user_id" id="user_id" style=" display:none">
                                <button class="btn btn-primary" type="submit">Choose</button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
@endif
@endsection
