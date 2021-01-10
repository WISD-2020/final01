<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageOrderController extends Controller
{
    public function index()
    {
        return view('manage.order.index');
    }

    public function edit($id)
    {
        $data=['id'=>$id];

        return view('manage.order.index',$data);
    }
}
