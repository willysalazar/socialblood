<?php

define('SMARTY_RESOURCE_CHAR_SET', 'UTF-8');
require '/libs/Smarty.class.php';


ini_set('date.timezone', 'America/Sao_Paulo');


$smarty = new Smarty;

$smarty->force_compile = true;
//$smarty->debugging = true;
$smarty->caching = true;
$smarty->cache_lifetime = 120;


$smarty->display('login.tpl');