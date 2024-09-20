<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::all();
        // return response()->json($users);
        $users = User::with('manager')->get();
        return response()->json($users);

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new_user= User::create($request->all());
        return response()->json([
            'status'=>true,
            'message'=>'New User is created successfully',
            'data'=>$new_user
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function login(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        $user = User::where('username', $request->username)->first();
    
        if ($user && Hash::check($request->password, $user->password)) {
            // Authentication passed
            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $user->id,
                    'username' => $user->username,
                    'name' => $user->name,
                    'role' => $user->role,
                ],
            ]);
        } else {
            // Authentication failed
            return response()->json(['success' => false, 'message' => 'Invalid credentials']);
        }
    }
}
