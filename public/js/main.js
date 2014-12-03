$(document)
.foundation()
.ready(function() {

  // Check if a user is signed in
  var isSignedIn = $.ajax({
    url: '/authcheck',
    method: 'get',
    async: false,
    success: function(ret) {
      testy = ret;
    }
  }).responseText === 'true' ? true : false;

  // Fix CRSF authentication when using AJAX
  $.ajaxSetup({
    headers: {
      'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // Voting
  $('.vote').click(function() {
    if (isSignedIn) {
      var postId = $(this).closest('.panel').attr('class').split('-')[1];
      $(this).toggleClass('active');

      if ($(this).hasClass('fa-arrow-up')) {
        $('.post-' + postId + ' .vote.fa-arrow-down').removeClass('active');
      } else if ($(this).hasClass('fa-arrow-down')) {
        $('.post-' + postId + ' .vote.fa-arrow-up').removeClass('active');
      }

      $.ajax({
        url: '/vote',
        method: 'post',
        data: {
          'class': $(this).attr('class'),
          'postId': postId
        }
      });
    } else {
      $('#guest-modal').foundation('reveal', 'open');
    }
  });
});
