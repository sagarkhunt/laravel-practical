<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    // show profile page
    public function showProfile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }
}
