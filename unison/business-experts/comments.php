<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Martin
 * @subpackage Martin
 * @since Martin 1.0
 */
if (post_password_required())
{
   return;
}
?>
<div class="clearfix"></div>
<div id="comments" class="comments-area">

   <?php if (have_comments()): ?>
      <?php
      $commentNum = get_comments_number();
      ?>
      <div class="text-left">
         <span class="line"></span>
         <h2 class="sectionTitle white">All<b>.</b><span>Comments</span></h2>
         <p class="sectionSubtitle">Read all comments (<?php echo esc_html($commentNum) ?> <?php echo esc_html__('Comments', 'martin') ?>) </p>
      </div>

      <ol class="comment-list commentsList">
         <?php
         wp_list_comments(array('callback' => 'martin_comment_listing', 'per_page' => 100));
         ?>
      </ol><!-- .comment-list -->
   <?php endif; // Check for have_comments().  ?>
</div><!-- .comments-area -->
<div class="commentsLeave">
   <?php
   $fields = array(
       'author' => '<div class="leftInput pull-left"><p><input class="com_inputa" id="author" placeholder="' . esc_html__('YOUR NAME *', 'martin') . '" name="author" type="text" value="' .
       esc_attr($commenter['comment_author']) . '" size="30" /></p></div>',
       'email' => '<div class="rightInput pull-left"><p><input  class="com_inputa marginal" id="email" placeholder="' . esc_html__('EMAIL ADDRESS *', 'martin') . '" ID" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) .
       '" size="30" /></p></div>',
       'url' => '',
   );
   $fields = apply_filters('comment_form_default_fields', $fields);
   $args = array(
       'fields' => $fields,
       'comment_field' => '<p><textarea id="comment" class="com_textarea" name="comment"  placeholder="' . esc_html__('YOUR COMMENT *', 'martin') . '" aria-required="true" required="required"></textarea></p>',
       'logged_in_as' => '',
       'comment_notes_before' => '',
       'comment_notes_after' => '',
       'id_form' => 'commentform',
       'id_submit' => 'submit',
       'class_form' => 'dropLineForm',
       'class_submit' => 'defaultButton',
       'name_submit' => 'submit',
       'title_reply' => esc_html__('Post your Comments', 'martin'),
       'title_reply_to' => esc_html__('Post your Comments to %s', 'martin'),
       'title_reply_before' => '<div class="text-left"><span class="line"></span><h2 class="sectionTitle white">Leave<b>.</b><span>Comments</span></h2><p class="sectionSubtitle">',
       'title_reply_after' => '</p></div>',
       'cancel_reply_before' => ' <small>',
       'cancel_reply_after' => '</small>',
       'cancel_reply_link' => esc_html__('Cancel reply', 'martin'),
       'label_submit' => esc_html__('Submit comment', 'martin'),
       'submit_button' => '<div class="sButton"><button name="%1$s" type="submit" id="%2$s" class="%3$s">%4$s</button></div>',
       'submit_field' => '%1$s %2$s',
   );
   comment_form($args);
   ?>
</div>


