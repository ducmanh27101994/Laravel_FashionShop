@extends('admin.index')

@section('content')

    <div class="container">
        <a class="btn btn-success" href="{{route('singers.create')}}">Add Singers</a>
        <br><br>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Singer Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Age</th>
                <th scope="col">Image</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
            @if(empty($singers))
                <tr>
                    <td>No Data</td>
                </tr>
            @else
                @foreach($singers as $key => $singer)
                    <tr>
                        <th scope="row">{{++$key}}</th>
                        <td>{{$singer->singer_name}}</td>
                        <td>{{$singer->gender}}</td>
                        <td>{{$singer->age}}</td>
                        <td><img style="width: 80px; height: 80px" src="{{asset('storage/'.$singer->image)}}"></td>
                        <td><a class="btn btn-success" href="{{route('singers.edit',$singer->id)}}">Edit</a> </td>

                            <td><a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('singers.delete',$singer->id)}}">Delete</a> </td>

                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>

    </div>

@endsection
