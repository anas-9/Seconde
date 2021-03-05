@extends('Auth.layout')

@section('content')

    <div class="container">
        <div class="row mt-45px">
            <div class="col-md-6 col-md-offset-3">
                <h4>Profile</h4>
                <hr>
                <table class="table table-hover">
                    <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th></th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$LoggedUserInfo->name}}</td>
                        <td>{{$LoggedUserInfo->email}}</td>
                        <td><a href="logout">Logout</a></td>
                    </tr>
                    </tbody>
                </table>

            </div>

        </div>
    </div>



@endsection
