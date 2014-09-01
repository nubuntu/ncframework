<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include("../ncframework.php");
  $testapp = new NUObject(array(
    'database'=>new NUObject(array(
      'driver'=>'mysql',
      'host'=>'localhost',
      'username'=>'root',
      'password'=>'root',
      'dbname'=>'nucrud'
    ))
  ));
  $app->run();
  $q = "select name from student where id=200000";
  $app->db->setQuery($q);
  $rows = $app->db->getResult();
  if($rows==""){
	echo "empty";
  }
?>