<!DOCTYPE html>
<html>

<head>
    <title>Chi tiết sản phẩm</title>
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
</head>

<body>

    <a href="/admin/order"><button>Quay lại<=</button></a>
    @foreach($product as $product)
       <div class="wrapper row">
            <div class="preview col-md-6">
                 <div class="preview-pic tab-content">
                      <div class="tab-pane active" id="pic-1"> <img src="{{'/storage/'.$product->image }}" width="500px"
                        height="500px" style="margin-left:200px;">
                          </div>
                     </div>
                </div>
            <div class="details col-md-6">
                 <h3 class="product-title">{{$product->name}}</h3>
                 <div class="rating">
                      <div class="stars"> <span class="fa fa-star checked"></span> <span
                        class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span
                        class="fa fa-star"></span> <span class="fa fa-star"></span>
                          </div> <span class="review-no">123 đánh giá</span>
                     </div>
                 <p class="product-description">{{$product->description}}</p>
                 <h4 class="price">Giá hiện tại: {{$product->price}}.vnđ</h4>
             <h4 class="price">Giá cũ: <span
                    style="text-decoration: line-through;color:blue;">{{$product->oldprice}}.vnđ</span></h4>
                 <form action="{{'/../cart/'.$product->id}}" method="get">       
                <button class="add-to-cart btn btn-default" type="submit">MUA NGAY</button>
            </form>               
            <button class="like btn btn-default" type="button">
                <span class="fa fa-heart"></span></button>
                @foreach($comments as $comment)
            <?php 
    $idpp= $comment->id_product;
  ?>
            <div>
                <small>{{$comment->userc->name}} nói rằng:</small>
                <i>{{$comment->cmt}}</i>
                <hr>
            </div>  
            @endforeach   
                </div>
           </div>
    @endforeach
    @extends('layouts.footer')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/jquery-1.11.1.min.js"></script>
</body>

</html>