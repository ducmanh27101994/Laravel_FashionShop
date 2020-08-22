@extends('admin.index')

@section('content')

    <div class="container">
    <a class="btn btn-success" href="{{route('products.create')}}">Add Product</a>
        <br><br>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Desc</th>
                <th scope="col">Image</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
            @if(empty($products))
                <tr>
                    <td>No Data</td>
                </tr>
            @else
                @foreach($products as $key => $product)
            <tr>
                <th scope="row">{{++$key}}</th>
                <td>{{$product->product_name}}</td>
                <td>$ {{$product->price}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->desc}}</td>
                <td><img style="width: 50px; height: 65px" src="{{asset('storage/'.$product->image)}}"></td>
                <td><a class="btn btn-success" href="{{route('products.edit',$product->id)}}">Edit</a> </td>
                <td><a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('products.delete',$product->id)}}">Delete</a> </td>
            </tr>
                @endforeach
            @endif
            </tbody>
        </table>

    </div>

@endsection
