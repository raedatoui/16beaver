
<div id="comments" class="col-xs-12 col-sm-8 col-md-6">


<?php

function my_fields($fields) {
	$fields['author']	= '<p class="comment-form-author comment-form-row"><label for="author">Name*</label><input id="author" name="author" type="text" value="" size="30" aria-required="true"></p>';
	$fields['email']	= '<p class="comment-form-email comment-form-row"><label for="email">Email*</label><input id="email" name="email" type="text" value="" size="30" aria-required="true"></p>';
	$fields['subject']	= '<p class="comment-form-subject comment-form-row"><label for="subject">Subject</label><input id="subject" name="subject" type="text" value="" size="30" aria-required="true"></p>';
	return $fields;
}

$cfields = array();
add_filter('comment_form_default_fields','my_fields');

$comments = array(
	'fields'               => apply_filters( 'comment_form_default_fields', $cfields ),
	'comment_field'        => '<p class="comment-form-comment comment-form-row"><label for="comment">Comments</label><br/><textarea id="comment" name="comment"></textarea></p>',
	'comment_notes_before' => '',
	'comment_notes_after'  => '',
	'id_form'              => 'commentform',
	'id_submit'            => 'submit',
	'title_reply'          => __( 'Questions? Ask us' ),
	'title_reply_to'       => __( 'Leave a Reply to %s' ),
	'cancel_reply_link'    => __( 'Cancel reply' ),
	'label_submit'         => __( 'Submit' ),
);

comment_form($comments); ?>

</div><!-- #comments -->
