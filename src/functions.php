<?php

require 'dbconfig.php';
require './requestDTO.php';

function checkuser($fuid, $ffname, $femail) {
    $result = mysql_query("select * from perfilusuario where fbId='$fuid'");

    $check = mysql_num_rows($result);

    if (empty($check)) { // if new user . Insert a new record		
        $query = "INSERT INTO perfilusuario (fbId,nome,email,permiteEnvioEmail,dataPerfil) VALUES ('$fuid','$ffname','$femail', true, now())";
        mysql_query($query);
    } else {   // If Returned user . update the user record		
        $query = "UPDATE perfilusuario SET nome='$ffname', email='$femail', dataUltimoLogin = now() where fbId='$fuid'";
        mysql_query($query);
    }
}

function listLocal() {

    $result = mysql_query("select id, nome from local");

    if (!$result) {
        echo 'Não foi possível executar a consulta: ' . mysql_error();
        exit;
    }
    $requests = array();

    while ($row = mysql_fetch_array($result)) {
        $requests[$row["id"]] = mb_convert_encoding($row["nome"], "UTF-8");
    }

    return $requests;
}

function listTipoSanguineo() {

    $result = mysql_query("select id, tiposanguineo from tiposanguineo");

    if (!$result) {
        echo 'Não foi possível executar a consulta: ' . mysql_error();
        exit;
    }
    $requests = array();

    while ($row = mysql_fetch_array($result)) {
        $requests[$row["id"]] = mb_convert_encoding($row["tiposanguineo"], "UTF-8");
    }

    return $requests;
}

function getPerfilUsuarioByFBId($fbId) {
    $result = mysql_query("select id from perfilusuario where fbid = " . mysql_real_escape_string($fbId));

    if (!$result) {
        echo 'Não foi possível executar a consulta: ' . mysql_error();
        exit;
    }
    $row = mysql_fetch_row($result);

    return $row[0];
}

function addRequest($nomePaciente, $mensagem, $localId, $perfilusuarioId, $tipoSanguineoId) {

    $query = "INSERT INTO solicitacao (nome_paciente, mensagem, fk_local, fk_perfilusuario, fk_tiposanguineo) values ('$nomePaciente', '$mensagem', $localId, $perfilusuarioId, $tipoSanguineoId);";

    $result = mysql_query($query);

    if (!$result) {
        echo "<h3>SQL: $query </h3>";
        echo 'Não foi possível executar a consulta: ' . mysql_error();
        exit;
    }


    return mysql_insert_id();
}

function getRequestById($id) {

    $result = mysql_query("select id, fk_perfilusuario, nome_paciente, mensagem, fk_local, fk_tiposanguineo from solicitacao where id = $id");

    if (!$result) {
        echo 'Não foi possível executar a consulta: ' . mysql_error();
        exit;
    }


    while ($row = mysql_fetch_array($result)) {
        $requestDTO = new RequestDTO();

        $requestDTO->setId($row["id"]);
        $requestDTO->setFk_local($row["fk_local"]);
        $requestDTO->setFk_perfilusuario($row["fk_perfilusuario"]);
        $requestDTO->setFk_tiposanguineo($row["fk_tiposanguineo"]);
        $requestDTO->setMensagem(mb_convert_encoding($row["mensagem"], "UTF-8"));
        $requestDTO->setNome_paciente(mb_convert_encoding($row["nome_paciente"], "UTF-8"));


        return $requestDTO;
    }

    return new RequestDTO();
}
