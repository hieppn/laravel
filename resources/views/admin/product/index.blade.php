<!DOCTYPE html>
<html>
<head>
     <link rel="shortcut icon" type="image/png" href="/img/logo.jpg"/>
    <a href="dashboard"><button>Quay lại trang chủ <=</button></a>
    <title>Trang tất cả các sản phẩm</title>

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<a href="./product/create"><button type="button" class=" btn btn-light">Thêm sản phẩm</button></a>
<center><h1>Thông tin sản phẩm</h1></center>
<table align="center" width="600px" border="1" cellspacing="0" cellpadding="3"
                class="table table-hover table-bordered">
                <tr class="table-primary table-header" style="text-align: center;">
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá hiện tại</th>
                    <th>Giá cũ</th>
                    <th>Số lượng</th>
                    <th>Nguồn gốc</th>
                    <th>Trạng thái</th>
                    <th>Tên loại sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Mô tả</th>
                    <th colspan="2">Xử lý</th>
                </tr>
                    @foreach($products as $product)
                            <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}.vnd</td>
                            <td>{{$product->oldprice}}.vnd</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->source}}</td>
                            <td>{{$product->status}}</td>
                            <td>{{$product->category->name}}</td>
                            <td><img src="/storage/{{$product->image}}" width="150px" height="130px" ></td>
                            <td >{{$product->description}}</td>
                            <td>
                                <form action="{{'/admin/product/'.$product->id}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger" style="margin-right: 15px;">Delete</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{'/admin/product/'.$product->id.'/edit'}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-warning" style="margin-right: 15px;">Edit</button>
                                </form>
                            </td>
                    @endforeach
                    
            </table>
</body>
</html>