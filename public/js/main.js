$(document)
.foundation()
.ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('.vote').click(function() {
    var postId = $(this).closest('.panel').attr('class').split('-')[1]
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
  });
});
