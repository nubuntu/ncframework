<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include("../app.php");
  $testapp = new NUObject(array(
    'db'=>new NUObject(array(
      'driver'=>'mysql',
      'host'=>'localhost',
      'username'=>'root',
      'password'=>'root',
      'database'=>'nucrud'
    ))
  ));
  $q = "select * from student where id=1";
  $testapp->db->setQuery($q);
  $rows = $testapp->db->getRow();
  print_r($rows);
?>