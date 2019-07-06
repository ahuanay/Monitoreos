<?php
    if(!session_id()){
        session_start();
    }

    // Incluir el autoloader del the SDK
    // require_once './vendor/facebook-php-sdk/autoload.php';
    require_once __DIR__ . '/facebook-php-sdk/autoload.php';

    // Include required libraries
    use Facebook\Facebook;
    use Facebook\Exceptions\FacebookResponseException;
    use Facebook\Exceptions\FacebookSDKException;

    /*
    * Configuración de Facebook SDK
    */
    $appId         = '605732463249377'; //Identificador de la Aplicación
    $appSecret     = 'd7dfc2785e66760e0a7e61c5877a09e2'; //Clave secreta de la aplicación
    // $redirectURL   = 'https://umarketsm.000webhostapp.com//user/login.php'; //Callback URL
    // $redirectURLBase   = 'https://umarketsm.000webhostapp.com//user/'; //Callback URL
    $redirectURL   = 'http://localhost/Monitoreos/user/login.php'; //Callback URL
    $redirectURLBase   = 'http://localhost/Monitoreos/user/'; //Callback URL
    $fbPermissions = array('');  //Permisos opcionales

    $fb = new Facebook(array(
        'app_id' => $appId,
        'app_secret' => $appSecret,
        'default_graph_version' => 'v2.9',
    ));

    // Obtener el apoyo de logueo
    $helper = $fb->getRedirectLoginHelper();

    // Try para obtener el token
    try {
        if(isset($_SESSION['facebook_access_token'])){
            $accessToken = $_SESSION['facebook_access_token'];
        }else{
            $accessToken = $helper->getAccessToken();
        }
    } catch(FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch(FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }

?>