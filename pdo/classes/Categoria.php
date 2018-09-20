<?php

class Categoria {

    public $id;
    public $nome;

    public function listar() {
        $query = "SELECT id, nome FROM categorias";
        $conexao = new PDO('mysql:host=localhost;dbname=estoque', 'root', '');
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function inserir() {
      $query = "insert into categorias(nome) values ('" . $this->nome . "')";
      $conexao = new PDO('mysql:host=localhost;dbname=estoque', 'root', '');
      $conexao->exec($query);
    }
}
