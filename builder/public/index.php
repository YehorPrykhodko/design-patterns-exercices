<?php
require_once __DIR__ . '/../app/MySQLQueryBuilder.php';
require_once __DIR__ . '/../app/QueryBuilderInterface.php';

$builder = new MySQLQueryBuilder();
$query = $builder
    ->select(['name', 'email'])
    ->from('users')
    ->where('age > 18')
    ->getQuery();

echo $query;
