<?php

namespace App\Http\Controllers;

use App\Models\User;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit()
    {
        if (Auth::check()) {
            // 已登入

            $info = Auth::user();
            $data = ['user'=>$info];
            #dd($data);
            return view('user.change',$data);
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function update(Request $request,$name)
    {
        if (Auth::check()) {
            // 已登入

            $info = User::find($name);
            $info->update($request->all());
            return redirect()->route('dashboard');
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
