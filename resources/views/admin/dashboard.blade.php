<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/app.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="public/css/dashboard.css" rel="stylesheet">
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Management</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>

            </ul>
            @if(Auth::user())
            <?php $user=Auth::user();?>
                <div data-toggle="modal" data-target="#exampleModal">
                {{ Auth::user()->name}}</div> 
				<form action="/auth/logout" method="get">
                @csrf
                <button style="margin-right:30px;">Đăng xuất</button></form>
                <br>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container-fluid mt-3">
         <form method="post" action="{{'/admin/profile/'.$user->id}}" enctype="multipart/form-data">
            @csrf
            @method("PATCH")
            <div class="form-group">
               <div >
                  <label>Địa chỉ:</label>
                     <input type="text" name="address" value="{{$user->address}}">
                  </div>
               </div>
               <div>
                     <label>Số điện thoại:</label>
                  <div >
                     <input type="text" name="phone" value="{{$user->phone}}">
                  </div>
               </div>
               <div >
                    <label>Email:</label>
                    <div >
                        <input type="email"  name="email" value="{{$user->email}}">
                        </div>
                    </div>
               <div class="col-md-8" style="margin-top: 20px;">
                  <button type="submit" class="btn btn-success">Chỉnh sửa</button>
               </div>
            </div>
         </form>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
            @else
            <form action="/home" method="get">
                @csrf
                <button style="margin-right:30px;">Đăng nhập</button></form>
            @endif
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    @if(Auth::user())
    <div style="display: flex; flex-direction:row ;width: 90%; margin:10px auto;">
        <div class='content-left'>
            <section id="tabs" class="project-tab">
                <div class="container" style="justify-content: center;">
                    <div>

                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            
                        <form action="/admin/product" method="get"class="nav-item nav-link active" 
                                aria-selected="true">
								<button type="submit" class="btn btn-secondary">Sản phẩm({{count($products)}})</button>
								</form>
								<form action="/admin/user" method="get"class="nav-item nav-link active" 
                                aria-selected="true">
								<button type="submit" class="btn btn-primary ">Người dùng({{count($users)}})</button>
								</form>
								<form action="/admin/category" method="get"class="nav-item nav-link active" 
                                aria-selected="true">
								<button type="submit" class="btn btn-warning">Loại sản phẩm({{count($categories)}})</button>
									</form>
									<form action="/admin/recharge" method="get"class="nav-item nav-link active" 
                                aria-selected="true">
								<?php 
								$count=0;
								foreach($recharges as $recharge){
									if($recharge->action=="no"){
										$count+=1;
									}
								}?>
								<button type="submit" class="btn btn-danger">Nạp tiền({{$count}})</button>
									</form>
									<form action="/admin/order" method="get"class="nav-item nav-link active" 
                                aria-selected="true">
								<button type="submit" class="btn btn-info">Hóa đơn({{count($orders)}})</button>
									</form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div>
        @endif
</body>

</html>