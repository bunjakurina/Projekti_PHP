<?php
require ("src/Facebook/autoload.php");
session_start();
if(isset($_GET['state'])) {
    $_SESSION['FBRLH_state'] = $_GET['state'];
}
$fb = new \Facebook\Facebook([
    'app_id' => '887865684894598',
    'app_secret' => 'fa3b6c80f85a2835dd33b15c0e7dc46f',
    'default_graph_version' => 'v2.4'

]);

if(empty($access_token)) {
    echo "<button><a href='{$fb->getRedirectLoginHelper()->getLoginUrl("http://localhost/PHP/Projekti%20PHP/reservation1.php")}'>Login with Facebook </a></button>";
}

$access_token = $fb->getRedirectLoginHelper()->getAccessToken();

if(isset($access_token)) {
    try {
        $response = $fb->get('/me',$access_token);
        $fb_user = $response->getGraphUser();
        echo  $fb_user->getName();
        //  var_dump($fb_user);
    } catch (\Facebook\Exceptions\FacebookResponseException $e) {
        echo  'Graph returned an error: ' . $e->getMessage();
    } catch (\Facebook\Exceptions\FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
    }
}