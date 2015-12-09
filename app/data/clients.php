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
    ['name' => 'Mário', 'age' => 30, 'address' => [ 'address' => 'Av São João - São Paulo/SP','is_billing'=>1], 'cpf' => genCPF($baseCpf), 'rg' => genRG($baseRG, 'SP'), 'type' => 'Pessoa Física'],
    ['name' => 'Márcio', 'age' => 45, 'address' => ['address' =>  'Av Getúlio Vargas - São Paulo/SP','is_billing'=>1], 'cpf' => genCPF($baseCpf), 'rg' => genRG($baseRG, 'SP'), 'type' => 'Pessoa Física'],
    ['name' => 'João', 'age' => 20, 'address' => ['address' =>  'Av Presidente Vargas - Rio de Janeiro/RJ','is_billing'=>1], 'cpf' => genCPF($baseCpf), 'rg' => genRG($baseRG, 'RJ'), 'type' => 'Pessoa Física'],
    ['name' => 'Maria', 'age' => 25, 'address' => ['address' =>  'Av Getúlio Vargas - Juiz de Fora/MG','is_billing'=>1], 'cpf' => genCPF($baseCpf), 'rg' => genRG($baseRG, 'MG'), 'type' => 'Pessoa Física'],
    ['name' => 'Bárbara', 'age' => 38, 'address' => ['address' =>  'Av Barão do Rio Branco - Juiz de Fora/MG','is_billing'=>1], 'cpf' => genCPF($baseCpf), 'rg' => genRG($baseRG, 'MG'), 'type' => 'Pessoa Física'],
    ['name' => 'Rosa', 'age' => 26, 'address' => ['address' =>  'Av Beira Mar - Recife/PE','is_billing'=>1], 'cpf' => genCPF($baseCpf), 'rg' => genRG($baseRG, 'PE'), 'type' => 'Pessoa Física'],
    
    ['name' => 'Vale do Rio Doce', 'address' => [['address' => 'Av Presidente Vargas - Rio de Janeiro/RJ','is_billing'=>0], ['address' => 'Av Beira Mar - Recife/PE','is_billing'=>1]], 'cnpj' => genCPF($baseCpf), 'inscricao' => genRG($baseRG, 'RJ'), 'type' => 'Pessoa Jurídica'],
    ['name' => 'Petrobrás', 'address' => [['address' => 'Av Getúlio Vargas - Juiz de Fora/MG','is_billing'=>0], ['address' => 'Av Paulista - São Paulo/SP','is_billing'=>1]], 'cnpj' => genCPF($baseCpf), 'inscricao' => genRG($baseRG, 'MG'), 'type' => 'Pessoa Jurídica'],
    ['name' => 'OLX', 'address' => [['address' => 'Av Barão do Rio Branco - Juiz de Fora/MG','is_billing'=>0], ['address' => 'Av São João - São Paulo/SP','is_billing'=>1]], 'cnpj' => genCPF($baseCpf), 'inscricao' => genRG($baseRG, 'MG'), 'type' => 'Pessoa Jurídica'],
    ['name' => 'SUAPE', 'address' => [['address' => 'Av Beira Mar - Recife/PE','is_billing'=>0], ['address' => 'Av Barão do Rio Branco - Rio de Janeiro/RJ','is_billing'=>1]], 'cnpj' => genCPF($baseCpf), 'inscricao' => genRG($baseRG, 'PE'), 'type' => 'Pessoa Jurídica'],
];
