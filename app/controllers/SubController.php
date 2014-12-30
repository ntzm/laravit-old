<?php

class SubController extends BaseController {

    /**
     * Show a sub
     *
     * @param  string $name
     *
     * @return view   sub with posts
     */
    public function show($name)
    {
        $sub = Sub::where('name', $name)->firstOrFail();

        return View::make('sub')
            ->with('sub', $sub->name)
            ->with('posts', $sub->posts()->paginate(15));
    }

    /**
     * Create a new sub
     * @return redirect to new sub
     */
    public function create()
    {
        $sub = new Sub;

        if ($sub->validate(Input::all()))
        {
            Sub::create([
                'name'     => Input::get('name'),
                'owner_id' => Auth::id()
            ]);

            return Redirect::to('r/' . Input::get('name'));
        }
        else
        {
            return Redirect::to('sub/new')
                ->withErrors($sub->messages());
        }
    }

    /**
     * Edit an existing sub
     * @return redirect to edited sub
     */
    public function edit()
    {

    }

    /**
     * Delete an existing sub
     * @return redirect to front page
     */
    public function delete()
    {

    }
}
