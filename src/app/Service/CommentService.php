<?php

namespace App\Services;

use App\Comment;
use App\Camp;
use App\Http\Requests\CommentRequest;

final class CommentService
{
    public function store(CommentRequest $request, Comment $comment)
    {
        $comment->fill($request->all())->save();
        $camp = Camp::find($request->camp_id);
        $campImgs = Camp::with('campImgs')->get();
        return [$camp, $campImgs];
    }   
}