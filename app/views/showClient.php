
<h1 class="h2" id="title">Cliente: <?= $client->nome; ?></h1> 
<hr/>

<ul class="list-unstyled list-group">
    <li class='list-group-item'><b>Id:</b>  <?= $client->id; ?></li>
    <li class='list-group-item'><b>Nome:</b>  <?= $client->nome; ?></li>
    <li class='list-group-item'><b>Classificação:</b>  <?= $client->getGrauDeImportancia(); ?></li>
    <li class='list-group-item'><b><?= $_GET['type'] === 'pf' ? 'CPF: ' : "CNPJ: "; ?></b>  <?= $_GET['type'] === 'pf' ? $client->cpf : $client->cnpj; ?></li>
    <li class='list-group-item'><b><?= $_GET['type'] === 'pf' ? 'RG: ' : "Inscrição Estadual: "; ?></b>  <?= $_GET['type'] === 'pf' ? $client->rg : $client->inscricao; ?></li>
    <li class='list-group-item'><b>Endereço de cobrança: </b><?=$client->getEnderecoDeCobranca()?>
    <li class='list-group-item'><b>Endereço: </b>  <?= $client->getEndereco(); ?></li>
</ul>
<a href="index.php?page=clients&order=<?= $_GET['order'] ?>" class="btn btn-primary">Lista de Clientes</a>