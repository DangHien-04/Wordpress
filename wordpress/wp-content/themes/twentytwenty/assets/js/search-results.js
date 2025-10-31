/**
 * Search Results Page JavaScript
 * Handles interactive features like Like, Share, and Save buttons
 */

(function($) {
    'use strict';

    // Like Button Handler
    $('.like-button').on('click', function(e) {
        e.preventDefault();
        var button = $(this);
        var postId = button.data('post-id');
        
        // Toggle active state
        button.toggleClass('active');
        
        // Update button text
        if (button.hasClass('active')) {
            button.html('<i class="like-icon"></i> Đã thích');
        } else {
            button.html('<i class="like-icon"></i> Thích');
        }
        
        // AJAX call to update like count in database
        $.ajax({
            url: twentytwenty_search_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'toggle_post_like',
                post_id: postId,
                nonce: twentytwenty_search_ajax.nonce
            },
            success: function(response) {
                if (response.success) {
                    console.log('Like status updated');
                }
            },
            error: function() {
                console.log('Error updating like status');
            }
        });
    });

    // Share Button Handler
    $('.share-button').on('click', function(e) {
        e.preventDefault();
        var button = $(this);
        var postId = button.data('post-id');
        
        // Create share modal/dropdown
        var shareOptions = $('<div class="share-options"></div>');
        shareOptions.html(`
            <a href="#" class="share-option share-facebook" data-network="facebook">
                <i class="facebook-icon"></i> Facebook
            </a>
            <a href="#" class="share-option share-twitter" data-network="twitter">
                <i class="twitter-icon"></i> Twitter
            </a>
            <a href="#" class="share-option share-linkedin" data-network="linkedin">
                <i class="linkedin-icon"></i> LinkedIn
            </a>
            <a href="#" class="share-option share-copy" data-network="copy">
                <i class="copy-icon"></i> Sao chép liên kết
            </a>
        `);
        
        // Remove existing share options
        $('.share-options').remove();
        
        // Add share options after button
        button.after(shareOptions);
        
        // Position share options
        shareOptions.css({
            position: 'absolute',
            top: button.offset().top + button.outerHeight() + 5,
            left: button.offset().left,
            zIndex: 1000
        });
        
        // Close share options when clicking outside
        $(document).on('click.shareOptions', function(e) {
            if (!$(e.target).closest('.share-button, .share-options').length) {
                shareOptions.remove();
                $(document).off('click.shareOptions');
            }
        });
    });

    // Handle share option clicks
    $(document).on('click', '.share-option', function(e) {
        e.preventDefault();
        var network = $(this).data('network');
        var postUrl = window.location.href;
        var postTitle = document.title;
        
        switch(network) {
            case 'facebook':
                window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(postUrl), '_blank', 'width=600,height=400');
                break;
            case 'twitter':
                window.open('https://twitter.com/intent/tweet?url=' + encodeURIComponent(postUrl) + '&text=' + encodeURIComponent(postTitle), '_blank', 'width=600,height=400');
                break;
            case 'linkedin':
                window.open('https://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(postUrl) + '&title=' + encodeURIComponent(postTitle), '_blank', 'width=600,height=400');
                break;
            case 'copy':
                // Copy to clipboard
                var tempInput = $('<input>');
                $('body').append(tempInput);
                tempInput.val(postUrl).select();
                document.execCommand('copy');
                tempInput.remove();
                
                // Show feedback
                $(this).html('<i class="check-icon"></i> Đã sao chép!');
                setTimeout(function() {
                    $('.share-options').remove();
                }, 1000);
                break;
        }
        
        // Update share count via AJAX
        var postId = $('.share-button').data('post-id');
        $.ajax({
            url: twentytwenty_search_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'increment_share_count',
                post_id: postId,
                nonce: twentytwenty_search_ajax.nonce
            }
        });
    });

    // Save Button Handler
    $('.save-button').on('click', function(e) {
        e.preventDefault();
        var button = $(this);
        var postId = button.data('post-id');
        
        // Toggle active state
        button.toggleClass('active');
        
        // Update button text
        if (button.hasClass('active')) {
            button.html('<i class="save-icon"></i> Đã lưu');
        } else {
            button.html('<i class="save-icon"></i> Lưu');
        }
        
        // AJAX call to save/unsave post
        $.ajax({
            url: twentytwenty_search_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'toggle_post_save',
                post_id: postId,
                nonce: twentytwenty_search_ajax.nonce
            },
            success: function(response) {
                if (response.success) {
                    console.log('Save status updated');
                }
            },
            error: function() {
                console.log('Error updating save status');
            }
        });
    });

    // Track post views
    function trackPostView(postId) {
        $.ajax({
            url: twentytwenty_search_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'track_post_view',
                post_id: postId,
                nonce: twentytwenty_search_ajax.nonce
            }
        });
    }

    // Track views for all posts on page
    $('.search-result-item').each(function() {
        var postId = $(this).attr('id').replace('post-', '');
        trackPostView(postId);
    });

})(jQuery);
