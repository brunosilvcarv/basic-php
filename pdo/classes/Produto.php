<?php

/**
 *
 */
class Produto {
  public $id;
  public $nome;
  public $preco;
  public $quantidade;
  public $categoria_id;

  public function __construct($id = false) {
    if ($id) {
      $this->id = $id;
      $this->carregar();
    }
  }

  public function carregar() {
    $query = "select nome, preco, quantidade, categoria_id from produtos where id = :id";
    $conexao = Conexao::getConexao();
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(':id', $this->id);
    $stmt->execute();
    $linha = $stmt->fetch();
    $this->nome = $linha['nome'];
    $this->preco = $linha['preco'];
    $this->quantidade = $linha['quantidade'];
    $this->categoria_id = $linha['categoria_id'];
  }

  public static function listar() {
    $query = "select p.id, p.nome, preco, quantidade, categoria_id, c.nome as categoria_nome
              from produtos p
              inner join categorias c on p.categoria_id = c.id order by p.nome";
    $conexao = Conexao::getConexao();
    $resultado = $conexao->query($query); // retorna um PDO statement
    $lista = $resultado->fetchAll(); //pega o retorno do PDO statement
    return $lista;
  }

  public static function listarPorCategoria($categoria_id) {
     $query = "select id, nome, preco, quantidade from produtos where categoria_id = :categoria_id";
     $conexao = Conexao::getConexao();
     $stmt = $conexao->prepare($query);
     $stmt->bindValue(':categoria_id', $categoria_id);
     $stmt->execute();
     //como ele retornará mais de uma linha...
     return $stmt->fetchAll();
  }

  public function inserir() {
    $query = "insert into produtos (nome, preco, quantidade, categoria_id) values (:nome, :preco, :quantidade, :categoria_id)";
    $conexao = Conexao::getConexao();
    $stmt = $conexao->prepare($query); // retorna o statement preparado para execução(não executado), diferente do exec();
    $stmt->bindValue(':nome', $this->nome);
    $stmt->bindValue(':preco', $this->preco);
    $stmt->bindValue(':quantidade', $this->quantidade);
    $stmt->bindValue(':categoria_id', $this->categoria_id);
    //executa o Statement
    $stmt->execute();
  }

  public function atualizar() {
    $query = "update produtos set nome =  :nome, preco = :preco, quantidade = :quantidade, categoria_id = :categoria_id
          	  where id = :id";
    $conexao = Conexao::getConexao();
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(':nome', $this->nome);
    $stmt->bindValue(':preco', $this->preco);
    $stmt->bindValue(':quantidade', $this->quantidade);
    $stmt->bindValue(':categoria_id', $this->categoria_id);
    $stmt->bindValue(':id', $this->id);
    $stmt->execute();
  }

  public function excluir() {
    $query = "delete from produtos where id = :id";
    $conexao = Conexao::getConexao();
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(':id', $this->id);
    $stmt->execute();
  }
}
