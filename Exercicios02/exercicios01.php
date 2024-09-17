<?php



class Funcionario {
    public $id;
    public $nome;
    public $cargo;

    
    public function __construct($id, $nome, $cargo) {
        $this->id = $id;
        $this->nome = $nome;
        $this->cargo = $cargo;
    }
   
    public function calculaSalario() {
        return 2000;
    }
  
    public function exibirInformacoes() {
        echo "ID: " . $this->id . ", Nome: " . $this->nome . ", Cargo: " . $this->cargo . ", Salário: R$" . $this->calculaSalario() . "<br>";
    }
}


class Gerente extends Funcionario {
    public $quantidadeDeColaboradores;


    public function __construct($id, $nome, $cargo, $quantidadeDeColaboradores) {
       
        parent::__construct($id, $nome, $cargo);
        $this->quantidadeDeColaboradores = $quantidadeDeColaboradores;
    }

 
    public function calculaSalario() {
        return 5000 + (100 * $this->quantidadeDeColaboradores);
    }
}

$funcionario1 = new Funcionario(1, "João", "Vendedor");
$gerente1 = new Gerente(2, "Maria", "Gerente", 10);

$funcionario1->exibirInformacoes();
$gerente1->exibirInformacoes();

