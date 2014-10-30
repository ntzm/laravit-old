<?php

class PostController extends BaseController {

  public function showPost($id)
  {
    $post = Post::find($id);

    // Validation here

    return View::make('post')
      ->with('title', $post->title);
  }

  public function newPost()
  {
    $title = Input::get('title');
    $url   = Input::get('url');
    $sub   = Input::get('sub');

    $validator = Validator::make(
      array(
        'title' => $title,
        'url'   => $url,
        'sub'   => $sub
      ),
      array(
        'title' => 'required',
        'url'   => 'required|active_url',
        'sub'   => 'required|exists:subs,name'
      )
    );

    if ($validator->fails()) {
      Input::flash();

      return Redirect::to('submit')->withErrors($validator);
    } else {
      $post = Post::create(array(
        'title'  => $title,
        'url'    => $url,
        'sub_id' => Sub::where('name', '=', $sub)->first()->id,
        'user_id' => 1
      ));

      return Redirect::to('p/' . $post->id);
    }
  }

}
