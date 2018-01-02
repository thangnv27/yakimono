<?php
add_action( 'wp_ajax_nopriv_' . getRequest('action'), getRequest('action') );  
add_action( 'wp_ajax_' . getRequest('action'), getRequest('action') ); 

function book_table() {
    $name = getRequest('name');
    $phone = getRequest('phone');
    $email = getRequest('email');
    $date = getRequest('date');
    $code = random_string(6);
    
    if(is_email($email)){
        $admin_email = get_settings('admin_email');
        $subject = get_option('blogname') . " - Thông tin đặt bàn";
        
        $bill_html = <<<HTML
<p>Họ tên: <strong>{$name}</strong></p>
<p>Số điện thoại: <strong>{$phone}</strong></p>
<p>Email: <strong>{$email}</strong></p>
<p>Ngày đặt bàn: <strong>{$date}</strong></p>
<p>Code: <strong>{$code}</strong></p>
HTML;


        add_filter('wp_mail_content_type', 'set_html_content_type');
        wp_mail($email, $subject, $bill_html);
        wp_mail($admin_email, $subject, $bill_html);

        // reset content-type to avoid conflicts
        remove_filter('wp_mail_content_type', 'set_html_content_type');
        
        Response($bill_html);
    }
    exit;
}