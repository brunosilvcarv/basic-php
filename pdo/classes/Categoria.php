<?php

class Categoria {

    public $id;
    public $nome;

    public function __construct($id = false) {
      if($id) {
        $this->id = $id;
        $this->carregar();
      }
    }

    public function listar() {
        //throw new Exception('Erro ao listar categorias.');
        $query = "SELECT id, nome FROM categorias";
        $conexao = Conexao::getConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function carregar() {
      //throw new Exception('Erro ao listar categorias.');
      $query = "select id, nome from categorias where id =" . $this->id;
      $conexao = Conexao::getConexao();
      // exec()   ----> inserts, updates e deletes
      // query()  ----> selects
      $resultado = $conexao->query($query);
      $lista = $resultado->fetchAll();
      foreach ($lista as $linha) {
        $this->nome = $linha['nome'];
      }
    }

    public function inserir() {
      $query = "insert into categorias(nome) values ('" . $this->nome . "')";
      $conexao = Conexao::getConexao();
      $conexao->exec($query);
    }

    public function atualizar() {
      $query = "update categorias set nome = '" . $this->nome . "' where id = " . $this->id;
      $conexao = Conexao::getConexao();
      $conexao->exec($query);
    }

    public function excluir() {
      $query = "delete from categorias where id =" . $this->id;
      $conexao = Conexao::getConexao();
      $conexao->exec($query);
    }
}
