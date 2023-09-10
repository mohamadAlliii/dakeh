@include('admin/layout/header')
@include('admin/layout/sidebar')
<section class="content-panel" style="margin-right: 15%">
    <div class="content-panel">
        <div class="row">
            <div class="col-md-12">
                <p class="title-form" style="text-align: center"> افزودن ویژگی جدید</p>
                <form action="{{route('createAttribute')}}" class="my-form" method="post">
                    {{csrf_field()}}
                    {{method_field('post')}}

                    <div class="row">
                        <div class="col-md-9" style="margin: auto;">
                            <input class="form-control inputbig" type="text" name="attribute"
                                   placeholder="ویژگی را اینجا وارد کنید">
                            <br>
                            <h5> برای کدام دسته</h5>
                            <select class="form-control" name="category">
{{--                                age $cat ro nemishnase babat chiz digast Koja setesh mikoni ??--}}
                                @foreach($categories as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name_category}}</option>
                                @endforeach

                            </select><br>

                            {{--                                <div class="custom-control custom-switch">--}}
                            {{--                                    <input name="status" type="checkbox" class="custom-control-input" id="customSwitch1"--}}
                            {{--                                           checked="">--}}
                            {{--                                    <label class="custom-control-label" for="customSwitch1">فعال/غیرفعال</label>--}}
                            {{--                                </div>--}}
                            <br>
                            <hr>
                            <input type="submit" class="btn btn-primary" value="ایجاد">
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>

</div>
@include('admin/layout/footer')
