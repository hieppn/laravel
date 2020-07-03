<!DOCTYPE html>
<html>
<head>
    <title>Trang chỉnh sửa sản phẩm</title>
     <link rel="shortcut icon" type="image/png" href="/img/logo.jpg"/>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <center><h1>Chỉnh sửa thông tin sản phẩm</h1></center>
    <div class="container-fluid mt-3">
         <form method="post" action="{{'/admin/product/'.$product->id}}" enctype="multipart/form-data" style="margin-left: 500px;">
            @csrf
            @method("PATCH")
            <div class="form-group">
               <div >
                  <label>Tên sản phẩm:</label>
                  <div class="col-md-6">
                     <input type="text"  class="form-control" required name="name" value="{{$product->name}}">
                  </div>
               </div>
               <div>
                     <label>Giá hiện tại:</label>
                  <div class="col-md-6">
                     <input type="number" class="form-control"required min="0"name="price" value="{{$product->price}}">
                  </div>
               </div>
               <div>
                     <label>Giá cũ:</label>
                  <div class="col-md-6">
                     <input type="number" class="form-control"required min="0" name="oldprice" value="{{$product->oldprice}}">
                  </div>
               </div>
               <div >
                    <label>Số lượng:</label>
                    <div class="col-md-6">
                        <input type="number" class="form-control"required name="quantity" value="{{$product->quantity}}"min="0">
                        </div>
                    </div>
                    <div >
                    <label>Nguồn gốc:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" required name="source" value="{{$product->source}}">
                        </div>
                    </div>
                    <div >
                    <label>Trạng thái:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" disabled name="status" value="{{$product->status}}">
                        </div>
                    </div>
                    <div >
                    <label>Tên loại sản phẩm:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="cate" disabled value="{{$product->category->id}}">
                        </div>
                    </div>
                    <div >
                    <label>Hình ảnh:</label>
                    <div class="col-md-6">
                        <input type="file" required class="form-control" value="{{$product->image}}" name="image"><img src="{{'/storage/'.$product->image}}" width="150px" height="130px" >
                        </div>
                    </div>
                    <div >
                    <label>Mô tả:</label>
                    <div class="col-md-6">
                        <textarea  class="form-control"required name="description" style="width: 500px;height: 400px;">
                          {{$product->description}}
                        </textarea>
                        </div>
                    </div>
               <div class="col-md-8" style="margin-top: 20px;">
                  <button type="submit" class="btn btn-success">Chỉnh sửa</button>
               </div>
            </div>
         </form>
      </div>
</body>
</html>
