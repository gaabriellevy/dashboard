<?php

namespace APP\Models;

use MF\Model\Model;

class Venda extends Model {
  private $quantidade;
  private $valor;

  public function getQuantidade($data_inicio, $data_fim) {
    $query = '
      SELECT 
        count(*) as quantidade_vendas 
      FROM 
        tb_vendas 
      WHERE
        data between ? and ?
    ';
    $stmt = $this->db->prepare($query);
    $stmt->bindValue(1, $data_inicio);
    $stmt->bindValue(2, $data_fim);
    $stmt->execute();

    return $stmt->fetch(\PDO::FETCH_OBJ)->quantidade_vendas;
  }

  public function getTotal($data_inicio, $data_fim) {
    $query = '
      SELECT 
        COALESCE(SUM(valor), 0) as total_vendas
      FROM 
        tb_vendas 
      WHERE
        data between ? and ?
      ';
    $stmt = $this->db->prepare($query);
    $stmt->bindValue(1, $data_inicio);
    $stmt->bindValue(2, $data_fim);
    $stmt->execute();

    return $stmt->fetch(\PDO::FETCH_OBJ)->total_vendas;
  }




}