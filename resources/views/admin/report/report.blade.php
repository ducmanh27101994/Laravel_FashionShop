@extends('admin.index')

@section('content')
<div class="container">
    <a href="{{route('detail.orderYear')}}" class="btn btn-outline-primary">Last Year</a>
    <a href="{{route('detail.orderMonth')}}" class="btn btn-outline-primary">Last Month</a>
    <a href="{{route('detail.orderWeek')}}" class="btn btn-outline-primary">Last Week</a>
    <a href="{{route('detail.orderDay')}}" class="btn btn-outline-primary">Last Day</a>
<br><br><br>

<form method="post" action="{{route('detail.orderSearch')}}">
    @csrf
    <div class="form-row align-items-center">
        <div class="col-auto">
            <label class="sr-only" for="inlineFormInput">Name</label>
            <input name="day1" type="date" class="form-control mb-2" id="inlineFormInput" placeholder="Jane Doe">
        </div>

        <div class="col-auto">
            <label class="sr-only" for="inlineFormInput">Name</label>
            <input name="day2" type="date" class="form-control mb-2" id="inlineFormInput" placeholder="Jane Doe">
        </div>


        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </div>
    </div>
</form>

    @yield('report')
</div>

@endsection
