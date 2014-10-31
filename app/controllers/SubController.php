<?php

class SubController extends BaseController {

  public function showSub($name)
  {
    $sub = Sub::where('name', $name)->firstOrFail();

    return View::make('sub')
      ->with('title', $sub->name)
      ->with('posts', Post::where('sub_id', $sub->id)->get());
  }

}
