<?php

require_once "./Pessoa.php";

class Passageiro extends Pessoa {
    private $bilhete;
    private $passagemComprada = false;
    private $checkInRealizado = false;
    private $bagagens = [];


    public function __construct($nome, $documento, $bilhete) {
        parent::__construct($nome, $documento);
        $this->bilhete = $bilhete;
    }

    public function getTipoDocumento() {
        return "Passaporte";
    }

    public function getDocumento() {
        return $this->documento;
    }

    public function getBilhete() {
        return $this->bilhete;
    }

    public function comprarPassagem() {
        $this->passagemComprada = true;
        echo "Passagem comprada para {$this->getNome()}\n";
    }

    public function realizarCheckIn() {
        $this->checkInRealizado = true;
        echo "{$this->getNome()} realizou o check-in\n";
    }
    public function adicionarBagagem(Bagagem $bagagem) {
        $this->bagagens[] = $bagagem;
    }

    public function getBagagens() {
        return $this->bagagens;
    }
}



