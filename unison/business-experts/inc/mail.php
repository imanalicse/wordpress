<?php

function martin_ajax_contact_mail()
{
    parse_str($_POST['alldata'], $all_data);
    
    $con_name = '';
    if(isset($all_data['con_name']) && $all_data['con_name'] != ''){
        $con_name = '<strong>Name: </strong>'.$all_data['con_name'].'<br/><br/>';
    }
    
    $con_fname = '';
    if(isset($all_data['con_fname']) && $all_data['con_fname'] != ''){
        $con_fname = '<strong>First Name: </strong>'.$all_data['con_fname'].'<br/><br/>';
    }
    
    $con_lname = '';
    if(isset($all_data['con_lname']) && $all_data['con_lname'] != ''){
        $con_lname = '<strong>Last Name: </strong>'.$all_data['con_lname'].'<br/><br/>';
    }
    
    $con_email = '';
    $from = '';
    if(isset($all_data['con_email']) && $all_data['con_email'] != ''){
        $con_name = '<strong>Email: </strong>'.$all_data['con_email'].'<br/><br/>';
        $from = $all_data['con_email'];
    }
    
    $con_message = '';
    if(isset($all_data['con_message']) && $all_data['con_message'] != ''){
        $con_message = $all_data['con_message'].'<br/><br/>';
    }
    
    $to = get_option('admin_email');
    if(isset($all_data['con_receive']) && $all_data['con_receive'] != ''){
        $to = $all_data['con_receive'].'<br/><br/>';
    }
    
    $subject = get_option('blogname').' User Query';
    if(isset($all_data['con_subject']) && $all_data['con_subject'] != ''){
        $subject = $all_data['con_subject'];
    }
    

    
    
    $message = $con_name;
    $message .= $con_fname;
    $message .= $con_lname;
    $message .= $con_email;
    $message .= $con_message;
    
    

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: <'.$from.'>' . "\r\n";

    $result = mail($to,$subject,$message,$headers);
    if($result)
    {
        echo 1;
    }
    else
    {
        echo 2;
    }
    
    die();
}