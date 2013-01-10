<!doctype html>
<html <?php language_attributes(); ?> >
<link rel=stylesheet href="<?php echo get_stylesheet_uri(); ?>">
<title><?php
$title = trim( wp_title( ' ', FALSE ) );
print '' === $title ? get_bloginfo( 'name' ) : $title;
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
		print '<div class="' . join( ' ', get_post_class() ) . '">' . "\n\t"
			. '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
		the_content();
		wp_link_pages();
		print '</div>';
	}
}
else
{
	?>
	<p>Not found</p>
	<?php
}

if ( is_singular() )
{
	post_password_required() || comments_template();
	get_option( 'thread_comments' )
	and comments_open( get_the_ID() )
	and wp_enqueue_script( 'comment-reply' );

	previous_post_link();
	next_post_link();
}
else
{
	previous_posts_link();
	next_posts_link();
}
wp_footer();