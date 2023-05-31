<?php

namespace APP\Models;

use MF\Model\Model;

class Contato extends Model {

  public function getContatos($tipo) {
    $query = '
      SELECT 
        count(*) as contato
      FROM 
        `contatos` 
      WHERE 
        `tipo` = ?
    ';
    $stmt = $this->db->prepare($query);
    $stmt->bindValue(1, $tipo);
    $stmt->execute();

    return $stmt->fetch(\PDO::FETCH_OBJ)->contato;
  }
}