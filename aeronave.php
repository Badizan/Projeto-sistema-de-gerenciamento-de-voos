<?php

class Aeronave {
    private $modelo;
    private $capacidade;

    public function __construct($modelo, $capacidade) {
        $this->modelo = $modelo;
        $this->capacidade = $capacidade;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function getCapacidade() {
        return $this->capacidade;
    }
}

