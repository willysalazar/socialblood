<?php

session_start();
// added in v4.0.0
require_once 'autoload.php';
require_once 'functions.php';

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;

// init app with app id and secret
FacebookSession::setDefaultApplication('953016768062580', '5a8a3f0db7688d1284145ac5d4112458');

// login helper with redirect_uri
$helper = new FacebookRedirectLoginHelper('http://socialblood.jacksonf.com.br/fbconfig.php');
try {
    $session = $helper->getSessionFromRedirect();
} catch (FacebookRequestException $ex) {
    // When Facebook returns an error
} catch (Exception $ex) {
    // When validation fails or other local issues
}
// see if we have a session
if (isset($session)) {
    // graph api request for user data
    $request = new FacebookRequest($session, 'GET', '/me');
    $response = $request->execute();
    // get response
    $graphObject = $response->getGraphObject();
    $fbid = $graphObject->getProperty('id');              // To Get Facebook ID
    $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
    $femail = $graphObject->getProperty('email');    // To Get Facebook email ID
    /* ---- Session Variables ----- */
    $_SESSION['FBID'] = $fbid;
    $_SESSION['FULLNAME'] = $fbfullname;
    $_SESSION['EMAIL'] = $femail;
    
    $_SESSION['FB_SESSION'] = $session;
    
    

    $request = new FacebookRequest($session, 'GET', '/me/friends');
    $response = $request->execute();
    $frindsArray = $response->getGraphObject()->asArray();

    $_SESSION['FRIENDSFB'] = $frindsArray;


    checkuser($fbid, $fbfullname, $femail);
    /* ---- header location after session ---- */
    header("Location: index.php");
} else {
    $loginUrl = $helper->getLoginUrl(array('user_friends', 'email'));
    header("Location: " . $loginUrl);
}
