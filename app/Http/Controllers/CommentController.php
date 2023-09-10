<?php

namespace App\Http\Controllers;

use App\Models\Advertising;
use App\Models\Comment;
use App\traits\response;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * @throws BindingResolutionException
     */
    public function create(Request $request, Advertising $advertising): string|\Illuminate\Support\MessageBag
    {
        $val = validator()->make($request->all(), [
            'text' => 'required'
        ]);
        if ($val->fails()) {
            return $val->errors();
        } else {
            $id = Auth::id();
            $cm = Comment::query()->create([
                'text' => $request->text,
                'user_id' => $id,
                'advertising_id' => $advertising->id
            ]);
        }
        return response()->json('success');
    }


    /**
     * @throws BindingResolutionException
     */
    public function update(Request $request, Comment $comment): string|\Illuminate\Support\MessageBag
    {
        $validator = validator()->make($request->all(), [
            'text' => 'required'
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $comment->update([
                'text' => $request->text,
            ]);
        }
        return response()->json('success');
    }

    public function delete(Comment $comment): \Illuminate\Http\JsonResponse
    {
        $deleteCm = $comment->delete();
        return response()->json($deleteCm, 200);
    }
}
