<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Camp;
use App\CampImg;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(CommentRequest $request, Comment $comment)   
    {
        $comment->fill($request->all())->save();
        $camp = Camp::find($request->camp_id);
        $campImgs = Camp::with('campImgs')->get();
        return redirect()->route('camps.show', compact('camp', 'campImgs'));
    }
}
