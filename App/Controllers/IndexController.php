<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action {

  public function index() {
    $this->render('index');
  }

  public function home() {
    $this->render('index', '');
  }

  public function app() {
    $venda = Container::getModel('Venda');
    $cliente = Container::getModel('Cliente');
    $contato = Container::getModel('Contato');
    $despesa = Container::getModel('Despesa');

    $competencia = explode('-', $_GET['competencia']);
    $ano = $competencia[0];
    $mes = $competencia[1];
  
    $dias_do_mes = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
    $data_inicio = $ano.'-'.$mes.'-01';
    $data_fim = $ano.'-'.$mes.'-'.$dias_do_mes;

    $dados = array();
    $dados['quantidadeVendas'] = $venda->getQuantidade($data_inicio, $data_fim);
    $dados['totalVendas'] = $venda->getTotal($data_inicio, $data_fim);
    $dados['clientesAtivos'] = $cliente->getQuantidade(1);
    $dados['clientesInativos'] = $cliente->getQuantidade(0);
    $dados['totalReclamacoes'] = $contato->getContatos(1);
    $dados['totalSugestoes'] = $contato->getContatos(2);
    $dados['totalElogios'] = $contato->getContatos(3);
    $dados['totalDespesas'] = $despesa->getTotalDespesas($data_inicio, $data_fim);

    echo json_encode($dados);
  }

}

?>