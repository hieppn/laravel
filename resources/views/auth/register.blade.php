<!DOCTYPE html>
<html>
<head>
   <link rel="shortcut icon" type="image/png" href="/img/logo.jpg"/>
  <title>Home|Register</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<link rel="stylesheet" href="css/login.css">
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body" style="margin-top: 10px;">
<form method="post" action="{{ route('register') }}">
                        @csrf
  <h3>Đăng kí tài khoản mới</h3>
  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name">Tên:</label>
    <input type="text" class="form-control"   placeholder="Enter name" name="name" value="{{ old('name') }}" required autofocus>
@if ($errors->has('name'))
    <span class="help-block">
        <strong>{{ $errors->first('name') }}</strong>
    </span>
@endif
  </div>
  <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
    <label for="class">Số điện thoại:</label>
    <input type="number" class="form-control"required   placeholder="Enter phone" name="phone"value="{{ old('phone') }}">
  </div>
  <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
    <label for="address">Địa chỉ:</label>
    <input type="text" class="form-control" required  placeholder="Enter address" name="address"value="{{ old('address') }}">
  </div>
  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email">Email:</label>
    <input type="text" class="form-control"required   placeholder="Enter email" name="email"value="{{ old('email') }}">
    <strong>{{ $errors->first('email') }}</strong>
  </div>
<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password">Mật khẩu:</label>
    <input type="password" class="form-control"required  placeholder="Password" name="password"value="{{ old('password') }}">
  </div>
  @error('password')
    <div>{{ $message }}</div>
@enderror
<div class="form-group">
                            <label for="password-confirm">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
<div class="display:flex: margin:20px;">
  <button type="submit" class="btn btn-lg btn-primary btn-block text-uppercase" name="register" style="margin-top: 15px;">Đăng kí</button> 
 
 </div>
</form>
<br>
            <br>
            <br>
 <a href="login" ><button class="btn btn-primary">Đăng nhập</button></a>
 </div>
        </div>
      </div>
    </div>
  </div>
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>