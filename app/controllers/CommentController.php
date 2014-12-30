<?php

class CommentController extends BaseController {

    /**
     * Create a new comment
     * @return redirect to somewhere idk
     */
    public function create()
    {
        $comment = new Comment;

        if ($comment->validate(Input::all()))
        {
            Comment::create([
                'post_id'      => Request::segment(2),
                'user_id'      => Auth::user()->id,
                // TEMP
                'parentcmt_id' => 1,
                'content'      => Input::get('content')
            ]);
        }
    }
}
