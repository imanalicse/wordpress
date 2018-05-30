<div class="mrks-share-buttons">
    <!-- Facebook -->
    <a href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(get_the_permalink()); ?>" target="_blank">
        <i class="fa fa-facebook"></i>
    </a>

    <!-- Google+ -->
    <a href="https://plus.google.com/share?url=<?php echo urlencode(get_the_permalink()); ?>" target="_blank">
        <i class="fa fa-google-plus"></i>
    </a>

    <!-- LinkedIn -->
    <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo urlencode(get_the_permalink()); ?>" target="_blank">
        <i class="fa fa-linked"></i>
    </a>

    <!-- Pinterest -->
    <a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_the_permalink()); ?>&description=<?php echo urlencode(get_the_title()); ?>"  target="_blank">
        <i class="fa fa-pinterest-p"></i>
    </a>

    <!-- Print -->
    <a href="javascript:;" onclick="window.print()">
        <i class="fa fa-print"></i>
    </a>

    <!-- Reddit -->
    <a href="http://reddit.com/submit?url=<?php echo urlencode(get_the_permalink()); ?>&amp;title=<?php echo urlencode(get_the_title()); ?>" target="_blank">
        <i class="fa fa-reddit"></i>
    </a>

    <!-- StumbleUpon-->
    <a href="http://www.stumbleupon.com/submit?url=<?php echo urlencode(get_the_permalink()); ?>&amp;title=<?php echo urlencode(get_the_title()); ?>" target="_blank">
        <i class="fa fa-stumbleupon"></i>
    </a>

    <!-- Tumblr-->
    <a href="http://www.tumblr.com/share/link?url=<?php echo urlencode(get_the_permalink()); ?>&amp;title=<?php echo urlencode(get_the_title()); ?>" target="_blank">
        <i class="fa fa-tumblr"></i>
    </a>

    <!-- Twitter -->
    <a href="https://twitter.com/share?url=<?php echo urlencode(get_the_permalink()); ?>&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" target="_blank">
        <i class="fa fa-twitter"></i>
    </a>


    <!-- Digg -->
    <a href="http://www.digg.com/submit?url=<?php echo urlencode(get_the_permalink()); ?>" target="_blank">
        <i class="fa fa-digg"></i>
    </a>

    <!-- Email -->
    <a href="mailto:?Subject=<?php echo urlencode(get_the_title()); ?>&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 <?php echo urlencode(get_the_permalink()); ?>">
        <i class="fa fa-envelope-o"></i>
    </a>
</div>