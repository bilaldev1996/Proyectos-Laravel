<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class EmailVerify extends Controller
{
    public function verify(Request $request)
    {
        return view('auth.verify-email');

    }
}
