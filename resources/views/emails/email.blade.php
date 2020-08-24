<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h3>Bạn vừa nhận được một đơn hàng có mã: #{{$bill}}. Đơn hàng như sau:</h3>

<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Phone</th>
        <th scope="col">Email</th>
        <th scope="col">Address</th>
        <th scope="col">Total</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td scope="row">{{$name}}</td>
        <td>{{$phone}}</td>
        <td>{{$address}}</td>
        <td>{{$email}}</td>
        <td>$ {{$totalPrice}}</td>
    </tr>

    </tbody>
</table>

</body>
</html>
