<?php
	if ( post_password_required() ) { ?>
		<h4>This post is password protected. Enter the password to view comments.</h4>
	<?php
		return;
	}
        
?>



	
<!--Blog Comments-->
<div id="comments" class="blog_comments clearfix">

<h4><?php comments_number('No Comments', 'One Comment', '% Comments');?></h4>
        
<?php if ( have_comments() ) { ?>

    <div class="comments-navigation">
		<div class="alignleft"><?php previous_comments_link(); ?></div>
	    <div class="alignright"><?php next_comments_link(); ?></div>
	</div>

	<?php wp_list_comments('callback=brightergy_comment&style=div'); ?>
			
	<div class="comments-navigation">
	    <div class="alignleft"><?php previous_comments_link(); ?></div>
	    <div class="alignright"><?php next_comments_link(); ?></div>
	</div>

<?php } // if have comments ?>

</div>
<!--Blog Comments-->




<?php if ( comments_open() ) { ?>

<!-- Comment formular. -->
<div class="form-wrapper">


<?php  
        global $show_sidebar;

        $class_message_area = '';
        if( is_user_logged_in() ){

            $class_message_area = 'comment_area_loggedin';
        }

        $comment_id = "comment";
                            
        $args = array(
                        'id_form'           => 'commentsform',
                        'id_submit'         => 'submit',
                        'class_submit'      => 'btn btn-brg-primary btn-lg',
                        'title_reply'       => '<h3 class="leave-comment">Leave a comment</h3>',
                        'title_reply_to'    => '<h3 class="leave-comment">Leave a comment to %s </h3>',
                        'cancel_reply_link' => 'Cancel Reply',
                        'label_submit'      => 'Post Comment',

                        'comment_field' =>  '<div class="row"><div class="col-md-12"><textarea id="' . $comment_id . '" name="comment" placeholder="Comment" class="form-control gradient-bordered" rows="8" required aria-required="true"></textarea></div></div>',
            
                        'comment_notes_before' => '',

                        'comment_notes_after' => '',
            
                        'fields' => apply_filters( 'comment_form_default_fields', array(

                                                    'author' => '<div class="row">'.
                                                                '<div class="col-md-6">' . 
                                                                '<input name="author" class="form-control" type="text" id="author" value=\'\' placeholder="Your Name" required aria-required="true" >' . 
                                                                '</div>',

                                                    'email' =>  '<div class="col-md-6">' . 
                                                                '<input name="email" type="email" id="email" value=\'\' class="form-control" placeholder="Your Email Address" required aria-required="true" >'.
                                                                '</div></div>',

                                                    'url' => ''
                                                    )
                                                )
                    );
                
        comment_form( $args );

?>
        
        <!-- /Comments formular. -->
        </div>

<?php

} else {
// comments are closed
?>

    <!-- If comments are closed. -->
    <h4>Comments are closed.</h4>        

<?php

} 

?>

