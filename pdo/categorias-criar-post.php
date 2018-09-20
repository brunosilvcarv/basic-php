<?php
  require_once('classes/Categoria.php');

      $categoria = new Categoria();
      $nome = $_POST['nome'];
      $categoria->nome = $nome;
      $categoria->inserir();
      //redireciona
      header('Location: categorias.php');
