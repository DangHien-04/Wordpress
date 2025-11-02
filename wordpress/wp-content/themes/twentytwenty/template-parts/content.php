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
    gap: 30px;
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
    flex: 0 0 480px;
    position: relative;
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
    
    .post-thumbnail-wrapper {
        flex: 0 0 auto;
        width: 100%;
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
        </div>
    
    <?php else: ?>
        <!-- Hiển thị bài viết đơn -->
        <div class="post-inner <?php echo is_page_template('templates/template-full-width.php') ? '' : 'thin'; ?>">
            <div class="entry-content">
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
            </div><!-- .entry-content -->
        </div><!-- .post-inner -->
        
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