<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>ثبت نام | کنترل پنل</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 post-single">

            <div class="post-title-single"><h1>ثبت نام</h1></div>
            <br><br><br>
            <div class="post-txt-single">
                <form method="post" action={{route('register')}}>
                    @csrf;
                    نام کاربری : <br>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}" required><br>
                    رمز عبور : <br>
                    <input type="password" name="password" class="form-control" required><br>
                    ایمیل : <br>
                    <input type="email" name="email" class="form-control" value="{{old('email')}}" required><br>

                    <div class="custom-checkbox fr">
                        <input type="checkbox" name="remember" class="custom-control-input"
                               id="wp">
                        <label class="custom-control-label" for="wp">مرابه خاطر بسپار</label>
                    </div>
                    <br>
                    <hr>

                    <input type="submit" name="send" value="ثبت نام" class="btn btn-primary">
                </form>
                <br>
            </div>
        </div>

    </div>
</div>
</body>
</html>





