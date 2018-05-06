<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
} 

$title = '';
if ($atts['title'] != '') {
    $title = $atts['title'];
}

$title_color = '';
if ($atts['title_color'] != '') {
    $title_color = 'color: '.$atts['title_color'].'; ';
}

$message = '';
if ($atts['message'] != '') {
    $message = $atts['message'];
}

$message_color = '';
if ($atts['message_color'] != '') {
    $message_color = 'color: '.$atts['message_color'].'; ';
}

$buttons = array();
if(!empty($atts['buttons'])){
    $buttons = $atts['buttons'];
}


?>
<div class="row">
    <div class="col-lg-7 col-xs-12">
        <div class="actionCont">
            <h1 style="<?php echo esc_attr($title_color); ?>"><?php echo strip_tags($title, '<span><br/><strong>'); ?></h1>
            <p style="<?php echo strip_tags($message_color); ?>"><?php echo strip_tags($message); ?></p>
        </div>
    </div>
    <div class="col-lg-5 col-xs-12 text-right">
        <div class="actionBtn">
            <?php 
                if(is_array($buttons) && count($buttons) > 0)
                {
                    $b = 1;
                    $t = count($buttons);
                    foreach($buttons as $btn)
                    {
                        $class = '';
                        if($b != $t)
                        {
                            $class .= 'marginRight ';
                        }
                        if($btn['btn_styles'] == 1)
                        {
                            $class .= 'btn_black ';
                        }
                        elseif($btn['btn_styles'] == 2){
                            $class .= 'hover_white ';
                        }
                        elseif($btn['btn_styles'] == 3){
                            $class .= 'btn_blue ';
                        }
                        if($btn['button_action'] == 1){
                            $class .= 'scroll_to_button ';
                        }
                        ?>
                        <a href="<?php echo esc_attr($btn['button_link']); ?>" class="martin_btn <?php echo esc_attr($class); ?>"><i><?php echo strip_tags($btn['button_label']) ?></i><span></span></a>
                        <?php
                        $b++;
                    }
                }
            ?>
        </div>
    </div>
</div>