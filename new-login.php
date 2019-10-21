<?php  
/** 
 * Template Name: login page 
 */  

function tryLogin($username,$password,$remember){
    global $errors,$info;
    global $wpdb;  
    $login_data = array();  
    $login_data['user_login'] = $username;  
    $login_data['user_password'] = $password;  
    $login_data['remember'] = $remember;  

    $user_verify = wp_signon( $login_data, false );   
    // $info[]=var_export($user_verify);
    // $info[]=var_export($login_data);
    if ( is_wp_error($user_verify) )   
        $errors[]= "Не правильные данные";  
    else
        header( 'Location:' . home_url() );  
}

// wp_mail('i@archangelsky.ru','test','test 2');

global $wpdb, $user_ID;  
//Check whether the user is already logged in  
if ($user_ID) 
{  
    header( 'Location:' . home_url() );  
} else
{  
    get_header();   
    $errors=array(); 
    $info=array(); 
if($_POST) 
{  
    global $wpdb;  
   
    $submit=$wpdb->escape($_REQUEST['submit']); 
    $subscribe = $wpdb->escape($_REQUEST['subscribe']);  
    
    // $info[]=var_export($_REQUEST);
    if ($submit=='login'){
        //We shall SQL escape all inputs  
        $username = $wpdb->escape($_REQUEST['username']);  
        $password = $wpdb->escape($_REQUEST['password']);  
        $remember = $wpdb->escape($_REQUEST['rememberme']);  
   
        if($remember) $remember = "true";  
        else $remember = "false";  
        
        tryLogin($username,$password,$remember);
    }else if ($submit=='register'){
        $username = $wpdb->escape($_REQUEST['username']);  
        if ( strpos($username, ' ') !== false )
            $errors[] = "Извините, имя пользователя не может содержать пробелы";  
        if(empty($username)) 
        {   
            $errors[] = "Пожалуйста введите имя пользователя";  
        } elseif( username_exists( $username ) ) 
            $errors[] = "Пользователь с таким именем уже сужествует, выберите другое имя";  
        $email = $wpdb->escape($_REQUEST['email']);  
        if( !is_email( $email ) ) 
        {   
            $errors[] = "Пожалуйств введите правильный адрес электронной почты";  
        } elseif( email_exists( $email ) ) 
            $errors[] = "Такой адрес электронной почты уже используется";  
        if(0 === preg_match("/.{6,}/", $_POST['password']))
            $errors[] = "Пароль должен быть больше 6-ти символов";  
        if(0 === count($errors)) 
        {  
            $password = $wpdb->escape($_REQUEST['password']);  
            $new_user_id = wp_create_user( $username, $password, $email );  
            if ($new_user_id>0){
                if ($subscribe) 
                    mc_addtolist($email,false);
                tryLogin($username,$password,true);
                // wp_mail('i@archangelsky.ru','new user',$username);
            }
            // else
            //     $errors[]='Пользователь не создан';
            // // You could do all manner of other things here like send an email to the user, etc. I leave that to you.  
            // $success = 1;  
            // header( 'Location:' . get_bloginfo('url') . '/login/?success=1&u=' . $username );  
        }  
    }else{
        $errors[]='Не известная команда';
    }
} else 
{  
    // No login details entered - you should probably add some more user feedback here, but this does the bare minimum  
    //echo "Invalid login details";  
}  

 ?>
 <script src="/wp-content/themes/appointment-archy/js/validator.min.js"></script>  
  <div class="page-builder">
	<div class="container">
		<div class="row">
            <?php 
                if (count($info)>0){
                    echo '<div class="alert alert-primary alert-info" role="alert">';
                    foreach ($info as $info_item)
                        echo '<p>'.$info_item.'</p>';
                    echo '</div>';
                }
                if (count($errors)>0){
                    echo '<div class="alert alert-primary alert-danger" role="alert">';
                    foreach ($errors as $errors_item)
                        echo '<p>'.$errors_item.'</p>';
                    echo '</div>';
                }
            ?>
			<!-- Blog Area -->
			<div class="col-md-6">
                <h2><?php do_action( 'wordpress_social_login' ); ?> </h2>
                <p>или</p>
                <h2>Уже есть аккаунт:</h2>
                <!-- <form id="login1" name="form" action="<?php echo home_url(); ?>/login/" method="post" class=" commentsblock">  
                    <div><input id="username" type="text" placeholder="Имя пользователя" name="username" class="text"></div>
                        <div><input id="password" type="password" placeholder="Пароль" name="password" class="text">  </div>
                        <br>
                        <p><input id="submit" type="submit" name="submit" value="Войти">  </p>
                    </form> -->
                <form data-toggle="validator" role="form" id="wp_login_form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" class="commentsblock">  
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" id="loginUsername" placeholder="Имя пользователя" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <input type="password" data-minlength="6" class="form-control" name="password" id="loginPassword" placeholder="Пароль" required>
                        <div class="help-block"></div>
                    </div>
                    <div>
                        <input name="remember" id="remember" type="checkbox" checked="checked" value="Yes">  
                        <label for="remember">Запомнить меня</label>  
                    </div>
                    <p><input type="hidden" name="submit" value="login" />  </p>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Войти</button>
                    </div>
                </form> 
            </div>
			<div class="col-md-6">
                <h2>Регистрация нового пользователя:</h2>
                <form data-toggle="validator" role="form" id="wp_signup_form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" class="commentsblock">  
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Имя пользователя" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Электронная почта" data-error="Не правильный адрес электронной почты" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <div class="form-inline row">
                            <div class="form-group col-sm-6">
                                <input type="password" data-minlength="6" class="form-control" name="password" id="inputPassword" placeholder="Пароль" required>
                                <div class="help-block">Минимум 6 символов</div>
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Упс, пароли не совпадают..." placeholder="Пароль еще раз" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input name="terms" id="terms" type="checkbox" checked="checked" value="Yes" class="" required>  
                        <label for="terms">Я согласен с <a href="/политика-конфиденциальности/" target="_blank">Политикой конфиденциальности</a> и <a href="/оферта/" target="_blank">Правилами использования</a>.</label>  
                        <div class="help-block with-errors"></div>
                    </div>
                    <div>
                        <input name="subscribe" id="subscribe" type="checkbox" checked="checked" value="Yes">  
                        <label for="terms">Хочу первым получать последние новости и информацию о новых курсах/акциях/скидках и бесплатных раздачах.</label>  
                    </div>
                    <p><input type="hidden" name="submit" value="register" />  </p>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                    </div>
                </form> 
            </div>
        </div>
        <br><br>
    </div>
</div>
<?php 
get_footer(); 
} ?>  