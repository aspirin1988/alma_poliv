<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package alma_poliv
 */

$current_obj1=get_queried_object();
$args=array();
if (!is_category()) {
	$categories=get_the_category();
	$args = array( 'category_name'=> $categories[0]->slug ,'numberposts'=>100 , 'order'=>'DESC' );
	query_posts($args);
}
else{
	$args = array( 'category_name'=> $current_obj1->slug ,'numberposts'=>100 , 'order'=>'DESC' );
};
print_r($args);
$temp_post=query_posts($args);

get_header(); ?>

	<!--НАЧАЛО portfolio -->
	<div class="services container">
		<h2><?php $current_obj=get_queried_object(); echo $current_obj->name; ?></h2>
		<?php
		if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			$route=0;
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */

					get_template_part('template-parts/content', 'services-left');
			endwhile;
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

	</div>

<?php
get_footer();
