<?php

session_start();

define('SMARTY_RESOURCE_CHAR_SET', 'UTF-8');
require '/libs/Smarty.class.php';
require 'functions.php';

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

ini_set('date.timezone', 'America/Sao_Paulo');


$smarty = new Smarty;

$smarty->force_compile = true;
//$smarty->debugging = true;
$smarty->caching = true;
$smarty->cache_lifetime = 120;



$_action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'view';

switch ($_action) {
    case 'submit':

        $nome = $_POST['txtPaciente'];
        $mensagem = $_POST['txtMensagem'];
        $local = $_POST['cbxLocal'];
        $tipoSanguineo = $_POST['cbxTipoSangue'];        

        $id = addRequest($nome, $mensagem, $local, getPerfilUsuarioByFBId($_SESSION['FBID']), $tipoSanguineo);

        header("Location: request.php?id=$id");
        break;
    case 'view':
    default:
        
        
        $requestDTO = getRequestById($_GET['id']);        
        
        $smarty->assign("requester_name", $_SESSION['USERNAME']);
        $smarty->assign("requester_picture", "https://graph.facebook.com/" . $_SESSION['FBID'] . "/picture");
        $smarty->assign("local_options", listLocal());
        $smarty->assign("sangue_options", listTipoSanguineo());
        $smarty->assign("requestId", $requestDTO->getId());
        $smarty->assign("nomePaciente", $requestDTO->getNome_paciente());
        $smarty->assign("mensagem", $requestDTO->getMensagem());
        $smarty->assign("optionLocal_selected", $requestDTO->getFk_local());
        $smarty->assign("optionSangue_selected", $requestDTO->getFk_tiposanguineo());

        $smarty->display('request.tpl');
        break;
}
