<?php

require_once "./pessoa.php"; 
require_once "./Passageiro.php";
require_once "./Tripulante.php";
require_once "./Aeronave.php";
require_once "./voo.php";
require_once "./mala.php";
require_once "./bagagem.php";

class Voo {
    private $aeroportoOrigem;
    private $aeroportoDestino;
    private $escalas;
    private $aeronave;
    private $passageiros = [];
    private $tripulacao = [];

    public function __construct($aeroportoOrigem, $aeroportoDestino, $aeronave) {
        $this->aeroportoOrigem = $aeroportoOrigem;
        $this->aeroportoDestino = $aeroportoDestino;
        $this->aeronave = $aeronave;
    }

    public function adicionarPassageiro(Passageiro $passageiro) {
        $this->passageiros[] = $passageiro;
    }

    public function adicionarTripulante(Tripulante $tripulante) {
        $this->tripulacao[] = $tripulante;
    }

    public function getPassageiros() {
        return $this->passageiros;
    }

    public function getTripulacao() {
        return $this->tripulacao;
    }
    public function getAeronave() {
        return $this->aeronave;
    }
    public function adicionarEscala($aeroporto) {
        $this->escalas[] = $aeroporto;
    }

    public function removerEscala($aeroporto) {
        $index = array_search($aeroporto, $this->escalas);
        if ($index !== false) {
            unset($this->escalas[$index]);
        }
    }
    public function verificarPassageiroNoVoo($nomePassageiro) {
        foreach ($this->passageiros as $passageiro) {
            if ($passageiro->getNome() === $nomePassageiro) {
                return true;
            }
        }
        return false;
    }

    public function verificarTripulanteNoVoo($nomeTripulante) {
        foreach ($this->tripulacao as $tripulante) {
            if ($tripulante->getNome() === $nomeTripulante) {
                return true;
            }
        }
        return false;
    }
    public function adicionaEscala($aeroportoEscala) {
        $this->escalas[] = $aeroportoEscala;
    }

    public function getEscalas() {
        return $this->escalas;
    }
}

$aeronave = new Aeronave("Boeing 737", 150);

$voo = new Voo("GRU", "JFK", $aeronave);

$voo->adicionarEscala("Aeroporto C");
$voo->adicionarEscala("Aeroporto D");

echo "Escalas do voo:\n";
foreach ($voo->getEscalas() as $escala) {
    echo "- $escala\n";
}

echo PHP_EOL;

echo "Aeronave do voo: {$voo->getAeronave()->getModelo()}\n";


function calcularTempoDeVoo($distancia, $velocidadeMedia) {
    $tempoEmHoras = $distancia / $velocidadeMedia;
    $horas = floor($tempoEmHoras);
    $minutos = ($tempoEmHoras - $horas) * 60;
    return sprintf("%02d:%02d", $horas, $minutos);
}

$tempoDeVoo = calcularTempoDeVoo(1000, 500);
echo "Tempo de voo: $tempoDeVoo \n\n";


$passageiro1 = new Passageiro("João", "123456789", "ABC123");
$passageiro2 = new Passageiro("Maria", "987654321", "DEF456");

$tripulante1 = new Tripulante("Carlos", "111222333", "Comissário");
$tripulante2 = new Tripulante("Ana", "444555666", "Piloto");

$voo->adicionarPassageiro($passageiro1);
$voo->adicionarPassageiro($passageiro2);
$voo->adicionarTripulante($tripulante1);
$voo->adicionarTripulante($tripulante2);

echo PHP_EOL;

$bagagem1 = new Bagagem(20); 
$bagagem2 = new Bagagem(15); 

$passageiro1->adicionarBagagem($bagagem1);
$passageiro1->adicionarBagagem($bagagem2);
$passageiro2->adicionarBagagem($bagagem1);
$passageiro2->adicionarBagagem($bagagem2);


echo "Bagagens do passageiro {$passageiro1->getNome()}:\n";
foreach ($passageiro1->getBagagens() as $bagagem) {
    echo "- Conteúdo: {$bagagem->getConteudo()}, Peso: {$bagagem->getPeso()} kg\n";
}

echo PHP_EOL;

echo "Bagagens do passageiro {$passageiro2->getNome()}:\n";
foreach ($passageiro2->getBagagens() as $bagagem) {
    echo "- Conteúdo: {$bagagem->getConteudo()}, Peso: {$bagagem->getPeso()} kg\n";
}

echo PHP_EOL;

echo "Passageiros no voo:\n";
foreach ($voo->getPassageiros() as $passageiro) {
    echo "- {$passageiro->getNome()} ({$passageiro->getTipoDocumento()}: {$passageiro->getDocumento()}, Bilhete: {$passageiro->getBilhete()})\n";
}

echo "\nTripulação do voo:\n";
foreach ($voo->getTripulacao() as $tripulante) {
    echo "- {$tripulante->getNome()} ({$tripulante->getTipoDocumento()}: {$tripulante->getDocumento()}, Função: {$tripulante->getFuncao()})\n";
}


echo PHP_EOL;

$passageiro1->comprarPassagem();
$passageiro1->realizarCheckIn();

echo PHP_EOL;

$passageiro2->comprarPassagem();
$passageiro2->realizarCheckIn();

echo PHP_EOL;



if ($voo->verificarPassageiroNoVoo("João")) {
    echo "João está no voo.\n";
} else {
    echo "João não está no voo.\n";
}

echo PHP_EOL;

if ($voo->verificarPassageiroNoVoo("maria")) {
    echo " maria está no voo.\n";
} else {
    echo "Maria não está no voo.\n";
}

echo PHP_EOL;

if ($voo->verificarTripulanteNoVoo("carlos")) {
    echo "carlos está no voo.\n";
} else {
    echo "carlos não está no voo.\n";
}

echo PHP_EOL;

if ($voo->verificarTripulanteNoVoo("Ana")) {
    echo "Ana está no voo.\n";
} else {
    echo "Ana não está no voo.\n";
}
?>