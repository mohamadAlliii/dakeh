<?php

namespace App\Http\Controllers;

use App\Http\Resources\advertisingResource;
use App\Models\Advertising;
use App\Models\Image;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\traits\response;

class AdvertisingController extends Controller
{
    use response;

    /**
     * @throws AuthorizationException
     * @throws BindingResolutionException
     */
    public function create(Request $request): \Illuminate\Http\JsonResponse
    {
        $val = validator()->make($request->all(), [
            'title' => 'required',
            'body' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'image_url' => 'required|image',
//            'video_url' => 'file'
        ]);
        if ($val->fails()) {
            return $this->errorResponse($val->errors(), 500);
        } else {
            $image = $request->file('image_url');
            $fileName = Carbon::now()->microsecond . '_' . $image->extension();
            $request->image_url->move(public_path('images'), $fileName);
            $user_id = Auth::id();
            $adv = Advertising::query()->create([
                'user_id' => $user_id,
                'category_id' => $request->category_id,
                'address_id' => $request->address_id,
                'title' => $request->title,
                'body' => $request->body,
                'slug' => $request->slug,
                'description' => $request->description,
            ]);
            $ad_id = $adv->id;
            Image::query()->create([
                'advertising_id' => $ad_id,
                'image_url' => $fileName
            ]);
        }
//        return $this->successResponse($adv, 200);
        return $this->successResponse(new advertisingResource($request), 200);
//        return response()->json(["message" => 'seccess']);
    }

    public function index()
    {
        $user_id = Auth::id();
        $advertisement = Advertising::all()->where('user_id', $user_id);
        return \response()->json([
            $advertisement
        ]);
    }

    /**
     * @throws BindingResolutionException
     */
    public function update(Request $request, Advertising $advertising): \Illuminate\Http\JsonResponse
    {
        $val = validator()->make($request->all(), [
            'title' => 'required',
            'body' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'image_url' => 'image',
//            'video_url' => 'file'
        ]);
        if ($val->fails()) {
            return $this->errorResponse($val->errors(), 500);
        } else {
            if ($request->has('image')) {
                $image = $request->file('image_url');
                $fileName = Carbon::now()->microsecond . '_' . $image->extension();
                $request->image_url->move(public_path('images'), $fileName);
            }
            $user_id = Auth::id();
            $advertising->update([
                'user_id' => $user_id,
                'category_id' => $request->category_id,
                'address_id' => $request->address_id,
                'title' => $request->title,
                'body' => $request->body,
                'slug' => $request->slug,
                'description' => $request->description,
            ]);
            $ad_id = $advertising->id;
            Image::updated([
                'advertising_id' => $ad_id,
                'image_url' => $request->has('image') ? $fileName : $advertising->image_url
            ]);
        }
//        return $this->successResponse($adv,200);
        return response()->json(["message" => 'update seccess']);
    }

    public function delete(Advertising $advertising): \Illuminate\Http\JsonResponse
    {
        $delete = $advertising->delete();
        return $this->successResponse($delete, 200);
    }


}

