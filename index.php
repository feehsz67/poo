<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Oficina</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

<?php
require_once 'Cliente.php';
require_once 'Carro.php';
require_once 'Produto.php';
require_once 'Servico.php';
// Cliente
$cliente = new Cliente();
$cliente->nome = "João Silva";
$cliente->cpf = "123.456.789-00";
$cliente->telefone = "(16) 99999-9999";
$cliente->email = "joao@email.com";
$cliente->endereco = "Rua das Flores";
$cliente->cidade = "Ribeirão Preto";
$cliente->estado = "SP";
$cliente->cep = "14000-000";
$cliente->dataNascimento = "10/05/1990";
$cliente->saldo = 0;

// Carro
$carro = new Carro();
$carro->marca = "Honda";
$carro->modelo = "Civic";
$carro->ano = 2022;
$carro->placa = "ABC-1234";
$carro->cor = "Prata";

// Produtos
$produto1 = new Produto();
$produto1->nome = "Filtro de óleo";
$produto1->codigo = "P001";
$produto1->marca = "Tecfil";
$produto1->categoria = "Filtro";
$produto1->preco = 45;
$produto1->quantidade = 1;
$produto1->fornecedor = "Auto Peças Brasil";
$produto1->garantia = "3 meses";
$produto1->estoque = 10;
$produto1->descricao = "Filtro para motor";

$produto2 = new Produto();
$produto2->nome = "Óleo do motor";
$produto2->codigo = "P002";
$produto2->marca = "Mobil";
$produto2->categoria = "Lubrificante";
$produto2->preco = 180;
$produto2->quantidade = 1;
$produto2->fornecedor = "Auto Peças Brasil";
$produto2->garantia = "Conforme fabricante";
$produto2->estoque = 20;
$produto2->descricao = "Óleo para motor";

// Serviços
$servico1 = new Servico();
$servico1->nome = "Troca de óleo";
$servico1->descricao = "Substituição do óleo";
$servico1->preco = 80;
$servico1->duracao = "30 minutos";
$servico1->mecanico = "Carlos";

$servico2 = new Servico();
$servico2->nome = "Revisão básica";
$servico2->descricao = "Verificação geral do veículo";
$servico2->preco = 150;
$servico2->duracao = "1 hora";
$servico2->mecanico = "Pedro";

// Listas para o cálculo
$produtos = [$produto1, $produto2];
$servicos = [$servico1, $servico2];

$total = calcularTotal($produtos, $servicos);
?>

<header>
    <h1>AutoTech</h1>
    <p>Sistema de gerenciamento de oficina mecânica</p>
</header>

<main>
    <section class="card">
        <h2>Dados do cliente</h2>
        <p><strong>Nome:</strong> <?= $cliente->nome ?></p>
        <p><strong>CPF:</strong> <?= $cliente->cpf ?></p>
        <p><strong>Telefone:</strong> <?= $cliente->telefone ?></p>
        <p><strong>E-mail:</strong> <?= $cliente->email ?></p>
        <p><strong>Endereço:</strong> <?= $cliente->endereco ?></p>
        <p><strong>Cidade:</strong> <?= $cliente->cidade ?> - <?= $cliente->estado ?></p>
        <p><strong>CEP:</strong> <?= $cliente->cep ?></p>
        <p><strong>Data de nascimento:</strong> <?= $cliente->dataNascimento ?></p>
    </section>

    <section class="card">
        <h2>Dados do veículo</h2>
        <p><strong>Marca:</strong> <?= $carro->marca ?></p>
        <p><strong>Modelo:</strong> <?= $carro->modelo ?></p>
        <p><strong>Ano:</strong> <?= $carro->ano ?></p>
        <p><strong>Placa:</strong> <?= $carro->placa ?></p>
        <p><strong>Cor:</strong> <?= $carro->cor ?></p>
    </section>

    <section class="card">
        <h2>Peças utilizadas</h2>

        <?php foreach ($produtos as $produto) { ?>
            <div class="item">
                <h3><?= $produto->nome ?></h3>
                <p>Código: <?= $produto->codigo ?></p>
                <p>Marca: <?= $produto->marca ?></p>
                <p>Categoria: <?= $produto->categoria ?></p>
                <p>Quantidade: <?= $produto->quantidade ?></p>
                <p>Fornecedor: <?= $produto->fornecedor ?></p>
                <p>Garantia: <?= $produto->garantia ?></p>
                <p>Estoque: <?= $produto->estoque ?></p>
                <p>Descrição: <?= $produto->descricao ?></p>
                <p>Preço unitário:
                    R$ <?= number_format($produto->preco, 2, ',', '.') ?>
                </p>
                <p><strong>Subtotal:
                    R$ <?= number_format(
                        $produto->preco * $produto->quantidade,
                        2, ',', '.'
                    ) ?></strong></p>
            </div>
        <?php } ?>
    </section>

    <section class="card">
        <h2>Serviços realizados</h2>

        <?php foreach ($servicos as $servico) { ?>
            <div class="item">
                <h3><?= $servico->nome ?></h3>
                <p>Descrição: <?= $servico->descricao ?></p>
                <p>Duração: <?= $servico->duracao ?></p>
                <p>Mecânico: <?= $servico->mecanico ?></p>
                <p><strong>Valor:
                    R$ <?= number_format($servico->preco, 2, ',', '.') ?>
                </strong></p>
            </div>
        <?php } ?>
    </section>

    <section class="total">
        <h2>Valor total da oficina</h2>
        <p>R$ <?= number_format($total, 2, ',', '.') ?></p>
    </section>
</main>

<footer>
    <p>AutoTech - Sistema de Oficina Mecânica</p>
</footer>

</body>
</html>
