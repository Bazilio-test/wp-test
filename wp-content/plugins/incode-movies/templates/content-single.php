<?php
/**
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header page-header">
        <div class="incode-movies-thmb-d">
			<?php
			if(has_post_thumbnail()){
				the_post_thumbnail([56, 84], ['class' => 'incode-movies-thm']);
			}else{
				echo '<img src="' . INCODE_MOVIES__PLUGIN_URL . 'assets/movie.png" class="incode-movies-thmb"/>';
			}
			?>
        </div>

        <h1 class="entry-title "><?php the_title(); ?></h1>

        <div class="entry-meta">
			<?php unite_posted_on(); ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->

    <div class="entry-content">
		<?php the_content(); ?>
		<?php
		wp_link_pages([
			'before' => '<div class="page-links">' . __('Pages:', 'unite'),
			'after'  => '</div>',
		]);
		?>
    </div><!-- .entry-content -->

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
				$meta_countries = '<span class="byline-ss incode-movies-l">' . __(count($terms) == 1 ? 'Country' : 'Countries', 'incode-movies') 
                    . ':</span><span class="byline-ss incode-movies-d">';
				foreach($terms as $term){
					$meta_countries .= esc_html($term->name) . ', ';
				}
				$meta_countries = preg_replace('/, #/', '', $meta_countries . '#') . '</span>';
			}
		}

		$meta_genres = '';
		if($terms = wp_get_post_terms(get_the_ID(), 'taxgenres', ["fields" => "all"])){
			if(!is_wp_error($terms)){
				$meta_genres = '<span class="byline-ss incode-movies-l">' . __(count($terms) == 1 ? 'Genre' : 'Genres', 'incode-movies') 
                    . ':</span><span class="byline-ss incode-movies-d">';
				foreach($terms as $term){
					$meta_genres .= esc_html($term->name) . ', ';
				}
				$meta_genres = preg_replace('/, #/', '', $meta_genres . '#') . '</span>';
			}
		}
		echo '<div class="incode-movies-div1">' . $meta_genres . '</div>';
		echo '<div class="incode-movies-div2">' . $meta_countries . $meta_release . $meta_price . '</div>';

		edit_post_link(__('Edit', 'unite'), '<i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span>');

		unite_setPostViews(get_the_ID());
		?>
        <hr class="section-divider">
    </footer><!-- .entry-meta -->
</article><!-- #post-## -->
