@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row">

            <div class="col-md-6 offset-md-2">
                <form action="/users" method="POST">
                    @csrf
                    <input type="text" name="q" id="q" class="form-control">
                    <button type="submit" class="btn btn-primary mt-2"> Search</button>
                </form>
            </div>
        </div>

        <div class="row">

                <div class="col-md-6 offset-md-2">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                <td>{{ $user->id}}</td>
                                <td>{{ $user->name}}</td>
                                <td>{{ $user->email}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

        </div>
    </div>

@endsection