<?php
class Pessoa {
    public $nome;
    public $idade;
    public $diaNascimento;
    public $mesNascimento;
    public $anoNascimento;

    public function definirDataNascimento($dia, $mes, $ano) {
        $this->diaNascimento = $dia;
        $this->mesNascimento = $mes;
        $this->anoNascimento = $ano;
    }

    public function definirNome($nome) {
        $this->nome = $nome;
    }

    public function calcularIdade($diaAtual, $mesAtual, $anoAtual) {
        $this->idade = $anoAtual - $this->anoNascimento;

        if ($mesAtual < $this->mesNascimento || 
           ($mesAtual == $this->mesNascimento && $diaAtual < $this->diaNascimento)) {
            $this->idade--;
        }
    }

    public function obterIdade() {
        return $this->idade;
    }

    public function obterNome() {
        return $this->nome;
    }
}

$pessoa1 = new Pessoa( );
$pessoa1->definirNome("Ana");
$pessoa1->definirDataNascimento(12, 4, 1995);
$pessoa1->calcularIdade(10, 9, 2024); 

$pessoa2 = new Pessoa();
$pessoa2->definirNome("Pedro");
$pessoa2->definirDataNascimento(23, 8, 1988);
$pessoa2->calcularIdade(10, 9, 2024); 

echo "Nome: " . $pessoa1->obterNome() . " - Idade: " . $pessoa1->obterIdade() . " anos<br>";
echo "Nome: " . $pessoa2->obterNome() . " - Idade: " . $pessoa2->obterIdade() . " anos<br>";


