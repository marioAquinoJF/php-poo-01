<h1 class="h2" id="title" >Lista de Clientes</h1>
<hr/>
<div class="btn btn-default btn-sm <?= ($order === 'asc' ? 'active' : ''); ?>"><a href='index.php?page=clients&order=asc'>Ordem Ascendente</a></div>
<div class="btn btn-default btn-sm <?= ($order === 'desc' ? 'active' : ''); ?>"><a href='index.php?page=clients&order=desc'>Ordem Descendente</a></div>
<hr/>
<div class="list-unstyled list-group">
    <?php
    $ths = "<div class='list-group-item rows'><span><b>ID</b></span>"
            . "<span> <b>Nome</b></span>"
            . "<span> <b>Tipo</b></span></div>";
    foreach ($clients as $client) :
        $type = !$client->type ? 'Pessoa Fisica' : 'Pessoa Jurídica';
        $ths .= "<a class='list-group-item rows' href='index.php?page=showClient&id={$client->id}&order={$_GET['order']}&type={$client->type}'>"
                . "<span>{$client->id}</span>"
                . "<span>{$client->name}</span>"
                . "<span>{$type}</span></a>";
    endforeach;
    echo $ths;
    ?>

</div>
