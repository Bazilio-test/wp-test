<?php
/**
 *
 */

$cn = $GLOBALS['unite_child_cn'];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("col-sm-12 col-md-{$cn} col-lg-{$cn} col-xl-{$cn}"); ?>>
    <header class="entry-header page-header">

        <div class="unite-child-thmb-d">
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php
				if(has_post_thumbnail()){
					the_post_thumbnail([56, 84], ['class' => 'unite-child-thm']);
				}else{
					echo '<img src="' . get_stylesheet_directory_uri() . '/inc/movie.png" class="unite-child-thmb"/>';
				}
				?></a>
        </div>
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

		<?php if('post' == get_post_type()) : ?>
            <div class="entry-meta">
				<?php unite_posted_on(); ?>
            </div><!-- .entry-meta -->
		<?php endif; ?>
    </header><!-- .entry-header -->

	<?php if(is_search()) : // Only display Excerpts for Search ?>
        <div class="entry-summary">
			<?php the_excerpt(); ?>
            <p><a class="btn btn-primary read-more"
                  href="<?php the_permalink(); ?>"><?php _e('Continue reading', 'unite'); ?> <i
                            class="fa fa-chevron-right"></i></a></p>
        </div><!-- .entry-summary -->
	<?php else : ?>
        <div class="entry-content">

			<?php if(of_get_option('blog_settings') == 1 || !of_get_option('blog_settings')) : ?>
				<?php the_content(__('Continue reading <i class="fa fa-chevron-right"></i>', 'unite')); ?>
			<?php elseif(of_get_option('blog_settings') == 2) : ?>
				<?php the_excerpt(); ?>
			<?php endif; ?>

			<?php
			wp_link_pages([
				'before' => '<div class="page-links">' . __('Pages:', 'unite'),
				'after'  => '</div>',
			]);
			?>
        </div><!-- .entry-content -->
	<?php endif; ?>

    <footer class="entry-meta">
		<?php

		$meta_genres = '';
		if($terms = wp_get_post_terms(get_the_ID(), 'taxgenres', ["fields" => "all"])){
			if(!is_wp_error($terms)){
				$meta_genres = '<span class="unite-child-l unite-child-l-genre" title="'
					. __(count($terms) == 1 ? 'Genre' : 'Genres', 'incode-movies') . '"></span><span class="unite-child-d">';
				foreach($terms as $term){
					$meta_genres .= esc_html($term->name) . ', ';
				}
				$meta_genres = preg_replace('/, #/', '', $meta_genres . '#') . '</span>';
			}
		}

		$meta_countries = '';
		if($terms = wp_get_post_terms(get_the_ID(), 'taxcountries', ["fields" => "all"])){
			if(!is_wp_error($terms)){
				$meta_countries = '<span class="unite-child-l unite-child-l-countries" title="'
					. __(count($terms) == 1 ? 'Country' : 'Countries', 'incode-movies') . '"></span><span class="unite-child-d">';
				foreach($terms as $term){
					$meta_countries .= esc_html($term->name) . ', ';
				}
				$meta_countries = preg_replace('/, #/', '', $meta_countries . '#') . '</span>';
			}
		}

		$meta_release = '';
		if($release = get_post_meta(get_the_ID(), 'release_date', true)){
			$meta_release = '<span class="unite-child-l unite-child-l-release" title="'
				. __('Release date of the film', 'incode-movies') . '"></span><span class="unite-child-d">' . esc_html($release) . '</span>';
		}

		$meta_price = '';
		if($price = get_post_meta(get_the_ID(), 'show_price', true)){
			$meta_price = '<span class="unite-child-l unite-child-l-price" title="'
				. __('Cost of the movie show', 'incode-movies') . '"></span><span class="unite-child-d">' . esc_html($price) . '</span>';
		}
		echo '<div class="unite-child-div1">' . $meta_genres . '</div>';
		echo '<div class="unite-child-div2">' . $meta_countries . $meta_release . $meta_price . '</div>';

		?>

    </footer><!-- .entry-meta -->

</article><!-- #post-## -->
