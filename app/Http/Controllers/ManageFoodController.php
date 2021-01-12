<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class ManageFoodController extends Controller
{
    public function index()
    {
        $food = Food::OrderBy('id','DESC')->get();
        $data=['foods'=>$food];
        return view('manage.food.index',$data);
    }

    public function create()
    {
        return view('manage.food.create');
    }

    public function edit($id)
    {
        $data=['id'=>$id];

        return view('manage.food.edit',$data);
    }

    public function store(Request $request)
    {
        food::create($request->all());
        return redirect()->route('manage.food.index');

    }

    public function destroy($id)
    {
        Food::destroy($id);
        return redirect()->route('manage.food.index');
    }

}
