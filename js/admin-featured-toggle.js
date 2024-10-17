jQuery(document).ready(function($) {
    // Handle the click event on the featured checkbox
    $('.featured-checkbox').on('click', function() {
        var postId = $(this).data('post-id');
        var isChecked = $(this).is(':checked');

        // Send AJAX request to toggle the featured status
        $.ajax({
            url: adminAjax.ajaxurl,
            method: 'POST',
            data: {
                action: 'toggle_featured_post',
                post_id: postId
            },
            success: function(response) {
                if (response === 'featured') {
                    console.log('Post marked as featured');
                } else if (response === 'unfeatured') {
                    console.log('Post unmarked as featured');
                }
            }
        });
    });
});