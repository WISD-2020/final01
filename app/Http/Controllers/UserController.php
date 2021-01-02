<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit()
    {
        return view('change');
    }

    public function update(Request $request,$name)
    {
        $post = User::find($name);
        $post->update($request->all());
        return redirect()->route('dashboard');
    }
}
