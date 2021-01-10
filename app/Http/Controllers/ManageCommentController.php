<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageCommentController extends Controller
{
    public function index()
    {
        return view('manage.dashboard.index');
    }
}
