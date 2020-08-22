@extends('admin.index')

@section('content')

    <div class="container">

        <div class="container">
            <form method="post" action="{{route('permission.update',$user->id)}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="User Name"
                           aria-describedby="emailHelp" value="{{$user->name}}" required>

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" aria-describedby="emailHelp" value="{{$user->email}}" required>

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" aria-describedby="emailHelp" required>

                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Role</label>
                    <select name="role" class="form-control" id="exampleFormControlSelect1">
                        @foreach($users as $user1)
                        <option @if($user1->role == $user->role)  selected @endif value="admin">{{$user1->role}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>



@endsection
