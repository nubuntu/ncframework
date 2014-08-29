<?php
  $app = new NUObject(array(
    'init'=>true,
	'db_driver'=>'mysql',
	'run'=>function($self){
		include("database/".$self->db_driver.".php");
	}
  ));
 
?>
