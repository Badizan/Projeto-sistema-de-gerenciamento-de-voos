<?php

require_once "./pessoa.php";

class Tripulante extends Pessoa {
    private $funcao;

    public function __construct($nome, $documento, $funcao) {
        parent::__construct($nome, $documento);
        $this->funcao = $funcao;
    }

    public function getTipoDocumento() {
        return "Identidade";
    }

    public function getDocumento() {
        return $this->documento;
    }

    
    public function getFuncao() {
        return $this->funcao;
    }
}






