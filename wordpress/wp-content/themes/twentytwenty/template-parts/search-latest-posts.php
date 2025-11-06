<?php
/**
 * Template part: Latest posts timeline for search results.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	return;
}

$search_latest_posts = new WP_Query(
	array(
		'post_type'           => 'post',
		'posts_per_page'      => 4,
		'post_status'         => 'publish',
		'ignore_sticky_posts' => true,
	)
);

if ( ! $search_latest_posts->have_posts() ) {
	return;
}

?>

<section class="search-latest-posts-section" aria-labelledby="search-latest-posts-heading">
	<div class="search-latest-posts__wrapper section-inner">
		<div class="search-latest-posts__inner">
			<div class="search-latest-posts__header">
				<h2 id="search-latest-posts-heading"><?php esc_html_e( 'Latest News', 'twentytwenty' ); ?></h2>
			</div>
			<ol class="search-latest-posts__list">
			<?php
			while ( $search_latest_posts->have_posts() ) :
				$search_latest_posts->the_post();
				?>
				<li class="search-latest-posts__item">
					<span class="search-latest-posts__marker" aria-hidden="true"></span>
					<div class="search-latest-posts__content">
						<div class="search-latest-posts__title-line">
							<a class="search-latest-posts__title" href="<?php echo esc_url( get_permalink() ); ?>">
								<?php the_title(); ?>
							</a>
							<time class="search-latest-posts__date" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
								<?php echo esc_html( get_the_date( 'j F, Y' ) ); ?>
							</time>
						</div>
						<p class="search-latest-posts__excerpt">
							<?php echo esc_html( wp_trim_words( get_the_excerpt(), 28, '…' ) ); ?>
						</p>
					</div>
				</li>
				<?php
			endwhile;
			?>
			</ol>
		</div>
	</div>
</section>

<?php
wp_reset_postdata();
?>

<style>
/* Search Latest Posts (section 15) */
.search .search-latest-posts-section {
    margin: 64px auto 80px;
    padding: 0 20px;
    max-width: 960px;
}

.search .search-latest-posts__wrapper {
    position: relative;
    background: transparent;
    padding: 0;
}

.search .search-latest-posts__inner {
    background: #ffffff;
    border-radius: 12px;
    padding: 40px 48px 48px 48px;
    position: relative;
}

.search .search-latest-posts__header {
    margin: 0 0 28px;
    padding-left: 28px;
}

.search .search-latest-posts__header h2 {
    font-size: 28px;
    font-weight: 700;
    color: #1c2f59;
    margin: 0;
}

.search .search-latest-posts__list {
    position: relative;
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: 24px;
}

.search .search-latest-posts__list::before {
    content: '';
    position: absolute;
    top: 10px;
    bottom: 0px;
    left: 53px;
    width: 2px;
    background: linear-gradient( #cccccc);
    z-index: 0;
}

.search .search-latest-posts__item {
    position: relative;
    padding-left: 70px;
}

.search .search-latest-posts__marker {
    position: absolute;
    top: 4px;
    left: 24px;
    width: 19px;
    height: 19px;
    border-radius: 50%;
    background: #ffffff;
    border: 3px solid #31afff;
    box-shadow: 0 0 0 2px rgba(49, 175, 255, 0.15);
    z-index: 1;
}

.search .search-latest-posts__content {
    position: relative;
    z-index: 1;
}

.search .search-latest-posts__title-line {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 16px;
    margin-bottom: 10px;
}

.search .search-latest-posts__title {
    font-size: 17px;
    font-weight: 600;
    color: #1277d4;
    text-decoration: none;
    text-transform: none;
}

.search .search-latest-posts__title:hover,
.search .search-latest-posts__title:focus {
    color: #0a4c9e;
}

.search .search-latest-posts__date {
    font-size: 14px;
    color: #1277d4;
    white-space: nowrap;
}

.search .search-latest-posts__excerpt {
    margin: 0;
    font-size: 14px;
    line-height: 1.6;
    color: #505a71;
}

@media (max-width: 782px) {
    .search .search-latest-posts__inner {
        padding: 32px 28px 36px 32px;
    }

    .search .search-latest-posts__header {
        padding-left: 36px;
    }

    .search .search-latest-posts__item {
        padding-left: 64px;
    }

    .search .search-latest-posts__marker {
        left: 22px;
    }
}

@media (max-width: 480px) {
    .search .search-latest-posts-section {
        margin: 48px auto 64px;
        padding: 0 16px;
    }

    .search .search-latest-posts__inner {
        padding: 28px 22px 30px 26px;
    }

    .search .search-latest-posts__header {
        padding-left: 30px;
    }

    .search .search-latest-posts__item {
        padding-left: 58px;
    }

    .search .search-latest-posts__marker {
        left: 18px;
        box-shadow: 0 0 0 2px rgba(49, 175, 255, 0.15);
    }
}
</style>
