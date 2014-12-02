<?php

class VoteController extends BaseController {

  public function vote()
  {
    $class        = Input::get('class');
    $postId       = Input::get('postId');
    $previousVote = PostVote::where('user_id', Auth::id())->where('post_id', $postId)->first();
    $isUpvote     = str_contains($class, 'up');

    // If there is a vote by the same user on the same post
    if (!is_null($previousVote)) {

      // If it is an upvote
      if ($isUpvote) {

        // If it will cancel the previous upvote out
        if ($previousVote->type === 'up') {
          $previousVote->delete();
        } else {
          $previousVote->update(array('type' => 'up'));
        }
      } else {

        // If it will cancel the previous downvote out
        if ($previousVote->type === 'down') {
          $previousVote->delete();
        } else {
          $previousVote->update(array('type' => 'down'));
        }
      }
    } else {

      // Create a new vote
      PostVote::create(array(
        'type'    => $isUpvote ? 'up' : 'down',
        'user_id' => Auth::id(),
        'post_id' => $postId
      ));
    }
  }
}
