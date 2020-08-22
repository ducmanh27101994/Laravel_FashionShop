@extends('admin.report.report')

@section('report')
    <br><br>

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
