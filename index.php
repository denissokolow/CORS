<?php
  $router->get('/', function () use ($router) {
    date_default_timezone_set('Europe/Moscow');
      $getDate = new class { function __construct($format = 'j/m/y H:i') {
        $this->format = $format;
      }
      function getD() {
        return date($this->format);
      }
    };
      
    $date = $getDate->getD();
      
    echo $date;
      
  });
  $router->get('/print', function () use ($router) {
    header('Content-type: text/plain; charset=utf-8');
    echo file_get_contents(__FILE__);
  });
    $router->get('/print&public', function () use ($router) {
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: text/plain; charset=utf-8');
    header('Access-Control-Allow-Methods: GET, POST, DELETE');
    header('Content-type: text/plain; charset=utf-8');
    echo file_get_contents(__FILE__);
  });