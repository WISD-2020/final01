<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageDashboardController extends Controller
{
    public function index()
    {
        return view('manage.dashboard.index');
    }
}
