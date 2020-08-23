@extends('admin.index')

@section('content')

    <div class="container">

        <div class="container">
            <form enctype="multipart/form-data" method="post" action="{{route('albums.update',$album->id)}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Album Name</label>
                    <input type="text" name="album_name" class="form-control" placeholder="Album Name"
                           aria-describedby="emailHelp" value="{{$album->album_name}}" required>

                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect2">Category</label>
                    <select name="category" multiple class="form-control" id="exampleFormControlSelect2">
                        <option value="V Pop">V Pop</option>
                        <option value="K Pop">K Pop</option>
                        <option value="C Pop">C Pop</option>
                        <option value="Us-Uk">US-UK</option>
                    </select>
                </div>

                <img style="width: 200px;height: 200px" src="{{asset('storage/'.$album->image)}}"  alt="...">
                <div class="form-group">
                    <label for="exampleFormControlFile1">Image input</label>
                    <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>

@endsection
