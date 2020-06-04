<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public $successStatus = 200;
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'phone' => 'required|numeric|min:10',
            'c_password' => 'required|same:password',
        ]);
        $request->merge(['password' => bcrypt($request->password)]);
        $user = User::create($request->all());
        $response['token'] = $user->createToken('movers-api-token')->plainTextToken;
        $response['user_data'] = $user;
        $response["token_type"] = "Bearer";
        return response()->json(['success' => $response], $this->successStatus);

    }
    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function getUser()
    {
        $user = Auth::user();
        return response()->json(['user_data' => $user], $this->successStatus);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {

            return response([
                'message' => ['These credentials do not match our records.'],
            ], 404);
        }

        $token = $user->createToken('movers-api-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
            "token_type" => "Bearer",
        ];

        return response($response, $this->successStatus);
    }
}
