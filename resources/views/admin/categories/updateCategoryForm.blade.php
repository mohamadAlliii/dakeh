@include('admin/layout/header')
@include('admin/layout/sidebar')
{{--<div class="content-wrapper">--}}
<!-- Content Header (Page header) -->
<section class="content-header" style="margin-right: 15%">
    <div class="content-panel">
        <div class="container-fluid" style="padding: 0">
            <div class="row">

                <div class="col-md-12">
                    <p class="title-form" style="text-align: center">ویرایش دسته</p>
                    <form action="{{route('updateCategory',$category->id)}}" class="my-form" method="post">
                        {{csrf_field()}}
                        {{method_field('post')}}
                        <div class="row">
                            <div class="col-md-9" style="margin: auto;">

                                <input class="form-control inputbig" type="text" name="name_category"
                                       placeholder="{{$category->name_category}}">
                                <br>
                                <input class="form-control inputbig" type="text" name="sort"
                                       placeholder="{{$category->sort}}">
                                <br>
                                <select class="form-control" name="parent">
                                    <option value="0" name="parent">سرگروه</option>
                                    @foreach($categories as $cat)
                                        <option value="{{$cat->id}}"
                                                @if($category->parent==$cat->id)selected @endif
                                        >{{$cat->name_category}}</option>
                                    @endforeach

                                </select><br>

                                <div class="custom-control custom-switch">
                                    <input name="status" type="checkbox" class="custom-control-input"
                                           @if($category->status=='on') checked @endif >
                                    <label class="custom-control-label" for="customSwitch1">فعال/غیرفعال</label>
                                </div>
                                <br>
                                <hr>
                                <input type="submit" class="btn btn-primary" value="ذخیره">
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- /.content -->
</div>
@include('admin/layout/footer')
