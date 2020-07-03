<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" type="image/png" href="/img/logo.jpg" />
    <title>Trang tất cả các hóa đơn</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <a href="dashboard"><button>Quay lại trang chủ <= </button></a>
    <center>
        <h1>Thông tin hoá đơn</h1>
    </center>
    <table align="center" border="1" cellspacing="0" cellpadding="1">
        <tr class="table-primary table-header" style="text-align: center;">
            <th>ID</th>
            <th>Tên khách hàng</th>
            <th>Địa chỉ khách hàng</th>
            <th>SĐT khách hàng</th>
            <th>Email</th>
            <th>Sản phẩm</th>
            <th>Giảm giá</th>
            <th>Thành tiền</th>
            <th>Trạng thái</th>
            <th colspan="1">Xác nhận</th>
        </tr>
        @foreach($orders as $order)
        <?php $od_products = json_decode($order->detail);?>
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->name}}</td>
            <td>{{$order->address}}</td>
            <td>{{$order->phone}}</td>
            <td>{{$order->email}}</td>
            <td>
                <table border="1" cellspacing="0" cellpadding="1">
                    @foreach($od_products as $product)
                    <form action="{{'/order/'.$product[0]->id.'/show'}}" method="post" style="margin-left: 50px;">
                    @csrf
                        <tr>
                            <td><button type="submit"><img src="/storage/{{$product[0]->image}}" width="50px"
                                        height="50px"></button></td>
                            <div>
                                <td>{{$product[0]->name}}</td>
                            </div>
                        </tr>
                        @endforeach
                </table>
            </td>
            <td>{{$order->discount}} vnđ</td>
            <td>{{$order->total}} vnđ</td>
            </form>
            <form action="{{'/admin/order/'.$order->id.'/edit'}}" method="post">
                @csrf
                @if($order->status=='cho ship')
                <td>
                    {{$order->status}}
                    <input type="text" readOnly name="action" style="display:none" value="{{$order->status}}">
                </td>
                @else
                <td>{{$order->status}}
                    <input type="text" readOnly name="action" style="display:none" value="{{$order->status}}">
                </td>
                @endif
                <td>
                    @if($order->status=='cho ship')
                    <button type="submit">Giao hàng</button>
                    @else
                    <button type="submit" disabled>Giao hàng</button>
                    @endif
                </td>
            </form>
            @endforeach

    </table>
</body>

</html>