<?php

/*
Add these lines to wp-config.php

define( 'WP_DEBUG', true );
define( 'WP_DEBUG_DISPLAY', false );
define( 'WP_DEBUG_LOG', true );
this should activate the debug log and save to the default location .../wp-content/debug.log

WP_DEBUG — turns the debugging features ON/OFF
WP_DEBUG_DISPLAY — sets to display the errors on your website at exact moment they happen, even if logged off
WP_DEBUG_LOG — sets to print out the errors to file .../wp-content/debug.log

*/
    
function mysite_pending($order_id) {
    error_log("[WOO] $order_id set to PENDING ", 0);
}
function mysite_failed($order_id) {
    error_log("[WOO] $order_id set to FAILED", 0);
}
function mysite_hold($order_id) {
    error_log("[WOO] $order_id set to ON HOLD", 0);
}
function mysite_processing($order_id) {
    require($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');
    global $wpdb, $woocommerce;
    $order = wc_get_order($order_id);
    $email=$order->get_billing_email();
    
    error_log("[WOO] $order_id set to PROCESSING for $email", 0);

    $getcourses_groups=[];
    foreach( $order->get_items() as $item_id => $item ){
        $product_id = $item->get_product_id();
        $product = $item->get_product();
        $att=$product->get_attributes();
        // error_log("[WOO] product_id= $product_id attributes: ".json_encode($att), 0);
        error_log("[WOO] pa_getcourse-group: ".$product->get_attribute('getcourse-group'), 0);
        $getcourses_groups[]=$product->get_attribute('getcourse-group');
    }

    require_once ARCHY_THEME_FUNCTIONS_PATH. '/getcourse/config.php';
    $getcourse_user = new \GetCourse\User();
    $getcourse_user::setAccountName(GETCOURSE_ACCOUNT);
    $getcourse_user::setAccessToken(GETCOURSE_KEY);

    $getcourse_user
        ->setEmail($email)
        ->setFirstName($order->get_billing_first_name())
        ->setLastName($order->get_billing_last_name())
        ->setUserAddField('Почтовый адрес', $order->get_formatted_billing_address())
        ->setOverwrite()
        ->setSessionReferer('http://infrabim.pro');

    foreach($getcourses_groups as $group_item){
        $groups=explode(', ',$group_item);
        foreach($groups as $group)
            $getcourse_user->setGroup($group);
    }
    try {
        $result = $getcourse_user
            ->apiCall($action = 'add');
        if ($result->success==true)
            $order->update_status('completed','add getcourse user info success');
        else
            $order->update_status('processing','error add getcourse user info');

    } catch (Exception $e) {
        error_log("[WOO] Error add user info: ".$e->getMessage(), 0);
        $order->update_status('processing',$e->getMessage());
    }
    error_log("[WOO] getcourse result: ".json_encode($result), 0);
}
function mysite_completed($order_id) {
    error_log("[WOO] $order_id set to COMPLETED", 0);
}
function mysite_refunded($order_id) {
    error_log("[WOO] $order_id set to REFUNDED", 0);
}
function mysite_cancelled($order_id) {
    error_log("[WOO] $order_id set to CANCELLED", 0);
}
    
add_action( 'woocommerce_order_status_pending', 'mysite_pending');
add_action( 'woocommerce_order_status_failed', 'mysite_failed');
add_action( 'woocommerce_order_status_on-hold', 'mysite_hold');
// Note that it's woocommerce_order_status_on-hold, not on_hold.
add_action( 'woocommerce_order_status_processing', 'mysite_processing');
add_action( 'woocommerce_order_status_completed', 'mysite_completed');
add_action( 'woocommerce_order_status_refunded', 'mysite_refunded');
add_action( 'woocommerce_order_status_cancelled', 'mysite_cancelled');
