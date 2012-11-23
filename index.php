<?php # -*- coding: utf-8 -*-
/**
 * @package Toscho’s Mini Theme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?> >
<link rel=stylesheet href="<?php echo get_stylesheet_uri(); ?>">
<title><?php
$title = wp_title( ' ', FALSE );
print empty ( $title ) ? get_bloginfo( 'name' ) : $title;
?></title>
<?php wp_head(); ?>

<body <?php body_class(); ?>>
<ul><?php wp_list_pages( array ( 'title_li' => FALSE ) ); ?></ul>

<?php
if ( have_posts() )
{
	while ( have_posts() )
	{
		the_post();

		print '<div class="' . join( ' ', get_post_class() ) . '">' . "\n\t";

		print '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
		the_content();
		wp_link_pages();

		print '</div>';
	}

	comments_template();
}
else
{
	?>
	<p>Not found</p>
	<?php
}

is_singular()
	and get_option( 'thread_comments' )
	and comments_open( get_the_ID() )
	and wp_enqueue_script( 'comment-reply' );

wp_footer();