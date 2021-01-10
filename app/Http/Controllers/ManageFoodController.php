<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageFoodController extends Controller
{
    public function index()
    {
        return view('manage.food.index');
    }

    public function create()
    {
        return view('manage.food.create');
    }

    public function edit($id)
    {
        $data=['id'=>$id];

        return view('manage.food.index',$data);
    }
}
