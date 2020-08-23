@extends('admin.index')

@section('content')

    <div class="container">
        <a class="btn btn-success" href="{{route('musics.create')}}">Add Musics</a>
        <br><br>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Music</th>
                <th scope="col">Author</th>
                <th scope="col">Nation</th>
                <th scope="col">Audio</th>
                <th scope="col">Image</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
            @if(empty($musics))
                <tr>
                    <td>No Data</td>
                </tr>
            @else
                @foreach($musics as $key => $music)
                    <tr>
                        <th scope="row">{{++$key}}</th>
                        <td>{{$music->music_name}}</td>

                        <td>{{$music->author}}</td>
                        <td>{{$music->nation}}</td>

                        <td><audio controls><source src="{{asset('storage/'.$music->audio)}}" type="audio/mpeg"></audio></td>
                        <td ><img style="width: 50px; height: 50px;border-radius: 50px; " src="{{asset('storage/'.$music->image)}}"></td>
                        <td><a class="btn btn-success" href="{{route('musics.edit',$music->id)}}">Edit</a> </td>

                        <td><a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('musics.delete',$music->id)}}">Delete</a> </td>

                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>

    </div>

@endsection
