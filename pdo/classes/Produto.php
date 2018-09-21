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

  public static function listar() {
    $query = "select p.id, p.nome, preco, quantidade, categoria_id, c.nome as categoria_nome
              from produtos p
              inner join categorias c on p.categoria_id = c.id order by p.nome";
    $conexao = Conexao::getConexao();
    $resultado = $conexao->query($query); // retorna um PDO statement
    $lista = $resultado->fetchAll(); //pega o retorno do PDO statement
    return $lista;
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
}
