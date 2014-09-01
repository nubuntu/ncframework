<?php
  $app = new NUObject(array(
    'init'=>true,
	'db'=>new NUObject(array(
      'setQuery'=>function($self,$q){
		$self->connect();
        $self->q=$q;
      },
	  'query'=>function($self,$affected_rows=true){
	  },
	  'getResult'=>function($self){
	  },
	  'getRow'=>function($self){
	  },
	  'getRows'=>function($self){
	  }
	
	)),
	'database'=>new NUObject(array(
	  'driver'=>null,
      'host'=>null,
      'username'=>null,
      'password'=>null,
      'dbname'=>null
	)),
	'helper'=>new NUObject(array(
		'getObject'=>function($self,$obj){
			$param=explode("\\",$obj);
			$strobj = implode("->",$param);
			return $self::$base->$strobj;
		}
	)),
	'run'=>function($self){
		include("database/mysql.php");
		$db=$self::$base->database;
		$driver = $db->driver;
		$self::$base->db = $db->$driver;
	}
  ));
 
?>
