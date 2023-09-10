<?php

namespace App\Http\Controllers;

use http\Client\Curl\User;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\traits\response;
use Ramsey\Uuid\Rfc4122\Validator;


class UserController extends Controller
{
    use response;

    public function register(Request $request)
    {
        $val = validator()->make($request->all(), [
            'fullName' => 'required|max:20',
            'email' => 'required|email',
            'password' => 'required',
            'tell' => 'required'
        ]);
        if ($val->fails()) {
            return $this->errorResponse($val->errors(), 404);
        } else {
            $user = \App\Models\User::query()->create([
                'fullName' => $request->fullName,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'tell' => $request->tell,
            ]);
            $token = $user->createToken("API Token")->plainTextToken;
            return $this->successResponse($user, 200) . 'token' . '=>' . $token;
        }
    }

    /**
     * @throws BindingResolutionException
     */
    public function login(Request $request)
    {
        $val = validator()->make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($val->fails()) {
            return $this->errorResponse($val->errors(), 400);
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken("API Token")->plainTextToken;
            return $this->successResponse($user, 200) . 'token' . '=>' . $token;
        } else {
            return $this->errorResponse('user is invalid', 404);
        }
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json('logged out', 200);
    }

    public function deleteAccount()
    {
        $user = Auth::id();
        \App\Models\User::query()->findOrFail($user)->delete();
        if ($user = null) {
            return response()->json([
                'message' => 'user not found'
            ]);
        } else {
            return response()->json([
                'message' => 'delete Account successfully'
            ]);
        }
    }
}
