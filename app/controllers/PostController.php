<?php

class PostController extends BaseController {

  /**
   * Show a post
   * @param  string $sub    name of sub
   * @param  int    $postId id of post
   * @return view           the requested post
   */
  public function show($sub, $postId)
  {
    $sub  = Sub::where('name', $sub)->firstOrFail();
    $post = Post::find($postId);

    return View::make('post')
      ->with('title', $post->title)
      ->with('post', $post);
  }

  /**
   * Create a new post
   * @return redirect to the new post
   */
  public function create()
  {
    $post = new Post;

    if ($post->validate(Input::all()))
    {
      $post = Post::create(array(
        'title'   => Input::get('title'),
        'url'     => Input::get('url'),
        'sub_id'  => Sub::where('name', Input::get('sub'))->first()->id,
        'user_id' => Auth::id()
      ));

      return Redirect::to('r/' . $post->sub->name . '/comments/' . $post->id);
    }
    else
    {
      Input::flash();

      return Redirect::to('post/new')
        ->withErrors($post->messages());
    }
  }

  /**
   * Edit an existing post
   * @return redirect to edited post
   */
  public function edit()
  {

  }

  /**
   * Delete an existing post
   * @return redirect to front page
   */
  public function delete()
  {

  }
}
