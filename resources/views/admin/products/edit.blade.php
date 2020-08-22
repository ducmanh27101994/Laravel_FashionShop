@extends('admin.index')

@section('content')

    <div class="container">

        <div class="container">
            <form enctype="multipart/form-data" method="post" action="{{route('products.update',$product->id)}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Product Name</label>
                    <input type="text" name="product_name" class="form-control" placeholder="Product Name"
                           aria-describedby="emailHelp" value="{{$product->product_name}}" required>

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input value="{{$product->price}}" type="text" name="price" class="form-control" placeholder="Price" aria-describedby="emailHelp" required>

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Quantity</label>
                    <input value="{{$product->quantity}}" type="text" name="quantity" class="form-control" placeholder="Quantity" aria-describedby="emailHelp" required>

                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea type="text" name="desc" class="form-control" id="exampleFormControlTextarea1" rows="3" required>{{$product->desc}}"</textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1">Example file input</label>
                    <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>


@endsection
