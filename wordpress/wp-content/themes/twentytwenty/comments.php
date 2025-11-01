<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bình luận bài viết</title>
    <style>
        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0px;
        }

        /* Khung tổng thể */
        .comment-form-wrapper {
            width: 100%;
            max-width: 700px;
            margin: 0 auto 40px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
            border: 1px solid #e9e9e9;
            overflow: visible;
        }

        /* Thanh tiêu đề */
        .comment-form-header {
            background-color: #f7f7f8;
            height: 52px;
            padding: 0 18px;
            position: relative;
            border-bottom: 1px solid #e9e9e9;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
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

        /* Nội dung form */
        .comment-form-content {
            padding: 12px 18px 76px 18px; /* chừa chỗ cho nút share nổi */
            display: grid;
            gap: 12px;
            position: relative;
        }

        /* Ghi đè CSS mặc định của WordPress */
        .comment-respond p {
            margin: 0 !important;
            padding: 0 !important;
        }

        .comment-form-comment {
            margin: 0 !important;
        }

        .comment-reply-title {
            display: none !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        #respond {
            padding-top: 0 !important;
            margin-top: 0 !important;
        }

        textarea {
            width: 100%;
            min-height: 140px;
            border-radius: 10px;
            border: 1px solid #d9dee6;
            padding: 12px 14px;
            margin: 0;
            font-size: 15px;
            color: #333;
            background-color: #fff;
            resize: vertical;
            box-shadow: inset 0 1px 2px rgba(0,0,0,0.03);
            transition: box-shadow 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }
        textarea::placeholder { color: #9aa3af; }

        textarea:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 3px rgba(13,110,253,0.18);
            outline: none;
        }

        /* Căn nút Share sang phải */
        .form-submit {
            margin: 0;
            padding: 0;
            height: 0;
        }

        .form-submit input[type="submit"] {
            position: absolute;
            right: 22px;
            bottom: 22px;
            background: linear-gradient(180deg, #38b6ff 0%, #0d6efd 100%);
            color: #fff;
            border: none;
            padding: 12px 26px;
            font-size: 15px;
            border-radius: 14px;
            cursor: pointer;
            font-weight: 600;
            box-shadow: 0 16px 32px rgba(13,110,253,0.35);
            transition: background-color 0.2s, box-shadow 0.2s, transform 0.1s;
            text-transform: lowercase;
        }

        .form-submit input[type="submit"]:hover {
            background-color: #1e7bf0;
            transform: translateY(-1px);
            box-shadow: 0 20px 36px rgba(13,110,253,0.4);
        }

        /* Ẩn phần mặc định của WP */
        .comment-form p.logged-in-as,
        .comment-notes {
            display: none !important;
        }

        /* Danh sách bình luận */
        .comment-list {
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
            list-style: none;
            padding: 0;
        }

        .comment-list li {
            background-color: #fff;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #eee;
            display: flex;
            gap: 15px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        .comment-list .avatar {
            border-radius: 50%;
        }

        .comment-body {
            flex: 1;
        }

        .comment-author {
            font-weight: bold;
            color: #333;
        }

        .comment-meta {
            font-size: 13px;
            color: #777;
            margin-bottom: 5px;
        }

        .comment-content {
            font-size: 15px;
            line-height: 1.5;
            color: #444;
        }
    </style>
</head>
<body>

<!-- Form nhập bình luận -->
<div class="comment-form-wrapper">
    <div class="comment-form-header"><span class="comment-form-title">Make a Post</span></div>
    <div class="comment-form-content">
        <?php
        // Ẩn phần mặc định của WordPress
        add_filter('comment_form_defaults', function($defaults) {
            $defaults['logged_in_as'] = '';
            $defaults['comment_notes_before'] = '';
            $defaults['comment_notes_after'] = '';
            $defaults['title_reply'] = '';
            $defaults['title_reply_before'] = '';
            $defaults['title_reply_after'] = '';
            $defaults['cancel_reply_link'] = '';
            return $defaults;
        }, 1000);

        comment_form(array(
            'title_reply'        => '',
            'title_reply_before' => '',
            'title_reply_after'  => '',
            'cancel_reply_link'  => '',
            'label_submit'       => 'Share',
            'comment_field'      => '<textarea id="comment" name="comment" placeholder="What are you thinking..."></textarea>',
            'submit_field'       => '<p class="form-submit">%1$s %2$s</p>',
            'fields'             => array(),
        ));
        ?>
    </div>
</div>

<!-- Danh sách bình luận -->
<?php if (have_comments()) : ?>
    <ul class="comment-list">
        <?php
        wp_list_comments(array(
            'style'       => 'ul',
            'avatar_size' => 50,
            'short_ping'  => true,
        ));
        ?>
    </ul>
<?php endif; ?>

</body>
</html>
