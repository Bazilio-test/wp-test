<?php
/**
 * The template for displaying Archive pages.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

<section id="primary" class="content-area col-sm-12 col-md-8 <?php echo of_get_option('site_layout'); ?>">
    <main id="main" class="site-main" role="main">

		<?php if(have_posts()) : ?>

            <header class="page-header">
				<?php
				the_archive_title('<h1 class="page-title">', '</h1>');
				the_archive_description('<div class="taxonomy-description">', '</div>');
				?>
            </header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while(have_posts()) : the_post(); ?>

				<?php
				load_template(INCODE_MOVIES__PLUGIN_DIR . '/templates/content.php', false);
				?>

			<?php endwhile; ?>

			<?php unite_paging_nav(); ?>

		<?php else : ?>

			<?php load_template(INCODE_MOVIES__PLUGIN_DIR . '/templates/content-none.php', true); ?>

		<?php endif; ?>

    </main><!-- #main -->
</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
