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
  $q = "update student set name='noer' where id=1";
  $app->db->setQuery($q);
  echo $app->db->query();
?>