<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttributeRequest;
use App\Models\Attribute;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AttributesController extends Controller
{
    public function index()
    {
//        In rabti be $cat nadare
        $categories = Category::all();
        return view('admin/attributes/createAttribute', compact('categories'));
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request, Category $cat)
    {
        $val = validator()->make($request->all(), [
            'attribute' => 'required'
        ]);
        if ($val->fails()) {
            return [
                $val->errors()
            ];
        }
        $attribute = Attribute::query()->create([
            'name_attribute' => $request->attribute
        ]);
//        $result = $cat->attrubutes()->save($attribute);
//        $category = $cat;
//        $atr = $attribute;
        $result = $cat->attributes()->save($attribute);
        return redirect()->back();
    }

}
