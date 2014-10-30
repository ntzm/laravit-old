<?php

class SubController extends BaseController {

  public function showSub($id)
  {
    $sub = Sub::find($id);

    // Validation here

    return View::make('sub')
      ->with('title', $sub->name);
  }

}
