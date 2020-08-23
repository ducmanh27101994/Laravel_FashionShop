@extends('admin.index')

@section('content')

    <div class="container">
        <a class="btn btn-success" href="{{route('albums.create')}}">Add Albums</a>
        <br><br>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Album Name</th>
                <th scope="col">Category</th>
                <th scope="col">Image</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
            @if(empty($albums))
                <tr>
                    <td>No Data</td>
                </tr>
            @else
                @foreach($albums as $key => $album)
                    <tr>
                        <th scope="row">{{++$key}}</th>
                        <td>{{$album->album_name}}</td>
                        <td>{{$album->category}}</td>
                        <td ><img style="width: 80px; height: 80px;border-radius: 50px; " src="{{asset('storage/'.$album->image)}}"></td>
                        <td><a class="btn btn-success" href="{{route('albums.edit',$album->id)}}">Edit</a> </td>

                        <td><a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('albums.delete',$album->id)}}">Delete</a> </td>

                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>

    </div>

@endsection
