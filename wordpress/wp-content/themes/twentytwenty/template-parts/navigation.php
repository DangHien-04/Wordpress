<?php
/**
 * Custom Post Navigation (Hiển thị ngày/tháng/năm kiểu đặc biệt, căn đẹp)
 */

$next_post = get_next_post();
$prev_post = get_previous_post();

if ($next_post || $prev_post) :
?>
    <style>
        .custom-post-navigation {
            display: flex;
            flex-direction: column;
            gap: 15px;
            padding: 0 10px; /* đẩy cách mép trái phải cho đẹp */
            margin-top: 30px;
            border: none;
        }

        .custom-post-navigation .nav-item {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #222;
            padding: 12px 0;
            transition: background-color 0.3s ease, color 0.3s ease;
            border-radius: 6px;
        }

        .custom-post-navigation .nav-item:hover {
            background-color: #f9f9f9;
        }

        .custom-post-navigation .date {
            width: 70px;
            text-align: center;
            font-family: "Times New Roman", serif;
            margin-right: 25px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .custom-post-navigation .day {
            font-size: 15px;
            line-height: 1;
            font-weight: 500;
        }

        .custom-post-navigation .middle {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 4px 0;
            gap: 6px;
        }

        .custom-post-navigation .middle .line {
            width: 26px;
            height: 1px;
            background-color: #000;
            display: inline-block;
            vertical-align: middle;
        }

        .custom-post-navigation .middle .year {
            font-size: 13px;
            color: #444;
            line-height: 1;
            transform: translateY(1px); /* căn năm ngang hàng với thanh */
        }

        .custom-post-navigation .month {
            font-size: 13px;
            line-height: 1;
        }

        .custom-post-navigation .title {
            flex: 1;
            font-size: 16px;
            line-height: 1.4;
            font-weight: 500;
        }

        .custom-post-navigation .nav-item:hover .title {
            color: #0073aa;
        }

        /* Căn giữa toàn khối nếu cần */
        @media (min-width: 768px) {
            .custom-post-navigation {
                max-width: 900px;
                margin-left: auto;
                margin-right: auto;
            }
        }
    </style>

    <div class="custom-post-navigation">

        <?php if ($prev_post) :
            $prev_date = get_the_date('d/m/y', $prev_post->ID);
            $prev_date_parts = explode('/', $prev_date);
        ?>
            <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" class="nav-item">
                <div class="date">
                    <span class="day"><?php echo esc_html($prev_date_parts[0]); ?></span>
                    <div class="middle">
                        <span class="line"></span>
                        <span class="year"><?php echo esc_html($prev_date_parts[2]); ?></span>
                    </div>
                    <span class="month"><?php echo esc_html($prev_date_parts[1]); ?></span>
                </div>
                <div class="title">
                    <?php echo esc_html(get_the_title($prev_post->ID)); ?>
                </div>
            </a>
        <?php endif; ?>

        <?php if ($next_post) :
            $next_date = get_the_date('d/m/y', $next_post->ID);
            $next_date_parts = explode('/', $next_date);
        ?>
            <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="nav-item">
                <div class="date">
                    <span class="day"><?php echo esc_html($next_date_parts[0]); ?></span>
                    <div class="middle">
                        <span class="line"></span>
                        <span class="year"><?php echo esc_html($next_date_parts[2]); ?></span>
                    </div>
                    <span class="month"><?php echo esc_html($next_date_parts[1]); ?></span>
                </div>
                <div class="title">
                    <?php echo esc_html(get_the_title($next_post->ID)); ?>
                </div>
            </a>
        <?php endif; ?>

    </div>
<?php endif; ?>
			