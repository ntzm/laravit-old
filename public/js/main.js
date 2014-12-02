$(document)
.foundation()
.ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('.vote').click(function() {
    $(this).toggleClass('active');
    if ($(this).hasClass('fa-arrow-up')) {
      $('.vote.fa-arrow-down').removeClass('active');
    } else if ($(this).hasClass('fa-arrow-down')) {
      $('.vote.fa-arrow-up').removeClass('active');
    }
    $.ajax({
      url: '/vote',
      method: 'post',
      data: $(this).attr('class'),
      success: function(ret) {
        console.log(ret);
      },
      error: function() {
        console.log("Whoops!");
      }
    });
  });
});
