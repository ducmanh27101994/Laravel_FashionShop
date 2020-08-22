@extends('admin.index')

@section('content')

    <div class="container">
        @can('crud-user')
        <a class="btn btn-success" href="{{route('permission.create')}}">Add User</a>
        @endcan
        <br><br>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                @can('crud-user')
                <th scope="col" colspan="2">Action</th>
                @endcan
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
                        @can('crud-user')
                        <td><a class="btn btn-success" href="{{route('permission.edit',$user->id)}}">Edit</a> </td>
                            <td><a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('permission.delete',$user->id)}}">Delete</a> </td>
                        @endcan
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>

    </div>

@endsection
