<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
class UserController extends Controller
{
    // USER
    public function allUser()
    {
        $data = User::get();

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'User successfully fetched!',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'No user found'
            ], 400);
        }
    }

    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:6'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            "role" => 'user'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Register user success!'
        ], 201);
    }

    public function getMyProfile()
    {
        try {
            $data =  User::find(auth()->user()->id);
            return response()->json([
                'status' => true,
                'message' => 'User successfully fetched!',
                'data' => $data
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error,contact administrator!',
                'errors' => $e->getMessage()
            ], 400);
        }
    }

    public function updateUser(Request $request)
    {
        $data = $request->only(['nama', 'email', 'password']);

        $validator = Validator::make($data, [
            'nama' => 'unique:users',
            'email' => 'unique:users',
            'password' => 'unique:users',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error on validation!',
                'errors' => $validator->errors()
            ], 422);
        }
        try {
            $response = User::findOrFail(auth()->user()->id);
            $response->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return response()->json([
                'success' => true,
                'message' => 'success',
                'data' => $response
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Update user error!',
                'errors' => $e->getMessage()
            ], 422);
        }
    }

    public function delete($id)
    {
        try {
            $user =  User::findOrFail($id);
            $user->delete();
            return response()->json([
                'success' => true,
                'message' => 'Success'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Err',
                'errors' => $e->getMessage()
            ], 422);
        }
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'success' => false,
                'message' => 'Wrong email/password'
            ], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login success!',
            'data' => [
                'id' => $user->id,
                'nama' => $user->nama,  
                'token' => $token,
            ]
        ], 200);
    }

    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();
            return response()->json([
                'success' => true,
                'message' => 'Logged out success!'
            ], 200);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error logout, please try again!',
                'errors' => $e->getMessage()
            ], 422);
        }
    }
}
