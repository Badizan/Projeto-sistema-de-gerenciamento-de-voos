<?php

class Mala {
    private $peso;
    private $conteudo;

    public function __construct($peso, $conteudo) {
        $this->peso = $peso;
        $this->conteudo = $conteudo;
    }

    public function getPeso() {
        return $this->peso;
    }

    public function getConteudo() {
        return $this->conteudo;
    }
}