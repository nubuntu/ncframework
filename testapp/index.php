<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include("../ncframework.php");
  $testapp = new NUObject(array(
    'db'=>new NUObject(array(
      'driver'=>'mysql',
      'host'=>'localhost',
      'username'=>'root',
      'password'=>'root',
      'database'=>'nucrud'
    ))
  ));
  $app->run();
  $q = "select * from student";
  $app->db->setQuery($q);
  $rows = $app->db->getRows();
  print_r($rows)
?>