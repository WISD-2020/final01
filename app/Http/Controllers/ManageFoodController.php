<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use function Illuminate\Events\queueable;

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
        $food=Food::find($id);
        $data=['food'=>$food];

        return view('manage.food.edit',$data);
    }

    public function store(Request $request)
    {
        $food=new Food();


        $food->id = $request->id;

       $image=$request->file('image');
       $imgname=time().'.'.$image->getClientOriginalExtension();
        $request->image->move(public_path('/img'),$imgname);
        $food->image="img/".$imgname;

        $food->name = $request->name;
        $food->price = $request->price;
        $food->is_selling = $request->is_selling;
        $food->is_hot = $request->is_hot;

        $food->save();

        return redirect()->route('manage.food.index');

    }

    public function update(Request $request,$id)
    {
        $food=Food::find($id);
        $food->update($request->all());
        return redirect()->route('manage.food.index');
    }

    public function destroy($id)
    {
        Food::destroy($id);
        return redirect()->route('manage.food.index');
    }

}
