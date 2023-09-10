<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\traits\response;
use Carbon\Exceptions\Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use response;

    public function show()
    {
        $categories = Category::where('parent', 0)->get();
        $count = Category::all()->count();
        return view('admin/categories/listCategory', compact('categories', 'count'));
    }

//    public function store(Request $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
//    {
//        $val = validator()->make($request->all(), [
//            'name_category' => 'required',
//            'parent' => 'required|integer',
//        ]);
//        if ($val->fails()) {
////            return response()->json([
////                'messages' => $val->errors()
////            ]);
//            $error = $val->errors();
//            return view('admin/layout/createCategory',compact('error'));
//        } else {
//            $cat = Category::query()->create([
//                'name_category' => $request->name_category,
//                'parent' => $request->parent,
//                'status' => $request->status
//            ]);
//        }
//        return  redirect()->back();
////        return \response()->json([
////            'messages' => $cat
////        ], 200);
//    }
    public function createCategory(Request $request)
    {
        Category::create([
            'name_category' => $request->name_category,
            'sort' => $request->sort,
            'parent' => $request->parent,
            'status' => $request->status
        ]);
        return redirect()->back();
    }

//    public function show(Category $category)
//    {
//        $cats = Category::all();
//        return response()->json([
//            'data' => [
//                'allcats' => $cats
//            ]
//        ]);
//    }

    public function createCategoryForm()
    {
        $categories = Category::where('parent', 0)->get();
        return view('admin/layout/content', compact('categories'));
    }

    public function updateCategoryForm(Category $category)
    {
//        $category = Category::where('id',$id)->first();
        $categories = Category::where('parent', 0)->get();
        return view('admin/categories/updateCategoryForm', compact('category', 'categories'));
    }

    public function updateCategory(Request $request, Category $category)
    {
        $category->update([
            'name_category' => $request->name_category,
            'sort' => $request->sort,
            'parent' => $request->parent,
            'status' => $request->status,
        ]);
        return redirect()->back();
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }

//    public function update(Request $request, Category $category)
//    {
////        @csrf_field();
////        @method_field('post');
//        $category->update([
//            'name_category' => $request->name_category,
//            'sort' => $request->sort,
//            'parent' => $request->parent,
//            'status' => $request->status
//        ]);
////        return response()->json([
////            'messages' => 'update category success'
////        ]);
//    }

//    public function destroy(Category $category)
//    {
//        @csrf_field();
//        @method_field('delete');
//        $delCat = $category->delete();
//        return response()->json([
//            'data' => [
//                '  deleted this item' => $category
//            ]
//        ]);
//    }

//    public function children(Category $category)
//    {
//        return $this->successResponse(new CategoryResource($category->load('children')), 200);
//
//    }

//    public function parent(Category $category)
//    {
//        return $this->successResponse(new CategoryResource($category->load('parent')), 200);
//    }
}
