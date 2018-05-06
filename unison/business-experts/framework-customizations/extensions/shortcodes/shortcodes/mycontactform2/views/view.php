<?php
if (!defined('FW')) {
    die('Forbidden');
}


$form_type = 1;
if ($atts['form_type'] != '') {
    $form_type = $atts['form_type'];
}

$form = $form_type['gadget'];
$shortcode = $form_type[2]['con_shortcode'];



$con_email = get_option('admin_email');
if ($atts['con_email'] != '') {
    $con_email = $atts['con_email'];
}

$btn_value = 'Send Message';
if ($atts['btn_value'] != '') {
    $btn_value = $atts['btn_value'];
}

$fname_place = 'FIRST NAME';
if ($atts['fname_place'] != '') {
    $name_place = $atts['fname_place'];
}

$lname_place = 'LAST NAME';
if ($atts['lname_place'] != '') {
    $name_place = $atts['lname_place'];
}

$email_place = 'EMAIL ADDRESS';
if ($atts['email_place'] != '') {
    $email_place = $atts['email_place'];
}

$message_place = 'YOUR MESSAGE';
if ($atts['message_place'] != '') {
    $message_place = $atts['message_place'];
}

$subject_place = 'SUBJECT';
if ($atts['subject_place'] != '') {
    $subject_place = $atts['subject_place'];
}
?> 
<div class="row">
    <div class="contactForminner contactForm1">
        <?php if($form == 2): ?>
            <?php echo do_shortcode($shortcode); ?>
        <?php else: ?>
        <form class="contacts_form_martin" id="contactForm" action="#" method="post">
            <div data-wow-delay="300ms" data-wow-duration="700ms" class="col-sm-6 noPaddingLeft paddingleft15mobile">
                <input type="text" class="required emptys" id="con_fname" name="con_fname" placeholder="<?php echo esc_attr($fname_place); ?>">                                  
                <input type="text" class="required emptys" id="con_lname" name="con_lname" placeholder="<?php echo esc_attr($lname_place) ?>">                                                           
                <input type="email" class="required emptys" id="con_email" name="con_email" placeholder="<?php echo esc_attr($email_place); ?>">                                                                                        
                <input type="text" class="required emptys" id="con_subject" name="con_subject" placeholder="<?php echo esc_attr($subject_place); ?>">
            </div>
            <div data-wow-delay="350ms" data-wow-duration="700ms" class="col-sm-6 noPaddingRight" >
                <textarea class="required emptys" id="con_message" name="con_message" placeholder="<?php echo esc_attr($message_place); ?>"></textarea>
                <button class="martin_btn big noRadius hover_black" id="con_submit" type="submit"><i><?php echo esc_html($btn_value); ?></i><span></span></button>
                <input type="hidden" name="con_receive" value="<?php echo esc_attr($con_email); ?>"/>
            </div>
        </form>
        <?php endif; ?>
    </div>
</div>