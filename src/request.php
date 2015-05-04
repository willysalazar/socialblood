<?php

session_start();

define('SMARTY_RESOURCE_CHAR_SET', 'UTF-8');
require '/libs/Smarty.class.php';
require 'functions.php';

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

        print_r($_POST);

        addRequest($nome, $mensagem, $local, getPerfilUsuarioByFBId($_SESSION['FBID']));
        
        break;
    case 'view':
    default:
        $smarty->assign("requester_name", $_SESSION['USERNAME']);
        $smarty->assign("requester_picture", "https://graph.facebook.com/" . $_SESSION['FBID'] . "/picture");
        $smarty->assign("local_options", listRequest());
        $smarty->assign("optionLocal_selected", "");

        $smarty->display('request.tpl');
        break;
}







