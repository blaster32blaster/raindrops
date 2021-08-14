<?php

require __DIR__.'/vendor/autoload.php';

use src\Main;

$queryString = $_GET['number'];
isset($queryString) ?
    Main::init($queryString)->process() :
    Main::init()->process();