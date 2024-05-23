<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\TokenRepository;

class AuthApiController extends Controller
{
    public function registerUser(Request $request)
    {
        $rules = [
            'fullname' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email|email',
            'password' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Error Invalid Fields',
                    'error' => $validator->errors(),
                ],
                422,
            );
        }

        $datauser = [
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_active' => 0,
            'level' => 'user',
        ];

        $user = User::create($datauser);

        return response()->json(
            [
                'status' => true,
                'message' => 'Register user success',
                'user' => $user,
            ],
            200,
        );
    }

    public function loginUser(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Error Invalid Fields',
                    'error' => $validator->errors(),
                ],
                422,
            );
        }

        $credential = $request->only(['email', 'password']);

        if (!auth()->attempt($credential)) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Wrong username or password',
                ],
                401,
            );
        }


        if (!Auth::attempt($request->only(['email', 'password']))) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Wrong username or password',
                ],
                401,
            );
        }

        $datauser = User::where('email', $request->email)->first();

        // cek token apakah ada
        if (!$datauser->token) {
            $token = $datauser->createToken('api-token');
        }else{
            // delete token
            $datauser->tokens()->delete();
            $token = $datauser->createToken('api-token');
        }
        return response()->json([
            'status' => true,
            'message' => 'Login Success',
            'token' => $token,
            'user' => $datauser,
        ]);
    }

    public function logout(Request $request)
    {
        $tokenId = $request->user()->token()->id;
        // $id_user = auth('api')->user()->id;
        $tokenRepository = app(TokenRepository::class);
        $tokenRepository->revokeAccessToken($tokenId);

        return response()->json(
            [
                'status' => true,
                'message' => 'Logout success',
            ],
            200,
        );
    }
}
