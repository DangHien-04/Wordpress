<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content" <?php if ( is_search() ) echo 'class="search-results-page"'; ?>>
<style>
	/* ======================
   Module 5 - Kết quả tìm kiếm dạng thẻ ngang
   ====================== */
.module-5 .search-card {
    display: flex;
    align-items: stretch;
    background: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    box-shadow: 0 3px 8px rgba(0,0,0,0.08);
    overflow: hidden;
    margin-bottom: 25px;
    transition: all 0.3s ease;
}

.recent-page-title a {
    color: #000 !important;
}

/* Ảnh bên trái */
.module-5 .search-thumb {
    flex: 0 0 35%;
    overflow: hidden;
}
.module-5 .search-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Ô ngày tháng giữa */
.module-5 .search-date-box {
    width: 100px;
    background: #ffffffff;
    text-align: center;
    padding: 25px 10px;
    border-right: 1px solid #e0e0e0;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.module-5 .search-date-box .day {
    font-size: 32px;
    font-weight: 700;
    color: #000000ff;
    line-height: 1;
}
.module-5 .search-date-box .month {
    font-size: 12px;
    color: #555;
    margin-top: 5px;
}

/* Nội dung bên phải */
.module-5 .search-info {
    flex: 1;
    padding: 20px;
    flex-direction: column;
    justify-content: center;
	text-align: left;
}
.module-5 .search-title a {
    font-size: 18px;
    font-weight: 700;
    color: #1e73be;
    text-align: left;		
}
.module-5 .search-title a:hover {
    color: #0056a3;
}
.module-5 .search-excerpt {
    color: #333;
    margin-top: 10px;
    line-height: 1.6;
    font-size: 15px;
}

