<?php require_once('global.php'); ?>

<?php
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    /*
    echo $id;
    echo '<br>';
    echo $nome;
    */
    $categoria = new Categoria($id);
    $categoria->nome = $nome;

    $categoria->atualizar();

    header('Location: categorias.php');
