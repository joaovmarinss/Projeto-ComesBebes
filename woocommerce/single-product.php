<?php get_header(); ?>
<main id="main-show-single-product">
    <div id="show-single-product">
    <?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
        <div class="locous">
		<?php wc_get_template_part( 'content', 'single-product' ); ?>
        </div>
	<?php endwhile; // end of the loop. ?>
    </div>
</main>
<?php get_footer(); ?>