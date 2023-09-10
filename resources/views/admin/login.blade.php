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
    <title>ورود | کنترل پنل</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 post-single">

            <div class="post-title-single"><h1>ورود به سایت</h1></div>
            <br><br><br>
            <div class="post-txt-single">
                <form method="post" action="{{route('login')}}">
                    @csrf
                    ایمیل : <br>
                    <input type="text" name="email" class="form-control" required><br>
                    رمز عبور : <br>
                    <input type="text" name="password" class="form-control" required><br>

                    <div class="custom-checkbox fr">
                        <input type="checkbox" name="remember" value="wordpress" class="custom-control-input"
                               id="wp">
                        <label class="custom-control-label" for="wp">مرابه خاطر بسپار</label>
                    </div>
                    <br>
                    <hr>

                    <input type="submit" name="send" value="ورود" class="btn btn-primary">
                </form>
                <br>
            </div>
        </div>

    </div>
</div>
</body>
</html>


    <br>
    <br>

