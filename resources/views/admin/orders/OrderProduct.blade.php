@extends('admin.index')

@section('content')

    <style>
        .form-control{
            margin-left: 10px;
            margin-right: 10px;
        }

    </style>
    <div class="container">

        <form method="post" action="{{route('order.search')}}" class="form-inline">
            @csrf
            <div class="form-row align-items-center">
                <div class="col-auto my-1">
                    <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                    <select name="keyword" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        <option value="all" selected>All...</option>
                        <option value="pending">Pending</option>
                        <option value="delivering">Delivering</option>
                        <option value="success">Success</option>
                        <option value="cancel">Cancel</option>
                    </select>
                </div>

                <div class="col-auto my-1">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>

<br><br>

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col">Total Price</th>
            </tr>
            </thead>
            <tbody>
            @if(empty($bills))
                <tr>
                    <td>No data</td>
                </tr>
            @else
                @foreach($bills as $key => $bill)
                    <tr>
                        <td> {{++$key}}</a></td>

                        @if($bill->customer)
                            <td><a href="{{route('order.detail',$bill->id)}}">#{{$bill->id}} - {{$bill->customer->customer_name}}</a></td>
                        @else
                            <td>Not classified</td>
                        @endif
                        <td>{{$bill->created_at}}</td>

                        <td>{{$bill->status}}</td>

                        <td>$ {{$bill->totalPrice}}</td>

                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>
    </div>



@endsection
