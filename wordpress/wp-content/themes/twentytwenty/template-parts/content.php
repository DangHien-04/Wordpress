<?php
/**
 * Template hiển thị bài viết với giao diện mới
 */
$class = '';
if(!is_single()){
    $class = 'danh-sach';
}
?>

<style>
.post-item-horizontal {
    display: flex;
    gap: 20px;
    margin-bottom: 30px;
    padding: 25px;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    background: #fff;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
}

.post-item-horizontal:hover {
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    border-color: #d0d0d0;
}

.post-thumbnail-wrapper {
    flex: 0 0 250px;
    position: relative;
}

.post-latest-wrapper {
    flex: 0 0 250px;
    position: relative;
}

/* List view - full width content when no sidebar */
.post-item-horizontal .post-content-wrapper:only-child {
    flex: 1;
    max-width: 100%;
}

.post-thumbnail-wrapper img {
    width: 100%;
    height: 300px;
    object-fit: cover;
    border-radius: 8px;
}

.post-content-wrapper {
    flex: 1;
    display: flex;
    flex-direction: column;
}

/* Phần trên - Header */
.post-header-section {
    display: flex;
    align-items: flex-start;
    gap: 20px;
    flex: 1;
    margin-bottom: 20px;
}

.post-date-badge {
    display: flex;
    align-items: center;
    gap: 15px;
    flex-shrink: 0;
    padding: 15px 20px;
    border: 2px solid #003DA5;
    border-radius: 8px;
    background: #fff;
}

.date-number {
    font-size: 72px;
    font-weight: 700;
    color: #003DA5;
    line-height: 1;
}

.date-text {
    display: flex;
    flex-direction: column;
    font-size: 14px;
    color: #666;
    text-transform: uppercase;
}

.date-month {
    font-weight: 600;
}

.post-title-category-wrapper {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.post-title-link {
    text-decoration: none;
    color: #000;
}

.post-title-link:hover .post-title {
    color: #003DA5;
}

.post-title {
    font-size: 28px;
    font-weight: 700;
    line-height: 1.4;
    margin: 0;
    color: #000;
    transition: color 0.3s ease;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}

.post-category {
    display: inline-block;
    padding: 5px 15px;
    background: #f0f0f0;
    border-radius: 20px;
    font-size: 13px;
    color: #666;
    text-decoration: none;
    align-self: flex-start;
}

.post-category:hover {
    background: #e0e0e0;
}

/* Phần dưới - Mô tả */
.post-description-section {
    flex: 1;
}

.post-excerpt {
    font-size: 16px;
    line-height: 1.6;
    color: #333;
    margin: 0;
}

@media (max-width: 992px) {
    .post-item-horizontal {
        flex-direction: column;
        gap: 20px;
    }
    
    .post-thumbnail-wrapper,
    .post-latest-wrapper {
        flex: 0 0 auto;
        width: 100%;
        order: 1;
    }
    
    .post-content-wrapper {
        order: 2;
    }
    
    .post-latest-wrapper {
        order: 3;
    }
    
    .post-header-section {
        flex-direction: column;
        gap: 15px;
    }
    
    .date-number {
        font-size: 60px;
    }
    
    .post-title {
        font-size: 24px;
    }
}

@media (max-width: 576px) {
    .date-number {
        font-size: 48px;
    }
    
    .post-title {
        font-size: 20px;
    }
    
    .post-thumbnail-wrapper img {
        height: 200px;
    }
    
    .post-date-badge {
        padding: 10px 15px;
    }
}

.single-post-card {
    position: relative;
    padding: 30px;
    background: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}

.single-date-badge {
    position: absolute;
    top: 16px;
    right: 16px;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background: #FFD866;
    color: #222;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 10px;
    text-align: center;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    border: 4px solid #fff;
}

.single-date-badge .day {
    font-size: 20px;
    font-weight: 700;
    line-height: 1;
    margin-bottom: 0;
    font-variant-numeric: tabular-nums;
}

.single-date-badge .date-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    align-items: center;
    justify-items: center;
    width: 100%;
    height: 100%;
}
.single-date-badge .col-left {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 6px;
}
.single-date-badge .col-right {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
}

