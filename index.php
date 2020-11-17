<?php
date_default_timezone_set('Europe/Moscow');

$getDate = new class {
    function __construct($dateform = 'j/m/y H:i') {
        $this->dateform = $dateform;
    }
    function nowD() {
        return date($this->dateform);
    }
};

$date = $getDate->nowD();

if (isset($_GET['print']) && isset($_GET['public'])) {
  header('Access-Control-Allow-Origin: *');
    header('Content-Type: text/plain; charset=utf-8');
    header('Access-Control-Allow-Methods: GET, POST, DELETE');
    echo file_get_contents(basename(__FILE__));
} else if (isset($_GET['print'])) {
    header('Content-type: text/plain; charset=utf-8');
    echo file_get_contents(basename(__FILE__));
} else {
    echo "<h1>" . $getDate->nowD() . "</h1>";
}
?>