<?php //zimuzu.tv

function login_post($url, $cookie, $post) { 
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 0);
    curl_setopt($curl, CURLOPT_COOKIEJAR, $cookie); 
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); //屏蔽返回
    curl_exec($curl);
    curl_close($curl);
} //登录

function get_content($url, $cookie) { 
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_HEADER, 0); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
    $rs = curl_exec($ch); 
    curl_close($ch); 
    return $rs; 
} //获取内容

$post = array ( 
    'account' => '', //帐号
    'password' => '', //密码
    'remember' => '1', 
    'url_back' => 'http://www.zimuzu.tv/user/reg'
); //POST数据 
 
$url = "http://www.zimuzu.tv/User/Login/ajaxLogin"; 
$cookie = dirname(__FILE__) . '/cookie_zimuzu.txt'; 
$url2 = "http://www.zimuzu.tv/today"; 
login_post($url, $cookie, $post); 
$content = get_content($url2, $cookie); 
@ unlink($cookie);

//print_r($content);
