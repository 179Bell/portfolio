<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Camp;
use App\Http\Requests\CommentRequest;
use App\Services\CommentService;

class CommentsController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }
    /**
     * コメントの保存
     * 
     * @param CommentRequest $request
     * @param Comment $comment
     * @return Illuminate\Http\RedirectResponse
     */
    public function store(CommentRequest $request, Comment $comment)   
    {
        list($camp, $campImgs) = $this->commentService->store($request, $comment);
        return redirect()->route('camps.show', compact('camp', 'campImgs'))->with('flash_message', 'コメントを投稿しました');
    }
}
