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
	.module-13 .sidebar-title {
    color: #1e73be !important;
    border-bottom: 2px solid #1e73be !important;
}

.recent-page-title a {
    color: #000 !important;
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
				
				while ( have_posts() ) : the_post();
					$main_post_id   = get_the_ID();
					$main_post_url  = get_permalink( $main_post_id );
					$main_post_title = get_the_title( $main_post_id );
				?>
					
					<article id="post-<?php echo esc_attr( $main_post_id ); ?>" <?php post_class( 'search-result-item' ); ?>>
						
						<!-- Module 5: Nội dung kết quả tìm kiếm -->
						<div class="search-result-content module-5">
							<header class="entry-header">
								<h2 class="entry-title">
									<a href="<?php echo esc_url( $main_post_url ); ?>"><?php echo esc_html( $main_post_title ); ?></a>
								</h2>
							</header><!-- .entry-header -->

							<div class="entry-meta">
								<span class="post-categories">
									<?php
									$categories = get_the_category( $main_post_id );
									if ( ! empty( $categories ) ) {
										echo '<i class="category-icon"></i> ';
										echo esc_html( $categories[0]->name );
									}
									?>
								</span>
								<span class="post-tags">
									<?php
									$tags = get_the_tags( $main_post_id );
									if ( $tags ) {
										echo '<i class="tag-icon"></i> ';
										$tag_list = array();
										foreach ( $tags as $tag ) {
											$tag_list[] = $tag->name;
										}
										echo esc_html( implode( ', ', array_slice( $tag_list, 0, 3 ) ) );
									}
									?>
								</span>
							</div>

							<div class="entry-excerpt">
								<?php 
								if ( has_excerpt( $main_post_id ) ) {
									echo get_the_excerpt( $main_post_id );
								} else {
									$post_content = get_post_field( 'post_content', $main_post_id );
									echo wp_trim_words( $post_content, 30, '...' );
								}
								?>
							</div>

							<div class="entry-footer">
								<a href="<?php echo esc_url( $main_post_url ); ?>" class="read-more-link">
									Đọc thêm &rarr;
								</a>
							</div>
						</div><!-- .search-result-content -->

					</article><!-- #post-<?php echo esc_attr( $main_post_id ); ?> -->

				<?php endwhile; ?>
				
				</div><!-- .search-results-list -->
				
				<!-- Module 14: Bình luận mới nhất - Hiển thị 1 lần duy nhất -->
				<aside class="search-sidebar-right module-14">
					<h3 class="sidebar-title">Bình luận mới nhất</h3>
					<?php
					// Lấy 3 bình luận mới nhất từ toàn bộ website
					$recent_comments = get_comments( array(
						'number'  => 3,
						'status'  => 'approve',
						'orderby' => 'comment_date',
						'order'   => 'DESC',
					) );
					
					if ( $recent_comments ) :
					?>
						<ul class="recent-comments-list">
							<?php foreach ( $recent_comments as $comment ) : 
							$comment_post_id = $comment->comment_post_ID;
							$comment_post_url = get_permalink( $comment_post_id );
							$comment_post_title = get_the_title( $comment_post_id );
						?>
							<li class="comment-item">
								<div class="comment-author-avatar">
									<?php echo get_avatar( $comment, 40 ); ?>
								</div>
								<div class="comment-content">
									<div class="comment-author-name">
										<?php echo esc_html( $comment->comment_author ); ?>
									</div>
									<div class="comment-text">
										<?php echo wp_trim_words( $comment->comment_content, 15, '...' ); ?>
									</div>
									<div class="comment-meta">
										<span class="comment-date">
											<?php echo human_time_diff( strtotime( $comment->comment_date ), current_time( 'timestamp' ) ) . ' trước'; ?>
										</span>
										<span class="comment-post-title">
											trên <a href="<?php echo esc_url( $comment_post_url ); ?>"><?php echo esc_html( $comment_post_title ); ?></a>
										</span>
									</div>
								</div>
							</li>
						<?php endforeach; ?>
						</ul>
					<?php else : ?>
						<p class="no-comments">Chưa có bình luận nào.</p>
					<?php endif; ?>
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
