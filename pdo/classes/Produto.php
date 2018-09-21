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
    $query = "insert into produtos (nome, preco, quantidade, categoria_id) values ('" . $this->nome ."', " . $this->preco . ", " . $this->quantidade . ", " . $this->categoria_id .")";
    $conexao = Conexao::getConexao();
    $conexao->exec($query);
    }
}
