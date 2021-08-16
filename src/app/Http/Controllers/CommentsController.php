<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Camp;
use App\Http\Requests\CommentRequest;

class CommentsController extends Controller
{
    /**
     * コメントの保存
     * 
     * @param CommentRequest $request
     * @param Comment $comment
     * @return Illuminate\Http\RedirectResponse
     */
    public function store(CommentRequest $request, Comment $comment)   
    {
        $comment->fill($request->all())->save();
        $camp = Camp::find($request->camp_id);
        $campImgs = Camp::with('campImgs')->get();
        return redirect()->route('camps.show', compact('camp', 'campImgs'))->with('flash_message', 'コメントを投稿しました');
    }
}
