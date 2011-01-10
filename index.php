<?php # -*- coding: utf-8 -*-
/**
 * @package Toscho’s Mini Theme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?> >
<link rel=stylesheet href="<?php echo get_stylesheet_uri(); ?>">
<?php
if ( ! class_exists( 'wpSEO' ) )
{
?>
<title><?php wp_title(); ?></title>
<?php
}
else
{
	do_action('wpseo_template_output');
}
?>
<?php wp_head(); ?>

<body <?php body_class(); ?>>

<ul><?php wp_list_pages( array ( 'title_li' => FALSE ) ); ?></ul>

<h1><?php the_title(); ?></h1>

<?php
if ( have_posts() )
{
	is_singular() and print '<ul>';

	while ( have_posts() )
	{
		the_post();

		print is_singular() ? '<div' : '<li';
		print ' class="' . join( ' ', get_post_class() ) . '">' . "\n\t";

		if ( is_singular() )
		{
			the_content();
			wp_link_pages();
		}
		else
		{
			print '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
			the_excerpt();
		}

		print is_singular() ? "</div>\n" : "</li>\n";
	}
			comments_template();

	! is_singular() and print '</ul>';
}
else
{
	?>
	Sorry, gibt’s hier nicht.
	<?php
}

if ( is_singular() && get_option( 'thread_comments' ) )
{
	wp_print_scripts( 'comment-reply' );
}
wp_footer();
