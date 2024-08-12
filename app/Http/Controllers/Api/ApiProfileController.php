<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiProfileController extends Controller
{
    public function update(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|confirmed|min:8',
        ]);
        try {
            
            $user = Auth::user();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
    
            if ($request->filled('password')) {
                $user->password = Hash::make($request->input('password'));
            }
    
            $user->save();
    
            return response()->json(['message' => 'Profile updated successfully!']);
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
