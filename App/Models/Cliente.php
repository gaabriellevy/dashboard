<?php

namespace APP\Models;

use MF\Model\Model;

class Cliente extends Model {

  public function getQuantidade($ativo) {
    $query = '
      SELECT
        count(*) as clientes_ativos
      FROM
        `clientes`
      WHERE
        `ativo` = ?
    ';
    $stmt = $this->db->prepare($query);
    $stmt->bindValue(1, $ativo);
    $stmt->execute();

    return $stmt->fetch(\PDO::FETCH_ASSOC)['clientes_ativos'];
  }
}