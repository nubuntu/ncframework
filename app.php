<?php
  $app = new NUObject(array(
    'init'=>true,
    'db'=>new NUObject(array(
      'driver'=>'mysql',
      'host'=>'localhost',
      'username'=>'root',
      'password'=>'root',
      'database'=>'',
      'connection'=>null,
	  'recordset'=>null,
      'q'=>'',
	  'affected_rows'=>null
    ))
  ));
 
?>
