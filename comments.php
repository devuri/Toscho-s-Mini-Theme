<?php
if ( ! defined('ABSPATH') ) { die ('Nö.'); }

if ( $comments )
{
?><h2 id="comments"><?php
	comments_number('Kein Kommentar', 'Ein Kommentar', '% Kommentare');
?></h2>
<ol class="commentlist">
<?php
}
wp_list_comments(
	array (
		'type'      => 'comment'
	,	'style' => 'ul'
	)
);
?></ol>
<?php
comment_form();