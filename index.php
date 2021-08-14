<?php

include_once './src/Main.php';

$queryString = $_GET['number'];
isset($queryString) ?
    Main::init($queryString)->process() :
    Main::init()->process();