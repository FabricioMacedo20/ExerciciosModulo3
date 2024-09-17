<?php



class Pessoa {
    public $nome;
    public $endereco;
    public $email;
    public $telefone;

    public function __construct($nome, $endereco, $email, $telefone) {
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->email = $email;
        $this->telefone = $telefone;
    }

    public function obterNome() {
        return $this->nome;
    }
}

class Livro {
    public $nome;
    public $autor;
    public $numPaginas;
    public $disponivel = true; 
    public $pessoaAlugou = null; 

  
    public function __construct($nome, $autor, $numPaginas) {
        $this->nome = $nome;
        $this->autor = $autor;
        $this->numPaginas = $numPaginas;
    }

   
    public function alugarLivro($pessoa) {
        if ($this->disponivel) {
            $this->disponivel = false; 
            $this->pessoaAlugou = $pessoa; 
            echo $pessoa->obterNome() . " alugou o livro '" . $this->nome . "'.<br>";
        } else {
            echo "O livro '" . $this->nome . "' já está alugado por " . $this->pessoaAlugou->obterNome() . ".<br>";
        }
    }

    //devolver o livro
    public function devolverLivro() {
        if (!$this->disponivel) {
            echo "O livro '" . $this->nome . "' foi devolvido por " . $this->pessoaAlugou->obterNome() . ".<br>";
            $this->disponivel = true; 
            unset($this->pessoaAlugou); 
        } else {
            echo "O livro '" . $this->nome . "' já está disponível na biblioteca.<br>";
        }
    }
}


$pessoa1 = new Pessoa("bruno", "Rua A, 153", "bruno@email.com", "1234-5678");
$pessoa2 = new Pessoa("eduarda", "Rua B, 458", "eduarda@email.com", "9876-5432");

$livro1 = new Livro("Dom Quixote", "Miguel de Cervantes", 500);
$livro2 = new Livro("1984", "George Orwell", 328);


$livro1->alugarLivro($pessoa1);
$livro2->alugarLivro($pessoa2); 
$livro1->alugarLivro($pessoa2); 

$livro1->devolverLivro(); 
$livro2->devolverLivro(); 
$livro1->devolverLivro(); 

