<?php


class Universidade {
    public $nome;

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function obterNomeUniversidade() {
        return $this->nome;
    }
}


class Pessoa {
    public $nome;
    public $universidade;

    public function __construct($nome, $universidade) {
        $this->nome = $nome;
        $this->universidade = $universidade;
    }

    public function informarUniversidade() {
        return $this->nome . " trabalha na universidade " . $this->universidade->obterNomeUniversidade();
    }
}

$universidade1 = new Universidade("Universidade de São Paulo");
$universidade2 = new Universidade("Universidade Federal do Rio de Janeiro");

$pessoa1 = new Pessoa("Carlos", $universidade1);
$pessoa2 = new Pessoa("Ana", $universidade2);
echo $pessoa1->informarUniversidade() . "<br>";
echo $pessoa2->informarUniversidade() . "<br>";

