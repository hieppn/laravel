<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" type="image/png" href="/img/logo.jpg" />
    <title>Nạp tiền vào tài khoản</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <a href="dashboard"><button>Quay lại trang chủ <=</button></a>
    <center>
        <h1>Thông tin nạp tiền</h1>
    </center>
    <table align="center" border="1" cellspacing="0" cellpadding="3">
        <tr class="table-primary table-header" style="text-align: center;height:50px">
            <th>STT</th>
            <th>IdUser </>
            <th>Số tiền</th>
            <th>Trạng thái</th>
            <th colspan="2">Xác nhận</th>
        </tr>
        @foreach($recharges as $recharge)
        <tr>

            <td>{{$recharge->id}}</td>

            <form action="{{'/admin/recharge/'.$recharge->id.'/edit'}}" method="post">
                @csrf
                <td>
                    <input type="text" readOnly name="user" style="width:30px;" value="{{$recharge->id_user}}">
                </td>
                <td>
                    <input type="text" readOnly name="money" style="width:100px;" value="{{$recharge->money}}">
                </td>
                @if($recharge->action=='no')
                <td>
                    <input type="text" readOnly name="action" style="width:50px;" value="{{$recharge->action}}">
                </td>
                @else
                <td><input type="text" readOnly name="action" style="width:50px;" value="{{$recharge->action}}"></td>

                @endif
                <td>
                    @if($recharge->action=='no')
                    <button type="submit" class="btn btn-warning">Xác nhận</button>
                    @else
                    <button type="submit" disabled class="btn btn-warning">Xác nhận</button>
                    @endif
                </td>
            </form>
            <td>
                <form action="{{'/admin/recharge/'.$recharge->id}}" method="POST">
                    @csrf
                    @method("DELETE")
                    @if($recharge->action=='no')
                    <input type="text"  name="action" style="width:50px;display:none" value="no">
                    <button type="submit" class="btn btn-danger">Từ chối</button>
                    @else
                    <button type="submit" disabled class="btn btn-danger">Từ chối</button>
                    @endif
                </form>
            </td>
        </tr>
        @endforeach

    </table>
</body>

</html>