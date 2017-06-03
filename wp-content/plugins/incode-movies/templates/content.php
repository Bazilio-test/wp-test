<?php
/**
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header page-header">

        <div class="incode-movies-thmb-d">
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php
			if(has_post_thumbnail()){
				the_post_thumbnail([56, 84], ['class' => 'incode-movies-thm']);
			}else{
				echo '<img src="' . INCODE_MOVIES__PLUGIN_URL . 'assets/movie.png" class="incode-movies-thmb"/>';
			}
			?></a>
        </div>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php unite_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
		<p><a class="btn btn-primary read-more" href="<?php the_permalink(); ?>"><?php _e( 'Continue reading', 'unite' ); ?> <i class="fa fa-chevron-right"></i></a></p>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">

		<?php if(of_get_option('blog_settings') == 1 || !of_get_option('blog_settings')) : ?>
			<?php the_content( __( 'Continue reading <i class="fa fa-chevron-right"></i>', 'unite' ) ); ?>
		<?php elseif (of_get_option('blog_settings') == 2) :?>
			<?php the_excerpt(); ?>
		<?php endif; ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'unite' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
			<?php
			$meta_price = '';
			if($price = get_post_meta(get_the_ID(), 'show_price', true)){
				$meta_price = '<span class="byline-ss incode-movies-l">' . __('Cost of the movie show', 'incode-movies') . ':</span>' .
					'<span class="byline-ss incode-movies-d">' . esc_html($price) . ' &#8381;</span>';
			}

			$meta_release = '';
			if($release = get_post_meta(get_the_ID(), 'release_date', true)){
				$meta_release = '<span class="byline-ss incode-movies-l">' . __('Release date of the film', 'incode-movies') . ':</span>' .
					'<span class="byline-ss incode-movies-d">' . esc_html($release) . '</span>';
			}

			$meta_countries = '';
			if($terms = wp_get_post_terms(get_the_ID(), 'taxcountries', ["fields" => "all"])){
				if(!is_wp_error($terms)){
					$meta_countries = '<span class="byline-ss incode-movies-l">' . __(count($terms) == 1 ? 'Country' : 'Countries', 'incode-movies') . ':</span><span class="byline-ss incode-movies-d">';
					foreach($terms as $term){
						$meta_countries .= esc_html($term->name) . ', ';
					}
					$meta_countries = preg_replace('/, #/', '', $meta_countries . '#') . '</span>';
				}
			}

			$meta_genres = '';
			if($terms = wp_get_post_terms(get_the_ID(), 'taxgenres', ["fields" => "all"])){
				if(!is_wp_error($terms)){
					$meta_genres = '<span class="byline-ss incode-movies-l">' . __(count($terms) == 1 ? 'Genre' : 'Genres', 'incode-movies') . ':</span><span class="byline-ss incode-movies-d">';
					foreach($terms as $term){
						$meta_genres .= esc_html($term->name) . ', ';
					}
					$meta_genres = preg_replace('/, #/', '', $meta_genres . '#') . '</span>';
				}
			}
			echo '<div class="incode-movies-div1">' . $meta_genres . '</div>';
			echo '<div class="incode-movies-div2">' . $meta_countries . $meta_release . $meta_price . '</div>';

            ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><i class="fa fa-comment-o"></i><?php comments_popup_link( __( 'Leave a comment', 'unite' ), __( '1 Comment', 'unite' ), __( '% Comments', 'unite' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'unite' ), '<i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
	<hr class="section-divider">
</article><!-- #post-## -->
