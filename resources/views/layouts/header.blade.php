<!DOCTYPE html>
<html lang="en">

<head>
    <!--Required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title></title>

    <link rel="icon" href="/favicon.ico">
    <link rel="canonical" href="https://mysite.com/mypage">
    <!--Bootstrap CSS-->
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
</head>
<style>
.dropbtn {
    background-color: none;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.dropdown-content a {
    color: white;
    padding: 12px 16px;
    b text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: none;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: none;
}

.btn-2 {
    background: none;
    letter-spacing: 0;
}

.btn-2.color-green:hover,
.btn-2.color-green:active {
    color: white;
}

.btn-2:hover,
.btn-2:active {
    letter-spacing: 5px;
}

.btn-2:after,
.btn-2:before {
    backface-visibility: hidden;
    border: 1px solid rgba(#fff, 0);
    bottom: 0px;
    content: " ";
    display: block;
    margin: 0 auto;
    position: relative;
    transition: all 280ms ease-in-out;
    width: 0;
    opacity: 0;
}

.btn-2.color-green:after,
.btn-2.color-green:before {
    border: 1px solid green;
}

.btn-2:hover:after,
.btn-2:hover:before {
    backface-visibility: hidden;
    transition: width 350ms ease-in-out;
    width: 70%;
    opacity: 1;
}
</style>

<body>
    <nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-warning text-dark">
        <a href="/admin/dashboard">
            <buttom>June BB</buttom> <img src="img/logo.jpg" alt="" width="50px" height="50px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="home">
                        <i class="fa fa-home"></i>
                        Trang chủ
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <i>
                            <div class="dropbtn"> <img src="img/sanpham.png" width="25px"><br>Sản phẩm</div>
                            <div class="dropdown-content" style="background:black">
                                <?php $categories= App\Category::all();?>
                                @foreach($categories as $category)
                                <form action="/catelog/{{$category->id}}" method="get">
                                    <button class="btn btn-2 color-green" style=" background:none;"
                                        type="submit">{{$category->name}}</button>
                                </form>
                                @endforeach

                            </div>
                        </i>


                    </div>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <i>
                            <div class="dropbtn"> <img src="img/sanpham.png" width="25px"><br>Sắp xếp</div>
                            <div class="dropdown-content"style="background:black">
                                <form class="form-inline my-2 my-lg-0" style="margin-left:20px;" method="post"
                                    action="user/sort">
                                    @csrf
                                    <input class="form-control mr-sm-2" type="text" name="sort" value="tang" hidden>
                                    <button class="btn btn-2 color-green" style=" background:none;" type="submit">Tăng dần</button>
                                </form>
                                <form class="form-inline my-2 my-lg-0" style="margin-left:20px;" method="post"
                                    action="user/sort">
                                    @csrf
                                    <input class="form-control mr-sm-2" type="text" name="sort" value="giam" hidden>
                                    <button class="btn btn-2 color-green" style=" background:none;" type="submit">Giảm dần</button>
                                </form>
                            </div>
                        </i>


                    </div>
                </li>
                <li class="nav-item active"style="margin-top:10px;">
									<form action="/user/hoadon" method="get"class="nav-item nav-link active" 
                                aria-selected="true">
                                <img src="img/logo.jpg" width="25px"><br>
								<button style="background:none;border:none;color:white"type="submit">Hóa đơn</button>
									</form>
                </li>
                


                <li class="nav-item">
                    <?php
                                    $user=Auth::user();
                                    $idu=$user->id;
                                    $messages=App\Message::where('id_user','=',$idu)->get();
                                    $c=0;
                                    foreach($messages as $message){
                                        if($message->status=="no"){
                                            $c=$c+1;
                                        }
                                    }
                                    ?>
                    <div data-toggle="modal" data-target="#exampleModalScrollable">
                        <a class="nav-link">
                            <i><span style="color:red">({{$c}})</span>
                                <img src="img/news.png" width="25px"><br>
                            </i>
                            <span style="color:white">Thông báo</span>
                        </a>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">

                                    <h5 class="modal-title" id="exampleModalScrollableTitle">Thông
                                        báo({{count($messages)}})</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @foreach($messages as $message)
                                    <div>
                                        <div style="display:none;">{{$message->id}}</div>
                                        @if($message->status=="no")
                                        <div style="display: flex;">
                                        <td>
                                            <form action="{{'/user/read/'.$message->id}}" method="post">
                                                @csrf
                                                <div style="color:red;display:flex;">{{$message->content}}</div>
                                                <input type="text" class="form-control" readOnly name="mes"
                                                    style="color:red;display:none" value="{{$message->content}}">
                                                <button type="submit"><img src="img/eye.png"><br></button>
                                            </form>
                                            <form action="{{'/user/read/'.$message->id.'/a'}}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                @if($message->status=='no')
                                                <input type="text" name="dele" style="width:50px;display:none"
                                                    value="no">
                                                <button type="submit" style="margin-top:20px;"><img src="img/dele.png"></button>                      
                                                @endif
                                            </form>
                                        </td>
                                        </div>
                                        @else
                                        <div style="display:flex;">{{$message->content}}</div>
                                        <form action="{{'/user/read/'.$message->id.'/a'}}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" style="margin-top:20px;"><img src="img/dele.png"></button>                      
                                            </form>
                                        @endif
                                        <div style="display:none;">{{$message->status}}</div>
                                    </div>
                                    <br>
                                    <hr>
                                    @endforeach
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            @if(Auth::user())
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link" href="/cart">
                        <i>
                            <span style="color: red;">{{ $carts->count()}}</span>
                            <img src="img/cart.png" width="25px"><br>
                        </i>
                        Giỏ hàng
                    </a>
                </li>
            </ul>
            @endif
            <ul>
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                @if(Auth::user())
                <?php $user=Auth::user();?>
                <div data-toggle="modal" data-target="#exampleModal">
                    {{ Auth::user()->name}}</div>

                <br>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <form method="post" action="{{'/user/profile/'.$user->id}}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method("PATCH")
                                        <div class="form-group">
                                            <div>
                                                <label>Địa chỉ:</label>
                                                <div>
                                                <input type="text"required name="address" value="{{$user->address}}">
                                            </div>
                                        </div>
                                        <div>
                                            <label>Số điện thoại:</label>
                                            <div>
                                                <input type="text" required name="phone" value="{{$user->phone}}">
                                            </div>
                                        </div>
                                        <div>
                                            <label>Email:</label>
                                            <div>
                                                <input type="email"required name="email" value="{{$user->email}}">
                                            </div>
                                        </div>
                                        <div>
                                            <label>Nạp tiền:</label>
                                            <div>
                                                <input type="number"required name="money" min="1000"value="{{$user->money}}">
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
        <!-- <a href="/admin/dashboard"><buttom>Admin</buttom></a>
                    <a href="/user/interface"><buttom>User</buttom></a> -->

        <form action="/auth/logout" method="get">
            <button><img class="img-fluid" src="/img/logout.png" alt=""> Đăng xuất</button></form>
        </form>
        @else
        <form action="{{ route('login') }}" method="post">
            @csrf
            <button><img class="img-fluid" src="/img/login.png" alt=""> Đăng nhập</button></form>
        <form action="{{ route('register') }}" method="post">
            @csrf
            <button><img class="img-fluid" src="/img/signup.png" alt=""> Đăng kí</button></form>
        @endif
        </ul>
        <form class="form-inline my-2 my-lg-0" style="margin-left:20px;" method="get" action="user/search">
            @csrf
            <input class="form-control mr-sm-2" type="text" name="keys" placeholder="Tìm kiếm..." aria-label="Search">
            <button class="btn btn-info" type="submit">Search</button>
        </form>
        </div>
    </nav>
    <!-- Slideshow container -->
    <div class="slideshow-container">
        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
            <img src="img/slide1.jpg" style="width:100%">
        </div>

        <div class="mySlides fade">
            <img src="img/slide2.jpg" style="width:100%">
        </div>
        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    <!-- The dots/circles -->
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>
    <!--Optional JavaScript-->
    <!--jQuery first, then Popper.js, then Bootstrap JS-->
    <script src="{{ asset('js/slide.js') }}"></script>
</body>

</html>