@extends('admin.index')

@section('content')

    <div class="container">

        <div class="container">
            <form enctype="multipart/form-data" method="post" action="{{route('musics.store')}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Music Name</label>
                    <input type="text" name="music_name" class="form-control" placeholder="Music Name"
                           aria-describedby="emailHelp" required>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Singer</label>
                    <select name="singer_id" class="form-control" id="exampleFormControlSelect1">
                        @foreach($singers as $singer)
                        <option value="{{$singer->id}}">{{$singer->singer_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Author</label>
                    <input type="text" name="author" class="form-control" placeholder="Author Name"
                           aria-describedby="emailHelp" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nation</label>
                    <input type="text" name="nation" class="form-control" placeholder="Nation"
                           aria-describedby="emailHelp" required>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Album</label>
                    <select name="album_id" class="form-control" id="exampleFormControlSelect1">
                        @foreach($albums as $album)
                            <option value="{{$album->id}}">{{$album->album_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1">Audio input</label>
                    <input name="audio" type="file" class="form-control-file" id="exampleFormControlFile1" required>
                </div>


                <div class="form-group">
                    <label for="exampleFormControlFile1">Image input</label>
                    <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>

@endsection
