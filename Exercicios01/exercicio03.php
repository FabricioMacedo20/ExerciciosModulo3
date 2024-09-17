<?php


class Produto {
    public $nome;
    public $preco;
    public $quantidadeEstoque;

    public function __construct($nome, $preco, $quantidadeEstoque) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->quantidadeEstoque = $quantidadeEstoque;
    }

    public function temEstoque($quantidadeDesejada) {
        return $this->quantidadeEstoque >= $quantidadeDesejada;
    }

    public function atualizarEstoque($quantidadeVendida) {
        $this->quantidadeEstoque -= $quantidadeVendida;
    }
}

class ItemPedido {
    public $produto;
    public $quantidade;

    public function __construct($produto, $quantidade) {
        $this->produto = $produto;
        $this->quantidade = $quantidade;
    }

    public function calcularTotal() {
        return $this->produto->preco * $this->quantidade;
    }
}

class Pedido {
    public $itens = array();
    public $formaPagamento;

    public function adicionarItem($item) {
        if ($item->produto->temEstoque($item->quantidade)) {
            $this->itens[] = $item;

            $item->produto->atualizarEstoque($item->quantidade);
        } else {
            echo "Estoque insuficiente para o produto " . $item->produto->nome . "<br>";
        }
    }

     public function calcularTotalPedido() {
        $total = 0;
        foreach ($this->itens as $item) {
            $total += $item->calcularTotal();
        }
        return $total;
    }

    public function definirFormaPagamento($forma) {
        $this->formaPagamento = $forma;
    }

    public function exibirResumo() {
        foreach ($this->itens as $item) {
            echo $item->quantidade . "x " . $item->produto->nome . " - R$" . $item->calcularTotal() . "<br>";
        }
        echo "Total: R$" . $this->calcularTotalPedido() . "<br>";
        echo "Forma de pagamento: " . $this->formaPagamento . "<br>";
    }
}

$produto1 = new Produto("Arroz", 20.00, 100);
$produto2 = new Produto("Feijão", 7.50, 50);

$item1 = new ItemPedido($produto1, 2); // 2 pacotes de Arroz
$item2 = new ItemPedido($produto2, 3); // 3 pacotes de Feijão

$pedido = new Pedido();
$pedido->adicionarItem($item1);
$pedido->adicionarItem($item2);
$pedido->definirFormaPagamento("Cartão");
$pedido->exibirResumo();

