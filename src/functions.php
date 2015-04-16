<?php
require 'dbconfig.php';
function checkuser($fuid,$ffname,$femail){
    $check = mysql_query("select * from perfilusuario where fbId='$fuid'");
	
	$check = mysql_num_rows($check);
	
	if (empty($check)) { // if new user . Insert a new record		
		$query = "INSERT INTO perfilusuario (fbId,nome,email,permiteEnvioEmail,dataPerfil) VALUES ('$fuid','$ffname','$femail', true, now())";
		mysql_query($query);	
	} else {   // If Returned user . update the user record		
		$query = "UPDATE perfilusuario SET nome='$ffname', email='$femail', dataUltimoLogin = now() where fbId='$fuid'";
		mysql_query($query);
	}
}?>
