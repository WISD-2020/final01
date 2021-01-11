<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class ManageCommentController extends Controller
{
    public function index()
    {
        $comments = Comments::OrderBy('id','DESC')->get();
        $data=['comments'=>$comments];
        return view('manage.comment.index',$data);
    }
}
