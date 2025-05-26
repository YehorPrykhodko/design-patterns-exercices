<?php

require_once __DIR__ . '/../app/Config.php';

$config = Config::getInstance();

echo $config->get('app_name'); 
