<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

  protected function initRoutes() {
    $routes['index'] = array(
      'route' => '/',
      'controller' => 'indexController',
      'action' => 'index'
    );

    $routes['home'] = array(
      'route' => '/home',
      'controller' => 'indexController',
      'action' => 'home'
    );

    $routes['app'] = array(
      'route' => '/app',
      'controller' => 'indexController',
      'action' => 'app'
    );

    $this->setRoutes($routes);
  }
}


?>