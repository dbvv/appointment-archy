<?php

// do_shortcode('archy_subscribe');
// http://developer.mailchimp.com/documentation/mailchimp/reference/lists/members/

add_shortcode('archy_subscribe', 'archy_subscribe_form_draw',999);

function mc_addtolist($email, $debug,$fname='',$lname='') {
    return _mc_addtolist($email,$debug,'ed6f7dabefa0418df606a9efb09fc501-us18','cfa2f3f8f0','us18',$fname,$lname);
}

function _mc_addtolist($email, $debug, $apikey, $listid, $server,$fname='',$lname='') {
    $userid = md5($email);
    $auth = base64_encode( 'user:'. $apikey );
    $data = array(
        'apikey'        => $apikey,
        'email_address' => $email,
        'merge_fields'=>array('FNAME'=>$fname, 'LNAME'=>$lname),
        'status' => 'subscribed'
        );
    $json_data = json_encode($data);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://'.$server.'.api.mailchimp.com/3.0/lists/'.$listid.'/members');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
        'Authorization: Basic '. $auth));
    curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    $result = curl_exec($ch);
    if ($debug) {
        var_dump($result);
    }
    $json = json_decode($result);
    return $json->{'status'};
}

function mc_checklist($email, $debug, $apikey, $listid, $server) {
    $userid = md5($email);
    $auth = base64_encode( 'user:'. $apikey );
    $data = array(
        'apikey'        => $apikey,
        'email_address' => $email
        );
    $json_data = json_encode($data);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://'.$server.'.api.mailchimp.com/3.0/lists/'.$listid.'/members/' . $userid);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
        'Authorization: Basic '. $auth));
    curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    $result = curl_exec($ch);
    if ($debug) {
        var_dump($result);
    }
    $json = json_decode($result);
    return $json->{'status'};
}

function archy_subscribe_form_draw(){ 
    ob_start();
    if (is_user_logged_in()){
	$userid =get_current_user_id();
	$user_info = get_userdata($userid);
	$email = $user_info->user_email;
	$last_name = $user_info->last_name;
	$first_name = $user_info->first_name;
    $subscribe_status=mc_checklist($email,false,'ed6f7dabefa0418df606a9efb09fc501-us18','cfa2f3f8f0','us18');
    // echo $subscribe_status;
	if ($subscribe_status!="subscribed"){
		?>
<!-- Begin MailChimp Signup Form -->
<div id="mc_embed_signup">
<form action="https://infrabim.us18.list-manage.com/subscribe/post?u=a41e1731bd70e1bc4974cb2ee&amp;id=cfa2f3f8f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
	<input type="hidden" value="<?php echo $email; ?>" name="EMAIL" class="required email" id="mce-EMAIL">
	<input type="hidden" value="<?php echo $first_name; ?>" name="FNAME" class="" id="mce-FNAME">
	<input type="hidden" value="<?php echo $last_name; ?>" name="LNAME" class="" id="mce-LNAME">
    <div style="position: absolute; left: -5000px;" aria-hidden="true">
		<input type="hidden" name="b_a41e1731bd70e1bc4974cb2ee_cfa2f3f8f0" tabindex="-1" value="">
	</div>
	<input type="submit" value="Подписаться" name="subscribe" id="mc-embedded-subscribe" class="button">
</form>
</div>
<!--End mc_embed_signup-->
<?php }else{  ?>
	<a href="https://infrabim.us18.list-manage.com/unsubscribe?u=a41e1731bd70e1bc4974cb2ee&id=cfa2f3f8f0" target="_blank">Отписаться<a>
<?php }
    } else{
        ?>
<!-- Begin MailChimp Signup Form -->
<div id="mc_embed_signup">
<form action="https://infrabim.us18.list-manage.com/subscribe/post?u=a41e1731bd70e1bc4974cb2ee&amp;id=cfa2f3f8f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
	<h2>Подпишитесь на нашу рассылку:</h2>
<div class="indicates-required"><span class="asterisk">*</span> обязательные поля</div>
<div class="mc-field-group">
	<label for="mce-EMAIL">Электронная почта <span class="asterisk">*</span>
</label>
	<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
</div>
<div class="mc-field-group">
	<label for="mce-FNAME">Имя </label>
	<input type="text" value="" name="FNAME" class="" id="mce-FNAME">
</div>
<div class="mc-field-group">
	<label for="mce-LNAME">Фамилия </label>
	<input type="text" value="" name="LNAME" class="" id="mce-LNAME">
</div>
<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_a41e1731bd70e1bc4974cb2ee_cfa2f3f8f0" tabindex="-1" value=""></div>
    <br>
    <div class="clear"><input type="submit" value="Подписаться" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
    </div>
</form>
</div>
<br>или перейдите по ссылке, чтобы <a href="https://infrabim.us18.list-manage.com/unsubscribe?u=a41e1731bd70e1bc4974cb2ee&id=cfa2f3f8f0" target="_blank">отписаться<a>

<!--End mc_embed_signup-->
        <?php 
    }
    return ob_get_clean(); 
}?>