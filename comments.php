<?php
if ( $comments )
{
	?><h2 id="comments"><?php
		comments_number();
	?></h2>
	<ol class="commentlist">
	<?php
	wp_list_comments();
	?></ol>
	<?php
}
comments_open( get_the_ID() ) and comment_form();