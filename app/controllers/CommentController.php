<?php

class CommentController extends BaseController {

  public function create()
  {
    $rules = array(
      'content' => 'required|max:3000'
    );

    $validator = Validator::make(Input::all(), $rules);

    if ($validator->fails()) {
      // TODO: Add error
    } else {
      Comment::create(array(
        'post_id'      => Request::segment(2),
        'user_id'      => Auth::user()->id,
        // TEMP
        'parentcmt_id' => 1,
        'content'      => Input::get('content')
      ));
    }
  }
}
