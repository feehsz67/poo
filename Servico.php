<?php

class Servico {
    public $nome;
    public $descricao;
    public $preco;
    public $duracao;
    public $mecanico;
}

function calcularTotal($produtos, $servicos) {
    $total = 0;

    foreach ($produtos as $produto) {
        $total += $produto->preco * $produto->quantidade;
    }

    foreach ($servicos as $servico) {
        $total += $servico->preco;
    }

    return $total;
}
