<?php
  require_once('global.php');
  
      try{
        $categoria = new Categoria();
        $nome = $_POST['nome'];
        $categoria->nome = $nome;
        $categoria->inserir();
        //redireciona
        header('Location: categorias.php');
      } catch(Exception $ex) {
        Erro::trataErro($ex);
      }
