<?php

namespace APP\Models;

use MF\Model\Model;

class Despesa extends Model {

  public function getTotalDespesas($data_inicio, $data_fim) {
    $query = '
      SELECT 
        COALESCE(SUM(valor), 0) as total_despesas
      FROM 
        `despesas` 
      WHERE 
        data between ? and ?
    ';
    $stmt = $this->db->prepare($query);
    $stmt->bindValue(1, $data_inicio);
    $stmt->bindValue(2, $data_fim);
    $stmt->execute();

    return $stmt->fetch(\PDO::FETCH_OBJ)->total_despesas;
  }

}