.single-date-badge .year { font-size: 18px; font-weight: 700; font-variant-numeric: tabular-nums; }
.single-date-badge .month { font-size: 22px; font-weight: 700; line-height: 1; }

.single-date-badge .line { width: 100%; height: 2px; background: rgba(0,0,0,0.7); display: inline-block; }

.single-title {
    font-size: 28px;
    font-weight: 700;
    margin: 10px 0 20px;
}

.single-post-card .single-content p:first-of-type {
    font-style: italic;
    color: #666;
}

@media (max-width: 576px) {
    .single-date-badge { width: 80px; height: 80px; top: 12px; right: 12px; }
    .single-date-badge .day { font-size: 26px; margin-bottom: 4px; }
    .single-date-badge .month { font-size: 18px; }
    .single-date-badge .date-grid { column-gap: 6px; }
    .single-title { font-size: 24px; }
}

/* Categories widget styles in thumbnail area */
.post-categories-widget {
    position: relative;
    background: #fff !important;
    border: 1px solid #e0e0e0;
    border-radius: 6px;
    padding: 16px 20px 12px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    color: #333;
    height: 300px;
    overflow-y: auto;
    display: block !important;
    visibility: visible !important;
    opacity: 1 !important;
}

.post-categories-widget::before{
    content: '';
    position: absolute;
    left: 0; top: 0;
    width: 100%; height: 10px;
    background: repeating-linear-gradient(-45deg, #ededed 0, #ededed 6px, transparent 6px, transparent 12px);
    border-radius: 6px 6px 0 0;
}

.post-categories-widget .widget-title{ 
    display: block !important;
    font-size: 18px;
    font-weight: 700;
    margin: 0 0 10px 0;
    color: #333;
}

.post-categories-widget ul{ 
    list-style: none; 
    margin: 10px 0 0; 
    padding: 0; 
}

.post-categories-widget ul li{ 
    position: relative; 
    padding: 12px 0 12px 18px; 
    border-bottom: 1px solid #ebebeb; 
}

.post-categories-widget ul li:last-child{ 
    border-bottom: none; 
}

.post-categories-widget ul li::before{ 
    content:''; 
    position:absolute; 
    left:0; 
    top:50%; 
    transform:translateY(-50%); 
    width:6px; 
    height:6px; 
    border-radius:50%; 
    background:#FFC107; 
}

.post-categories-widget ul li a{ 
    color:#2c6db7 !important; 
    text-decoration: none; 
    padding-left: 0; 
    font-size: 14px;
}

.post-categories-widget ul li a:hover{ 
    text-decoration: underline; 
}

.post-categories-widget ul li a:before{ 
    content: none !important; 
}

/* Latest Posts widget styles */
.post-latest-widget {
    position: relative;
    background: linear-gradient(135deg, #4ECDC4, #44A08D);
    border-radius: 6px;
    padding: 20px;
    color: #fff;
    height: 300px;
    overflow-y: auto;
}

.post-latest-widget .widget-title {
    font-size: 16px;
    font-weight: 700;
    margin: 0 0 15px 0;
    color: #fff;
    text-align: center;
}

.post-latest-widget .latest-posts-list {
    list-style: none;
    margin: 0;
    padding: 0;
}

.post-latest-widget .latest-posts-list li {
    margin-bottom: 15px;
    padding-bottom: 15px;
}

.post-latest-widget .latest-posts-list li:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
}

.post-latest-widget .latest-post-item {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    text-decoration: none;
    color: #fff;
}

.post-latest-widget .latest-post-item:hover {
    opacity: 0.8;
}

.post-latest-widget .date {
    flex-shrink: 0;
    display: grid;
    grid-template-columns: 1fr 1fr;
    align-items: center;
    justify-items: center;
    width: 50px;
    font-size: 12px;
    font-weight: 600;
    gap: 5px;
}

.post-latest-widget .date .left-col {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 2px;
}

.post-latest-widget .date .right-col {
    display: flex;
    align-items: center;
    justify-content: center;
}

.post-latest-widget .date .day {
    font-size: 14px;
    font-weight: 700;
    line-height: 1;
}

.post-latest-widget .date .line {
    width: 20px;
    height: 1px;
    background: #fff;
    margin: 2px 0;
}

.post-latest-widget .date .month {
    font-size: 11px;
}

.post-latest-widget .date .year {
    font-size: 11px;
    font-weight: 600;
}

.post-latest-widget .title {
    flex: 1;
    font-size: 13px;
    line-height: 1.4;
    font-weight: 500;
}

.post-latest-widget .view-all {
    text-align: center;
    margin-top: 15px;
    padding-top: 15px;
    border-top: 1px solid rgba(255,255,255,0.2);
}

.post-latest-widget .view-all a {
    color: #fff;
    text-decoration: none;
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.post-latest-widget .view-all a:hover {
    text-decoration: underline;
}

.entry-content hr,
.styled-separator,
.section-inner::before,
.section-inner::after {
    display: none !important;
    border: none !important;
    height: 0 !important;
    margin: 0 !important;
}
</style>

<article <?php post_class($class); ?> id="post-<?php the_ID(); ?>">
    
    <?php if (!is_single()): ?>
        <!-- Hiển thị dạng danh sách -->
        <div class="post-item-horizontal">
            <!-- Thumbnail -->
            <div class="post-thumbnail-wrapper">
                <?php if (has_post_thumbnail()): ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('large'); ?>
                    </a>
                <?php else: ?>
                    <a href="<?php the_permalink(); ?>">
                        <img src="https://via.placeholder.com/480x300" alt="<?php the_title(); ?>">
                    </a>
                <?php endif; ?>
            </div>
            
            <!-- Nội dung -->
            <div class="post-content-wrapper">
                <!-- PHẦN TRÊN: Ngày tháng, Tiêu đề, Categories -->
                <div class="post-header-section">
                    <!-- Ngày tháng với khung -->
                    <div class="post-date-badge">
                        <span class="date-number"><?php echo get_the_date('d'); ?></span>
                        <div class="date-text">
                            <span class="date-month">Tháng <?php echo get_the_date('n'); ?></span>
                            <span class="date-year"><?php echo get_the_date('Y'); ?></span>
                        </div>
                    </div>
                    
                    <!-- Tiêu đề và Categories -->
                    <div class="post-title-category-wrapper">
                        <a href="<?php the_permalink(); ?>" class="post-title-link">
                            <h2 class="post-title"><?php the_title(); ?></h2>
                        </a>
                        
                        <!-- Danh mục -->
                        <?php
                        $categories = get_the_category();
                        if (!empty($categories)):
                            ?>
                            <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>" class="post-category">
                                Categories <?php echo esc_html($categories[0]->name); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- PHẦN DƯỚI: Mô tả -->
                <div class="post-description-section">
                    <div class="post-excerpt">
                        <?php 
                        if (has_excerpt()) {
                            echo wp_trim_words(get_the_excerpt(), 30, '...');
                        } else {
                            echo wp_trim_words(get_the_content(), 30, '...');
                        }
                        ?>
                    </div>
                </div>
            </div>

    
    <?php else: ?>
        <!-- Hiển thị bài viết đơn với categories sidebar -->
        <div class="post-item-horizontal">
            <!-- Categories Widget bên trái -->
            <div class="post-thumbnail-wrapper">
                <div class="post-categories-widget">
                    <h3 class="widget-title">Categories</h3>
                    <ul>
                        <?php
                        $categories = get_categories(array(
                            'orderby' => 'name',
                            'order'   => 'ASC',
                            'hide_empty' => false,
                        ));
                        
                        if (!empty($categories)) {
                            foreach($categories as $category) {
                                echo '<li><a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></li>';
                            }
                        } else {
                            // Fallback nếu không có categories
                            echo '<li><a href="#">Net Developer</a></li>';
                            echo '<li><a href="#">Thực Tập Sinh Tester</a></li>';
                            echo '<li><a href="#">Trợ giảng lập trình - Part time</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
            
            <!-- Nội dung bài viết -->
            <div class="post-content-wrapper">
                <div class="single-post-card">
                    <div class="single-date-badge">
                        <div class="date-grid">
                            <div class="col-left">
                                <span class="day"><?php echo get_the_date('d'); ?></span>
                                <span class="line"></span>
                                <span class="month"><?php echo get_the_date('m'); ?></span>
                            </div>
                            <div class="col-right">
                                <span class="year"><?php echo get_the_date('y'); ?></span>
                            </div>
                        </div>
                    </div>
                    <h1 class="single-title"><?php the_title(); ?></h1>
                    <div class="single-content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div><!-- .post-content-wrapper -->
            
            <!-- Latest Posts Widget bên phải -->
            <div class="post-latest-wrapper">
                <div class="post-latest-widget">
                    <h3 class="widget-title">BÀI VIẾT MỚI NHẤT</h3>
                    <ul class="latest-posts-list">
                        <?php
                        $latest_posts = get_posts(array(
                            'numberposts' => 3,
                            'post_status' => 'publish',
                            'exclude' => array(get_the_ID())
                        ));
                        
                        if (!empty($latest_posts)) {
                            foreach($latest_posts as $latest_post) {
                                $date_parts = explode(' ', get_the_date('d m Y', $latest_post->ID));
                                ?>
                                <li>
                                    <a href="<?php echo get_permalink($latest_post->ID); ?>" class="latest-post-item">
                                        <div class="date">
                                            <div class="left-col">
                                                <span class="day"><?php echo esc_html($date_parts[0]); ?></span>
                                                <span class="line"></span>
                                                <span class="month"><?php echo esc_html($date_parts[1]); ?></span>
                                            </div>
                                            <div class="right-col">
                                                <span class="year"><?php echo esc_html(substr($date_parts[2], -2)); ?></span>
                                            </div>
                                        </div>
                                        <div class="title">
                                            <?php echo esc_html(get_the_title($latest_post->ID)); ?>
                                        </div>
                                    </a>
                                </li>
                                <?php
                            }
                        } else {
                            // Fallback posts
                            ?>
                            <li>
                                <a href="#" class="latest-post-item">
                                    <div class="date">
                                        <div class="left-col">
                                            <span class="day">13</span>
                                            <span class="line"></span>
                                            <span class="month">08</span>
                                        </div>
                                        <div class="right-col">
                                            <span class="year">24</span>
                                        </div>
                                    </div>
                                    <div class="title">Sinh viên vượt khó, đạt thành tích nổi bật</div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="latest-post-item">
                                    <div class="date">
                                        <div class="left-col">
                                            <span class="day">13</span>
                                            <span class="line"></span>
                                            <span class="month">08</span>
                                        </div>
                                        <div class="right-col">
                                            <span class="year">24</span>
                                        </div>
                                    </div>
                                    <div class="title">Livestream và chủ đề: Thiết kế đồ họa - Phác họa tương lai</div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="latest-post-item">
                                    <div class="date">
                                        <div class="left-col">
                                            <span class="day">07</span>
                                            <span class="line"></span>
                                            <span class="month">08</span>
                                        </div>
                                        <div class="right-col">
                                            <span class="year">24</span>
                                        </div>
                                    </div>
                                    <div class="title">Livestream và chủ đề: Làm chủ công nghệ cùng Gen Z</div>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                    <div class="view-all">
                        <a href="<?php echo home_url(); ?>">XEM TẤT CẢ TIN TỨC</a>
                    </div>
                </div>
            </div>
        </div><!-- .post-item-horizontal -->
        
        <div class="section-inner">
            <?php
            wp_link_pages(
                array(
                    'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__('Page', 'twentytwenty') . '"><span class="label">' . __('Pages:', 'twentytwenty') . '</span>',
                    'after'       => '</nav>',
                    'link_before' => '<span class="page-number">',
                    'link_after'  => '</span>',
                )
            );
            
            edit_post_link();
            
            // Single bottom post meta
            twentytwenty_the_post_meta(get_the_ID(), 'single-bottom');
            
            if (post_type_supports(get_post_type(get_the_ID()), 'author') && is_single()) {
                get_template_part('template-parts/entry-author-bio');
            }
            ?>
        </div><!-- .section-inner -->
        
        <?php
        if (is_single()) {
            get_template_part('template-parts/navigation');
        }
        
        /**
         * Output comments wrapper if it's a post, or if comments are open,
         * or if there's a comment number – and check for password.
         */
        if ((is_single() || is_page()) && (comments_open() || get_comments_number()) && !post_password_required()) {
            ?>
            <div class="comments-wrapper section-inner">
                <?php comments_template(); ?>
            </div><!-- .comments-wrapper -->
            <?php
        }
        ?>
    <?php endif; ?>
</article><!-- .post -->