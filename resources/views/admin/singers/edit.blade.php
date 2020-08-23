@extends('admin.index')

@section('content')

    <div class="container">

        <div class="container">
            <form enctype="multipart/form-data" method="post" action="{{route('singers.update',$singer->id)}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Singer Name</label>
                    <input type="text" name="singer_name" class="form-control" placeholder="Singer Name"
                           aria-describedby="emailHelp" value="{{$singer->singer_name}}" required>

                </div>

                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="Male" checked>
                                <label class="form-check-label" for="gridRadios1">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="Female">
                                <label class="form-check-label" for="gridRadios2">
                                    Female
                                </label>
                            </div>
                            <div class="form-check disabled">
                                <input class="form-check-input" type="radio" name="gender" id="gridRadios3" value="Other">
                                <label class="form-check-label" for="gridRadios3">
                                    Other
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>


                <div class="form-group">
                    <label for="exampleInputEmail1">Age</label>
                    <input type="number" name="age" class="form-control" placeholder="Age" aria-describedby="emailHelp" value="{{$singer->age}}" required>

                </div>

                <img style="width: 200px;height: 200px" src="{{asset('storage/'.$singer->image)}}"  alt="...">

                <div class="form-group">

                    <label for="exampleFormControlFile1">Image input</label>
                    <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>

@endsection
