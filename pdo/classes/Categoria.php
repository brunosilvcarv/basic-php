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

    public static function listar() {
        //throw new Exception('Erro ao listar categorias.');
        $query = "SELECT id, nome FROM categorias order by nome";
        $conexao = Conexao::getConexao();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function carregar() {
      //throw new Exception('Erro ao listar categorias.');
      $query = "select id, nome from categorias where id = :id";
      $conexao = Conexao::getConexao();
      // exec()   ----> inserts, updates e deletes
      // query()  ----> selects
      $stmt = $conexao->prepare($query);
      $stmt->bindValue(':id', $this->id);
      $stmt->execute();
      $linha = $stmt->fetch();
      $this->nome = $linha['nome'];
    }

    public function inserir() {
      $query = "insert into categorias(nome) values (:nome)";
      $conexao = Conexao::getConexao();
      $stmt = $conexao->prepare($query);
      $stmt->bindValue(':nome', $this->nome);
      $stmt->execute();
    }

    public function atualizar() {
      $query = "update categorias set nome = :nome where id = :id";
      $conexao = Conexao::getConexao();
      $stmt = $conexao->prepare($query);
      $stmt->bindValue(':nome', $this->nome);
      $stmt->bindValue(':id', $this->id);
      $stmt->execute();
      }

    public function excluir() {
      $query = "delete from categorias where id = :id";
      $conexao = Conexao::getConexao();
      $stmt = $conexao->prepare($query);
      $stmt->bindValue(':id', $this->id);
      $stmt->execute();
    }
}
