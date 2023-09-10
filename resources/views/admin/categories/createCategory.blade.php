{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('css/style.css')}}">--}}
{{--    <title>افزودن دسته جدید</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="content-panel">--}}
{{--    <div class="container-fluid" style="padding: 0">--}}
{{--        <div class="row">--}}

{{--            <div class="col-md-12">--}}
{{--                <p class="title-form" style="text-align: center"> افزودن دسته جدید</p>--}}
{{--                <form action="{{route('createCategory')}}" class="my-form" method="post">--}}
{{--                    {{csrf_field()}}--}}
{{--                    {{method_field('post')}}--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-9" style="margin: auto;">--}}

{{--                            <input class="form-control inputbig" type="text" name="name_category"--}}
{{--                                   placeholder="عنوان را اینجا وارد کنید">--}}
{{--                            <br>--}}
{{--                            <input class="form-control inputbig" type="text" name="sort"--}}
{{--                                   placeholder="ترتیب نمایش را بصورت عددی وارد کنید">--}}
{{--                            <br>--}}
{{--                            <select class="form-control" name="parent">--}}
{{--                                <option value="0">سرگروه</option>--}}
{{--                                @foreach($categories as $cat)--}}
{{--                                    <option value="{{$cat->id}}">{{$cat->name_category}}</option>--}}
{{--                                @endforeach--}}

{{--                            </select><br>--}}

{{--                            <div class="custom-control custom-switch">--}}
{{--                                <input name="status" type="checkbox" class="custom-control-input" id="customSwitch1"--}}
{{--                                       checked="">--}}
{{--                                <label class="custom-control-label" for="customSwitch1">فعال/غیرفعال</label>--}}
{{--                            </div>--}}
{{--                            <br>--}}
{{--                            <hr>--}}
{{--                            <input type="submit" class="btn btn-primary" value="ارسال">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--</body>--}}
{{--</html>--}}
