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

  /**
   * Create a new sub
   * @return redirect
   */
  public function create()
  {
    $rules = array(
      'name' => 'required|max:20|unique:subs'
    );

    $validator = Validator::make(Input::all(), $rules);

    if ($validator->fails()) {
      return Redirect::to('createsub')
        ->withErrors($validator->messages());

    } else {
      Sub::create(array(
        'name'     => Input::get('name'),
        'owner_id' => Auth::user()->id
      ));

      return Redirect::to('r/' . Input::get('name'));
    }
  }
}
