@extends('admin.index')

@section('content')

    <div class="container">

        <div class="container">
            <form enctype="multipart/form-data" method="post" action="{{route('musics.update',$music->id)}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Music Name</label>
                    <input type="text" name="music_name" class="form-control" placeholder="Music Name"
                           aria-describedby="emailHelp" value="{{$music->music_name}}" required>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Singer</label>
                    <select name="singer_id" class="form-control" id="exampleFormControlSelect1">
                        @foreach($singers as $singer)
                            <option @if($singer->id == $music->singer_id) selected @endif value="{{$singer->id}}">{{$singer->singer_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Author</label>
                    <input type="text" name="author" class="form-control" placeholder="Author Name"
                           aria-describedby="emailHelp" value="{{$music->author}}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nation</label>
                    <input type="text" name="nation" class="form-control" placeholder="Nation"
                           aria-describedby="emailHelp" value="{{$music->nation}}" required>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Album</label>
                    <select name="album_id" class="form-control" id="exampleFormControlSelect1">
                        @foreach($albums as $album)
                            <option @if($album->id == $music->album_id) selected @endif value="{{$album->id}}">{{$album->album_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1">Audio input</label>
                    <input name="audio" type="file" class="form-control-file" id="exampleFormControlFile1" required>
                </div>

                <img style="width: 200px;height: 200px" src="{{asset('storage/'.$music->image)}}"  alt="...">
                <div class="form-group">
                    <label for="exampleFormControlFile1">Image input</label>
                    <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>

@endsection
