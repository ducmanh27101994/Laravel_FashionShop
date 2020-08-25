@extends('admin.report.report')

@section('content')

    <div class="container">
        <a href="{{route('detail.orderYear')}}" class="btn btn-outline-primary">Last Year</a>
        <a href="{{route('detail.orderMonth')}}" class="btn btn-secondary">Last Month</a>
        <a href="{{route('detail.orderWeek')}}" class="btn btn-outline-success">Last Week</a>
        <a href="{{route('detail.orderDay')}}" class="btn btn-outline-danger">Last Day</a>
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
    </div>

    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Total Price</th>
                <th scope="row">$ {{$sumOrder[0]->total - $sumCancel[0]->sum}}</th>
            </tr>
            </thead>
            <thead>
            <tr>
                <th scope="col">AVG Price Weeks</th>
                <th>$ {{number_format(($sumOrder[0]->total - $sumCancel[0]->sum) / 4)}}</th>
            </tr>
            </thead>
            <thead>
            <tr>
                <th scope="col">Price Cancel</th>
                <th>$ {{$sumCancel[0]->sum}}</th>
            </tr>
            </thead>
            <thead>
            <tr>
                <th scope="col">Order</th>
                <th scope="row"> {{$orderYear[0]->value}}</th>
            </tr>
            </thead>

            <thead>
            <tr>
                <th scope="col">Success</th>
                <th scope="row">{{$status[3]->pending_count}}</th>
            </tr>
            </thead>

            <thead>
            <tr>
                <th scope="col"> % Success</th>
                <th scope="row">{{($status[0]->pending_count / $orderYear[0]->value) * 100}}%</th>
            </tr>
            </thead>

            <thead>
            <tr>
                <th scope="col">Cancel</th>
                <th scope="row">{{$status[1]->pending_count}}</th>
            </tr>
            </thead>

            <thead>
            <tr>
                <th scope="col">% Cancel</th>
                <th scope="row">{{($status[1]->pending_count / $orderYear[0]->value) * 100}}%</th>
            </tr>
            </thead>

        </table>

    </div>

@endsection
