<?php

class Piloto {
    
    protected $nome;
    protected $tipoLicenca;

    
    public function __construct($nome, $tipoLicenca) {
        $this->nome = $nome;
        $this->tipoLicenca = $tipoLicenca;
    }
   
public function pilotar() {
    return "O piloto {$this->nome} está pilotando.";
}

}
	

	