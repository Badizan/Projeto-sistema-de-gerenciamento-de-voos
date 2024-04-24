<?php

abstract class Pessoa {
    protected $nome;
    protected $documento;
   

    public function __construct($nome, $documento) {
        $this->nome = $nome;
        $this->documento = $documento;
    }

    public function getNome() {
        return $this->nome;
    }

    abstract public function getTipoDocumento();
}

