<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageDashboardController extends Controller
{

    public function index()
    {
        $name=Auth::user();


        if (Auth::check()&& auth()->user()->class==1) {
            // 已登入

                return view('manage.dashboard.index', $name);
        }
        else
        {
            return redirect()->route('login');
        }

    }
}
