
<?php

class Cliente {
    public $nome;
    public $cpf;
    public $telefone;
    public $email;
    public $endereco;
    public $cidade;
    public $estado;
    public $cep;
    public $dataNascimento;
    public $saldo;

    public function confirmarrecebimento() {
        echo "<p>Pagamento recebido!</p>";
    }

    public function pagarconta($valor, $juros) {
        if ($juros > 0) {
            $valor = $valor + ($valor * ($juros / 100));
        }

        echo "Valor a pagar: R$ " . number_format($valor, 2, ',', '.');
        echo "<p>Conta paga!</p>";
    }
}
