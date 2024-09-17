<?php


class Objeto {
    public $largura;
    public $altura;

    public function __construct($largura, $altura) {
        $this->largura = $largura;
        $this->altura = $altura;
    }

    public function calculaArea() {
        return 0; 
    }
}


class Triangulo extends Objeto {
    public $tipo;

    public function __construct($largura, $altura, $tipo) {
        parent::__construct($largura, $altura); 
        $this->tipo = $tipo;
    }

    public function calculaArea() {
        return ($this->largura * $this->altura) / 2;
    }
}

class Retangulo extends Objeto {
    public function __construct($largura, $altura) {
        parent::__construct($largura, $altura); 
    }

    public function calculaArea() {
        return $this->largura * $this->altura;
    }

    public function ehQuadrado() {
        return $this->largura === $this->altura;
    }
}

$triangulo = new Triangulo(10, 5, "Equilátero");
echo "Área do Triângulo: " . $triangulo->calculaArea() . "<br>";
$retangulo = new Retangulo(8, 8);
echo "Área do Retângulo: " . $retangulo->calculaArea() . "<br>";


if ($retangulo->ehQuadrado()) {
    echo "O retângulo é na verdade um quadrado.<br>";
} else {
    echo "O retângulo não é um quadrado.<br>";
}

