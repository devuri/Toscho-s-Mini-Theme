<?php
if ( $comments )
{
	?><h2 id="comments"><?php
		comments_number();
	?></h2>
	<ol class="commentlist">
	<?php
	wp_list_comments();
	previous_comments_link();
	next_comments_link();
	?></ol>
	<?php
}
comments_open() && comment_form();