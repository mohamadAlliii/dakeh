@include('admin/layout/header')
@include('admin/layout/sidebar')
<div class="content-panel">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <a class="btn btn-outline-dark" href="#">افزودن مقاله</a>
                        <span>  تعداد کل :   {{$count}}</span>
                    </header>
                    <table class="table table-striped table-advance table-hover">
                        <thead>
                        <tr>
                            <th>عنوان</th>
                            <th>ترتیب</th>
                            <th>فعال/غیرفعال</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $cat)
                            <tr>
                                <td><a class="title"> {{$cat->name_category}} </a></td>
                                <td>{{$cat->sort}}</td>
                                <td>
                                    <div class="custom-control custom-switch">
                                        <input name="status" type="checkbox" class="custom-control-input"
                                               @if($cat->status=='on') checked @endif
                                        >
                                        <label class="custom-control-label" for="customSwitch1"></label>
                                    </div>
                                </td>
                                <td><a href="{{route('updateCategoryForm',$cat)}}" class="btn btn-primary btn-xs">
                                        <svg class="bi bi-pencil" width="1.2em" height="1.2em"
                                             viewBox="0 0 16 16" fill="currentColor"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M11.293 1.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"
                                                  clip-rule="evenodd"></path>
                                            <path fill-rule="evenodd"
                                                  d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 00.5.5H4v.5a.5.5 0 00.5.5H5v.5a.5.5 0 00.5.5H6v-1.5a.5.5 0 00-.5-.5H5v-.5a.5.5 0 00-.5-.5H3z"
                                                  clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{route('deleteCategory',$cat)}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger btn-xs" value="{{$cat->id}}">
                                            <svg class="bi bi-trash" width="1.2em" height="1.2em"
                                                 viewBox="0 0 16 16" fill="currentColor"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"></path>
                                                <path fill-rule="evenodd"
                                                      d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"
                                                      clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                                <?php $subCategory = \App\Models\Category::where('parent', '=', $cat->id)->get(); ?>
                            @foreach($subCategory as $sub)
                                <tr>
                                    <td>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                                        </svg>
                                        <a class="title" href="#"> {{$sub->name_category}} </a></td>
                                    {{--                                <td>{{$cat->parent}}</td>--}}
                                    <td>{{$sub->sort}}</td>
                                    <td>
                                        <div class="custom-control custom-switch">
                                            <input name="status" type="checkbox" class="custom-control-input"
                                                   @if($sub->status=='on') checked @endif
                                            >
                                            <label class="custom-control-label" for="customSwitch1"></label>
                                        </div>
                                    </td>
                                    <td><a href="{{route('updateCategoryForm',$sub)}}"
                                           class="btn btn-primary btn-xs">
                                            <svg class="bi bi-pencil" width="1.2em" height="1.2em"
                                                 viewBox="0 0 16 16" fill="currentColor"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                      d="M11.293 1.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"
                                                      clip-rule="evenodd"></path>
                                                <path fill-rule="evenodd"
                                                      d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 00.5.5H4v.5a.5.5 0 00.5.5H5v.5a.5.5 0 00.5.5H6v-1.5a.5.5 0 00-.5-.5H5v-.5a.5.5 0 00-.5-.5H3z"
                                                      clip-rule="evenodd"></path>
                                            </svg>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{route('deleteCategory',$sub->id)}}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger btn-xs" value="{{$sub->id}}">
                                                <svg class="bi bi-trash" width="1.2em" height="1.2em"
                                                     viewBox="0 0 16 16" fill="currentColor"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"></path>
                                                    <path fill-rule="evenodd"
                                                          d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"
                                                          clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach

                        </tbody>

                    </table>
                </section>
            </div>
        </div>

    </div>
</div>
</div>
@include('admin/layout/footer')
