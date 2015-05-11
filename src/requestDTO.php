<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of requestDTO
 *
 * @author Jackson
 */
class RequestDTO {

    private $id;
    private $fk_perfilusuario;
    private $nome_paciente;
    private $mensagem;
    private $fk_local;
    private $fk_tiposanguineo;
    
    function getId() {
        return $this->id;
    }

    function getFk_perfilusuario() {
        return $this->fk_perfilusuario;
    }

    function getNome_paciente() {
        return $this->nome_paciente;
    }

    function getMensagem() {
        return $this->mensagem;
    }

    function getFk_local() {
        return $this->fk_local;
    }

    function getFk_tiposanguineo() {
        return $this->fk_tiposanguineo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFk_perfilusuario($fk_perfilusuario) {
        $this->fk_perfilusuario = $fk_perfilusuario;
    }

    function setNome_paciente($nome_paciente) {
        $this->nome_paciente = $nome_paciente;
    }

    function setMensagem($mensagem) {
        $this->mensagem = $mensagem;
    }

    function setFk_local($fk_local) {
        $this->fk_local = $fk_local;
    }

    function setFk_tiposanguineo($fk_tiposanguineo) {
        $this->fk_tiposanguineo = $fk_tiposanguineo;
    }



}
