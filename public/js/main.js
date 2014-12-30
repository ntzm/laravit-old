$(document)
    .foundation()
    .ready(function () {

        // Functions
        var updateSelectedPost = function () {
            if (selectedPostNumber < 0) {
                selectedPostNumber = 0;
            } else {
                $('.callout').removeClass('callout');
                $('.post').eq(selectedPostNumber).addClass('callout');
            }
        }

        // Variables
        var selectedPostNumber = 0;

        // Check if a user is signed in
        var isSignedIn = $.ajax({
            url: '/authcheck',
            method: 'get',
            async: false
        }).responseText === 'true' ? true : false;

        // Fix CRSF authentication when using AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Voting
        $('.vote').click(function () {
            if (isSignedIn) {
                var postId = $(this).closest('.panel').attr('class').split(' ')[2];
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

        // Keyboard navigation
        $('body').on('keydown', function (e) {
            switch (e.keyCode) {
                // J - go down one post
                case 74:
                    selectedPostNumber++;
                    updateSelectedPost();
                    break;
                // K - go up one post
                case 75:
                    selectedPostNumber--;
                    updateSelectedPost();
                    break;
                // A - upvote
                case 65:
                    break;
                // Z - downvote
                case 90:
                    break;
                // C - open comments
                case 67:
                    var $post = $('.post').eq(selectedPostNumber);
                    window.location.href += '/comments/' + $post.attr('class').split(' ')[2];
                    break;
            }
        });

        updateSelectedPost();
    });
