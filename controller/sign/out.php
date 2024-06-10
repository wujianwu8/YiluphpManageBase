<?php
/**
 * 退出登录
 */

model_user_center::I()->sign_out();

$redirect_uri = '/sign/in';
if (!empty($_GET['redirect_uri'])){
    $tmp = trim($_GET['redirect_uri']);
    if ($tmp!=''){
        $redirect_uri = $tmp;
    }
}
if ($redirect_uri == '/sign/in'){
    //再次登录后需要跳转到的uri
    if (!empty($_GET['after_login_uri'])){
        $tmp = trim($_GET['after_login_uri']);
        if ($tmp!=''){
            $redirect_uri .= '?redirect_uri='.$tmp;
        }
    }
}
header('Location: '.$redirect_uri);
exit;