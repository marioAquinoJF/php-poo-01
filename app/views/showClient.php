
<h1 class="h2" id="title">Cliente: <?= $client->getClient()->name; ?></h1> 
<hr/>

<ul class="list-unstyled list-group">
    <li class='list-group-item'><b>Id:</b>  <?= $client->client_id; ?></li>
    <li class='list-group-item'><b>Nome:</b>  <?= $client->getClient()->name; ?></li>
    <li class='list-group-item'><b>Classificação:</b>  <?= $client->getGrauDeImportancia(); ?></li>
    <li class='list-group-item'><b><?= ($client->getClient()->type == 0 ? 'CPF: ' : "CNPJ: "); ?></b>  <?= $client->getClient()->type == 0 ? $client->cpf : $client->cnpj; ?></li>
    <li class='list-group-item'><b><?= $client->getClient()->type == 0 ? 'RG: ' : "Inscrição Estadual: "; ?></b>  <?= $client->getClient()->type == 0 ? $client->rg : $client->inscricao; ?></li>
    <li class='list-group-item'><b>Endereço de cobrança: </b><?=$client->getBilling()->address; ?>
    <li class='list-group-item'><b>Endereço: </b>  <?= $client->getAddress()->address; ?></li>
</ul>
<a href="index.php?page=clients&order=<?= $_GET['order'] ?>" class="btn btn-primary">Lista de Clientes</a>