</style>
	<?php

	$archive_title    = '';
	$archive_subtitle = '';

	if ( is_search() ) {
		/**
		 * @global WP_Query $wp_query WordPress Query object.
		 */
		global $wp_query;

		$archive_title = sprintf(
			'%1$s %2$s',
			'<span class="color-accent">' . __( 'Search:', 'twentytwenty' ) . '</span>',
			'&ldquo;' . get_search_query() . '&rdquo;'
		);

		if ( $wp_query->found_posts ) {
			$archive_subtitle = sprintf(
				/* translators: %s: Number of search results. */
				_n(
					'Tìm thấy %s kết quả cho tìm kiếm của bạn.',
					'Tìm thấy %s kết quả cho tìm kiếm của bạn.',
					$wp_query->found_posts,
					'twentytwenty'
				),
				number_format_i18n( $wp_query->found_posts )
			);
		} else {
			$archive_subtitle = __( 'Không tìm thấy kết quả nào. Vui lòng thử lại với từ khóa khác.', 'twentytwenty' );
		}
	} elseif ( is_archive() && ! have_posts() ) {
		$archive_title = __( 'Nothing Found', 'twentytwenty' );
	} elseif ( ! is_home() ) {
		$archive_title    = get_the_archive_title();
		$archive_subtitle = get_the_archive_description();
	}

	if ( $archive_title || $archive_subtitle ) {
		?>

		<header class="archive-header has-text-align-center header-footer-group">

			<div class="archive-header-inner section-inner medium">

				<?php if ( $archive_title ) { ?>
					<h1 class="archive-title"><?php echo wp_kses_post( $archive_title ); ?></h1>
				<?php } ?>

				<?php if ( $archive_subtitle ) { ?>
					<div class="archive-subtitle section-inner thin max-percentage intro-text"><?php echo wp_kses_post( wpautop( $archive_subtitle ) ); ?></div>
				<?php } ?>

			</div><!-- .archive-header-inner -->

		</header><!-- .archive-header -->

		<?php
	}

	if ( have_posts() ) {

		// Custom layout for search results
		if ( is_search() ) {
			?>
			<div class="search-results-container section-inner">
				
			<!-- Module 13: 3 trang mới nhất - Layout đẹp dạng thẻ -->
<aside class="search-sidebar module-13">
    <h3 class="sidebar-title">Trang mới nhất</h3>
    <?php
    $recent_posts = new WP_Query( array(
        'post_type'      => 'page',
        'posts_per_page' => 3,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
    ) );

    if ( $recent_posts->have_posts() ) :
    ?>
        <div class="recent-pages-grid">
            <?php while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); 
                $post_id  = get_the_ID();
                $post_url = get_permalink( $post_id );
            ?>
                <div class="recent-page-card">
                    <h4 class="recent-page-title">
                        <a href="<?php echo esc_url( $post_url ); ?>">
                            <?php echo esc_html( get_the_title( $post_id ) ); ?>
                        </a>
                    </h4>

                    <div class="recent-page-thumbnail">
                        <a href="<?php echo esc_url( $post_url ); ?>">
                            <?php 
                            if ( has_post_thumbnail( $post_id ) ) {
                                echo get_the_post_thumbnail( $post_id, 'medium' );
                            } else {
                                echo '<img src="' . esc_url( get_template_directory_uri() . '/assets/images/no-image.jpg' ) . '" alt="No image">';
                            }
                            ?>
                        </a>
                    </div>

                    <div class="recent-page-excerpt">
                        <?php 
                        $page_content = get_post_field( 'post_content', $post_id );
                        if ( ! empty( $page_content ) ) {
                            echo wp_trim_words( strip_shortcodes( $page_content ), 20, '...' );
                        }
                        ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php
        wp_reset_postdata();
    else :
    ?>
        <p class="no-recent-posts">Không có trang nào.</p>
    <?php endif; ?>
</aside>


				
				<div class="search-results-list">
				
				<?php 
				// Reset main query after custom query
				rewind_posts();
				
				// Counter for result numbering
				global $wp_query;
				$result_counter = $wp_query->found_posts - ( ( max( 1, get_query_var('paged') ) - 1 ) * $wp_query->query_vars['posts_per_page'] );
				
				while ( have_posts() ) : the_post();
					$main_post_id   = get_the_ID();
					$main_post_url  = get_permalink( $main_post_id );
					$main_post_title = get_the_title( $main_post_id );
					$post_date = get_the_date( 'd/m/Y', $main_post_id );
					$post_day = get_the_date( 'd', $main_post_id );
					$post_month = get_the_date( 'm', $main_post_id );
				?>
					
					<article id="post-<?php echo esc_attr( $main_post_id ); ?>" <?php post_class( 'search-result-item' ); ?>>
						
						<!-- Module 5: Nội dung kết quả tìm kiếm -->
						<!-- Module 5: Giao diện kết quả tìm kiếm kiểu thẻ ngang -->
<div class="search-result-content module-5">
    <div class="search-card">
        
        <!-- Ảnh bên trái -->
        <div class="search-thumb">
            <a href="<?php echo esc_url( $main_post_url ); ?>">
                <?php if ( has_post_thumbnail( $main_post_id ) ) : ?>
                    <?php echo get_the_post_thumbnail( $main_post_id, 'medium' ); ?>
                <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-thumbnail.jpg" alt="<?php echo esc_attr( $main_post_title ); ?>">
                <?php endif; ?>
            </a>
        </div>

        <!-- Ô ngày tháng ở giữa -->
        <div class="search-date-box">
            <div class="day"><?php echo get_the_date( 'd', $main_post_id ); ?></div>
            <div class="month">THÁNG <?php echo get_the_date( 'm', $main_post_id ); ?></div>
        </div>

        <!-- Nội dung bên phải -->
        <div class="search-info">
            <h2 class="search-title">
                <a href="<?php echo esc_url( $main_post_url ); ?>">
                    <?php echo esc_html( $main_post_title ); ?>
                </a>
            </h2>
            <p class="search-excerpt">
                <?php 
                if ( has_excerpt( $main_post_id ) ) {
                    echo get_the_excerpt( $main_post_id );
                } else {
                    echo wp_trim_words( get_post_field( 'post_content', $main_post_id ), 25, '...' );
                }
                ?>
            </p>
        </div>

    </div><!-- /.search-card -->
</div><!-- /.module-5 -->


					</article><!-- #post-<?php echo esc_attr( $main_post_id ); ?> -->

				<?php 
					$result_counter--; 
				endwhile; ?>
				
				</div><!-- .search-results-list -->
				
				<!-- Module 14: Bình luận mới nhất - Hiển thị 1 lần duy nhất -->
<aside class="search-sidebar-right module-14">
    <h3 class="sidebar-title">Bình luận mới nhất</h3>

    <style>
    /* ======= Module 14 - Bình luận mới nhất ======= */
.recent-comments {
    background: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    font-family: "Segoe UI", Arial, sans-serif;
    max-width: 850px;
    margin: 0 auto;
}

.recent-comments h3,
.sidebar-title {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 16px;
    border-bottom: 2px solid #f2f2f2;
    padding-bottom: 6px;
}

/* Danh sách bình luận */
.comment-list {
    list-style: none;
    margin: 0;
    padding: 0;
}

/* Bình luận cha */
.comment {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    margin-bottom: 18px;
    padding-bottom: 18px;
    border-bottom: 1px solid #f2f2f2;
}
.comment:last-child {
    border-bottom: none;
}

/* Avatar vuông */
.comment-avatar img {
    width: 48px;
    height: 48px;
    object-fit: cover;
    border-radius: 0px; /* nếu muốn vuông hẳn: để 0 */
    border: 1px solid #ddd;
}

/* Phần nội dung */
.comment-body {
    flex: 1;
}

.comment-header {
    margin-bottom: 6px;
}

.comment-author {
    font-weight: 600;
    color: #222;
    font-size: 15px;
    margin-right: 8px;
}

.comment-date {
    font-size: 13px;
    color: #777;
}

.comment-content {
    margin: 6px 0 8px;
    line-height: 1.5;
    color: #444;
    font-size: 14px;
}

.comment-post-title {
    font-size: 13px;
    color: #666;
}
.comment-post-title a {
    color: #c00;
    text-decoration: none;
}
.comment-post-title a:hover {
    text-decoration: underline;
}
/* ===== Bình luận con (trả lời) ===== */
.children {
    list-style: none;
    margin: 10px 0 0 -40px;
    padding-left: 0;
    /* border-left: 2px solid #ececec; */
}

.children .comment {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    margin-bottom: 12px;
    padding: 10px 12px;
    border: 1px solid #ececec;
    background: #fafafa;
    border-radius: 0px;
    max-width: 90%;
}

.children .comment-avatar img {
    width: 38px;
    height: 38px;
    object-fit: cover;
    border-radius: 4px;
    border: 1px solid #ddd;
}

.children .comment-body {
    flex: 1;
    word-break: break-word;
}

.children .comment-content {
    margin: 4px 0 6px;
    font-size: 14px;
    line-height: 1.5;
    color: #444;
}

.children .comment-author {
    font-weight: 600;
    color: #333;
    font-size: 14px;
}

.children .comment-date {
    font-size: 12px;
    color: #888;
}

/* Hover hiệu ứng nhẹ */
/* .comment:hover {
    background: #fafafa;
    transition: background 0.2s ease;
    border-radius: 6px;
    padding-left: 5px;
} */

    </style>

    <?php
    // Lấy 3 bình luận mới nhất toàn site (chỉ bình luận cha, có con thì hiển thị theo cây)
    $recent_comments = get_comments([
        'number'  => 3,
        'status'  => 'approve',
        'orderby' => 'comment_date_gmt',
        'order'   => 'DESC',
        'parent'  => 0,
    ]);

    if ( $recent_comments ) :
        echo '<div class="recent-comments">';
        echo '<ul class="comment-list">';
        foreach ( $recent_comments as $comment ) :
            $comment_post_id    = $comment->comment_post_ID;
            $comment_post_url   = get_permalink( $comment_post_id );
            $comment_post_title = get_the_title( $comment_post_id );
            ?>
            <li class="comment">
                <div class="comment-avatar">
                    <?php echo get_avatar( $comment, 50 ); ?>
                </div>
                <div class="comment-body">
                    <div class="comment-header">
                        <span class="comment-author"><?php echo esc_html( $comment->comment_author ); ?></span>
                        <span class="comment-date">
                            <?php echo human_time_diff( strtotime( $comment->comment_date ), current_time( 'timestamp' ) ); ?> trước
                        </span>
                    </div>
                    <div class="comment-content"><?php echo esc_html( wp_trim_words( $comment->comment_content, 25, '...' ) ); ?></div>
                    <div class="comment-post-title">
                        trên bài: <a href="<?php echo esc_url( $comment_post_url ); ?>"><?php echo esc_html( $comment_post_title ); ?></a>
                    </div>

                    <?php
                    // Hiển thị trả lời (bình luận con)
                    $child_comments = get_comments([
                        'parent' => $comment->comment_ID,
                        'status' => 'approve',
                        'orderby' => 'comment_date_gmt',
                        'order' => 'ASC',
                    ]);

                    if ( $child_comments ) :
                        echo '<ul class="children">';
                        foreach ( $child_comments as $child ) : ?>
                            <li class="comment">
                                <div class="comment-avatar">
                                    <?php echo get_avatar( $child, 40 ); ?>
                                </div>
                                <div class="comment-body">
                                    <div class="comment-header">
                                        <span class="comment-author"><?php echo esc_html( $child->comment_author ); ?></span>
                                        <span class="comment-date">
                                            <?php echo human_time_diff( strtotime( $child->comment_date ), current_time( 'timestamp' ) ); ?> trước
                                        </span>
                                    </div>
                                    <div class="comment-content"><?php echo esc_html( wp_trim_words( $child->comment_content, 20, '...' ) ); ?></div>
                                </div>
                            </li>
                        <?php endforeach;
                        echo '</ul>';
                    endif;
                    ?>
                </div>
            </li>
        <?php
        endforeach;
        echo '</ul></div>';
    else :
        echo '<p class="no-comments">Chưa có bình luận nào.</p>';
    endif;
    ?>
</aside>

			</div><!-- .search-results-container -->
			<?php
		} else {
			// Default layout for other pages
			$i = 0;

			while ( have_posts() ) {
				++$i;
				if ( $i > 1 ) {
					echo '<hr class="post-separator styled-separator is-style-wide section-inner" aria-hidden="true" />';
				}
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

			}
		}
	} elseif ( is_search() ) {
		?>

		<div class="no-search-results-form section-inner thin">

			<?php
			get_search_form(
				array(
					'aria_label' => __( 'tìm kiếm lại', 'twentytwenty' ),
				)
			);
			?>

		</div><!-- .no-search-results -->

		<?php
	}
	?>

	<?php get_template_part( 'template-parts/pagination' ); ?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
