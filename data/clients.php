<?php

if (!function_exists("genCPF")):

    function genCPF($base) {
        return $base + rand(600, 1200);
    }

endif;

if (!function_exists("genRG")):

    function genRG($base, $uf) {
        return $uf . '/' . ($base + rand(60, 120));
    }

endif;


$baseCpf = 123456789102;
$baseRG = 123000;
$clientsData = [
    ['nome' => 'Mário', 'idade' => 30, 'endereco' => 'Av São João - São Paulo/SP', 'cpf' => genCPF($baseCpf), 'rg' => genRG($baseRG, 'SP'), 'type' => 'Pessoa Física'],
    ['nome' => 'Márcio', 'idade' => 45, 'endereco' => 'Av Getúlio Vargas - São Paulo/SP', 'cpf' => genCPF($baseCpf), 'rg' => genRG($baseRG, 'SP'), 'type' => 'Pessoa Física'],
    ['nome' => 'João', 'idade' => 20, 'endereco' => 'Av Presidente Vargas - Rio de Janeiro/RJ', 'cpf' => genCPF($baseCpf), 'rg' => genRG($baseRG, 'RJ'), 'type' => 'Pessoa Física'],
    ['nome' => 'Maria', 'idade' => 25, 'endereco' => 'Av Getúlio Vargas - Juiz de Fora/MG', 'cpf' => genCPF($baseCpf), 'rg' => genRG($baseRG, 'MG'), 'type' => 'Pessoa Física'],
    ['nome' => 'Bárbara', 'idade' => 38, 'endereco' => 'Av Barão do Rio Branco - Juiz de Fora/MG', 'cpf' => genCPF($baseCpf), 'rg' => genRG($baseRG, 'MG'), 'type' => 'Pessoa Física'],
    ['nome' => 'Rosa', 'idade' => 26, 'endereco' => 'Av Beira Mar - Recife/PE', 'cpf' => genCPF($baseCpf), 'rg' => genRG($baseRG, 'PE'), 'type' => 'Pessoa Física'],
    ['nome' => 'Vale do Rio Doce', 'endereco' => ['localizadaEm' => 'Av Presidente Vargas - Rio de Janeiro/RJ', 'cobranca' => 'Av Beira Mar - Recife/PE'], 'cnpj' => genCPF($baseCpf), 'inscricao' => genRG($baseRG, 'RJ'), 'type' => 'Pessoa Jurídica'],
    ['nome' => 'Petrobrás', 'endereco' => ['localizadaEm' => 'Av Getúlio Vargas - Juiz de Fora/MG', 'cobranca' => 'Av Paulista - São Paulo/SP'], 'cnpj' => genCPF($baseCpf), 'inscricao' => genRG($baseRG, 'MG'), 'type' => 'Pessoa Jurídica'],
    ['nome' => 'OLX', 'endereco' => ['localizadaEm' => 'Av Barão do Rio Branco - Juiz de Fora/MG', 'cobranca' => 'Av São João - São Paulo/SP'], 'cnpj' => genCPF($baseCpf), 'inscricao' => genRG($baseRG, 'MG'), 'type' => 'Pessoa Jurídica'],
    ['nome' => 'SUAPE', 'endereco' => ['localizadaEm' => 'Av Beira Mar - Recife/PE', 'cobranca' => 'Av Barão do Rio Branco - Rio de Janeiro/RJ'], 'cnpj' => genCPF($baseCpf), 'inscricao' => genRG($baseRG, 'PE'), 'type' => 'Pessoa Jurídica'],
];

// Cria Objetos
$clients = [];
foreach ($clientsData as $key => $data) {
    $id = ['id' => ++$key];
    if ($data['type'] === 'Pessoa Física'):
        $clients[] = new PessoaFisica(array_merge($data, $id));
    else:
        $clients[] = new PessoaJuridica(array_merge($data, $id));
    endif;
}