<?php
if ( post_password_required() ) {
	return;
}
?>

<style>
body {
    font-family: "Segoe UI", Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0px;
}

/* ===== Khung form ===== */
.comment-form-wrapper {
    width: 100%;
    max-width: 700px;
    margin: 0 auto 40px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
    border: 1px solid #e9e9e9;
    overflow: hidden;
}

.comment-form-header {
    background-color: #f7f7f8;
    height: 52px;
    padding: 0 18px;
    position: relative;
    border-bottom: 1px solid #e9e9e9;
    
}

.comment-form-title {
    position: absolute;
    left: 20px;
    top: 2px;
    display: inline-block;
    background: linear-gradient(180deg, #ffffff 0%, #fbfbfd 100%);
    color: #111827;
    font-size: 17px;
    font-weight: 700;
    padding: 12px 20px;
    border: 1px solid #e6edf2;
    border-bottom: 0;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.08);
    z-index: 1;
}

.comment-form-content {
    padding: 18px 18px 20px 18px;
    display: flex;
    flex-direction: column;
    gap: 14px;
}

textarea {
    width: 100%;
    min-height: 120px;
    border-radius: 10px;
    border: 1px solid #d9dee6;
    padding: 12px 14px;
    font-size: 15px;
    color: #333;
    resize: vertical;
    transition: 0.2s;
}
textarea::placeholder { color: #9aa3af; }
textarea:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 0 3px rgba(13,110,253,0.18);
    outline: none;
}

/* ===== Nút Share ===== */
.form-submit {
    margin-top: 10px;
    display: flex;
    justify-content: flex-end;
}

.form-submit input[type="submit"] {
    background: #007bff;
    color: #fff;
    border: none;
    padding: 10px 22px;
    font-size: 15px;
    border-radius: 10px;
    cursor: pointer;
    font-weight: 600;
    transition: 0.2s;
    text-transform: uppercase;
}
.form-submit input[type="submit"]:hover {
    background-color: #b0133d;
}

/* Ẩn phần mặc định */
.comment-form p.logged-in-as,
.comment-notes { display: none !important; }

/* ===== Danh sách bình luận ===== */
.comment-list {
    width: 100%;
    max-width: 900px;
    margin: 0 auto;
    list-style: none;
    padding: 0;
}

.comment-list li {
    background-color: #fff;
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 18px;
    border: 1px solid #e0e0e0;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    display: flex;
    align-items: flex-start;
    gap: 20px;
}

.comment-list .avatar {
    border-radius: 50%;
    width: 60px;
    height: 60px;
}

.comment-body {
    flex: 1;
}

.comment-author {
    font-size: 18px;
    font-weight: 700;
    color: #222;
    margin-bottom: 4px;
}

.comment-meta {
    font-size: 13px;
    color: #777;
    margin-bottom: 10px;
}

.comment-content {
    font-size: 15px;
    line-height: 1.6;
    color: #333;
    margin-bottom: 10px;
}

.comment-reply-link {
    display: inline-block;
    background-color: #d31d4d;
    color: #fff !important;
    text-decoration: none;
    padding: 6px 14px;
    border-radius: 8px;
    font-size: 14px;
    transition: 0.2s;
}
.comment-reply-link:hover {
    background-color: #b0133d;
}

/* ===== Bình luận con ===== */
.children {
    margin-left: 80px;
    margin-top: 15px;
}
</style>

<?php if ( comments_open() || pings_open() ) : ?>
<div class="comment-form-wrapper">
    <div class="comment-form-header"><span class="comment-form-title">Make a Post</span></div>
    <div class="comment-form-content">
        <?php
        add_filter('comment_form_defaults', function($defaults) {
            $defaults['logged_in_as'] = '';
            $defaults['comment_notes_before'] = '';
            $defaults['comment_notes_after'] = '';
            $defaults['title_reply'] = '';
            return $defaults;
        }, 1000);

        comment_form(array(
            'title_reply'        => '',
            'title_reply_before' => '',
            'title_reply_after'  => '',
            'cancel_reply_link'  => '',
            'label_submit'  => 'Share',
            'comment_field' => '<textarea id="comment" name="comment" placeholder="What are you thinking..."></textarea>',
            'submit_field'  => '<p class="form-submit">%1$s %2$s</p>',
            'fields'        => array(),
        ));
        ?>
    </div>
</div>
<?php elseif ( is_single() ) : ?>
    <div class="comment-respond" id="respond">
        <p class="comments-closed"><?php _e( 'Comments are closed.', 'twentytwenty' ); ?></p>
    </div>
<?php endif; ?>

<?php if ( have_comments() ) : ?>
<ul class="comment-list">
    <?php
    wp_list_comments(array(
        'style'       => 'ul',
        'avatar_size' => 60,
        'short_ping'  => true,
        'callback'    => function($comment, $args, $depth) {
            ?>
            <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
                <?php echo get_avatar($comment, 60); ?>
                <div class="comment-body">
                    <div class="comment-author"><?php echo get_comment_author(); ?> viết:</div>
                    <div class="comment-meta"><?php echo get_comment_date('j Tháng m Y'); ?> lúc <?php echo get_comment_time(); ?></div>
                    <div class="comment-content"><?php comment_text(); ?></div>
                    <?php comment_reply_link(array_merge($args, array(
                        'reply_text' => 'Bình luận',
                        'depth' => $depth,
                        'max_depth' => $args['max_depth']
                    ))); ?>
                </div>
            </li>
            <?php
        }
    ));
    ?>
</ul>
<?php endif; ?>
