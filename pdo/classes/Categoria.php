<?php
  require_once('classes/Conexao.php');

class Categoria {

    public $id;
    public $nome;

    public function listar() {
        $query = "SELECT id, nome FROM categorias";
        $conexao = Conexao::getConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function inserir() {
      $query = "insert into categorias(nome) values ('" . $this->nome . "')";
      $conexao = Conexao::getConexao();
      $conexao->exec($query);
    }
}
