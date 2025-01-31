<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index($user_id)
    {
        $user = User::where('user_id', $user_id)->firstOrFail();
        return view('profile.index', compact('user'));
    }
}
