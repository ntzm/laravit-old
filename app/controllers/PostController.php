<?php

class PostController extends BaseController {

  /**
   * Show a post
   * @param  int  $id
   * @return view
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
   * @return redirect
   */
  public function create()
  {
    $title = Input::get('title');
    $url   = Input::get('url');
    $sub   = Input::get('sub');

    $rules = array(
      'title' => 'required|max:100',
      'url'   => 'required|max:2083|active_url',
      'sub'   => 'required|exists:subs,name'
    );

    $validator = Validator::make(Input::all(), $rules);

    if ($validator->fails()) {
      Input::flash();

      return Redirect::to('submit')->withErrors($validator);
    } else {
      $post = Post::create(array(
        'title'   => Input::get('title'),
        'url'     => Input::get('url'),
        'sub_id'  => Sub::where('name', Input::get('sub'))->first()->id,
        'user_id' => Auth::user()->id
      ));

      return Redirect::to('p/' . $post->id);
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
