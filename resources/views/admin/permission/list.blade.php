@extends('admin.index')

@section('content')

    <div class="container">
        <a class="btn btn-success" href="#">Add Product</a>
        <br><br>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
            @if(empty($users))
                <tr>
                    <td>No Data</td>
                </tr>
            @else
                @foreach($users as $key => $user)
                    <tr>
                        <th scope="row">{{++$key}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role}}</td>

                        <td><a class="btn btn-success" href="#">Edit</a> </td>
                        <td><a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="#">Delete</a> </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>

    </div>

@endsection
