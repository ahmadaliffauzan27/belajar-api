<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiController extends Controller
{
    // login
    protected function requestToken(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',

        ]);

        // getting user
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw new HttpResponseException(response()->json([
                'message' => 'The provided credentials are incorect.',
                'errors' => [
                    'email' => ['The provided credentials are incorrect.'],
                ],
            ], 401));
        }

        // returning response
        return response()->json($this->getUserAndToken($user, $request->email));
    }

    private function getUserAndToken(User $user, $email){
        return [
            'User' => $user,
            'Access-Token' => $user->createToken($email)->plainTextToken,
        ];
    }

    // logout
    public function logout(Request $request)
    {
        $user = new User();
        $user->tokens()->delete();

        return response()->json(['message'=> 'Successfully logged out']);
    }

    // get user by id
    public function getUserById($id)
{
    $user = User::find($id);

    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }

    return response()->json(['user' => $user], 200);
}
}
