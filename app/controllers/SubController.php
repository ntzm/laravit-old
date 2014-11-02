<?php

class SubController extends BaseController {

  /**
   * Show a sub
   * @param  string $name
   * @return view
   */
  public function show($name)
  {
    $sub = Sub::where('name', $name)->firstOrFail();

    return View::make('sub')
      ->with('title', $sub->name)
      ->with('posts', $sub->posts()->paginate(15));
  }
}
