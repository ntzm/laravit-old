<?php

class PostController extends BaseController {

  public function showPost($id)
  {
    $post = Post::find($id);

    // Validation here

    return View::make('post')
      ->with('title', $post->title);
  }

}
