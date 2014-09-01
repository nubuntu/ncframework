<?php
  $mysql = new NUObject(array(
	'database'=>new NUObject(array(
    'mysql'=>new NUObject(array(
      'connect'=>function($self){
		$db=$self::$base->database;
        $self->connection =  new PDO('mysql:host='.$db->host.";dbname=".$db->dbname,$db->username,$db->password,array(PDO::ATTR_EMULATE_PREPARES => false, 
                                                                                                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		return $self->connection;
      },
      'setQuery'=>function($self,$q){
		$self->connect();
        $self->q=$q;
      },	  
	  'query'=>function($self,$affected_rows=true){
		if ($affected_rows){
			$self->affected_rows=$self->connection->exec($self->q);
			return $self->affected_rows;
		}else{
			$self->recordset = $self->connection->query($self->q);
			return $self->recordset;
		}
	  },
	  'getResult'=>function($self){
		$cur = $self->query(false);
		$ret = $cur->fetchColumn();
		return $ret;	  
	  },
	  'getRow'=>function($self){
		$cur = $self->query(false);
		$ret=array();
		if ($object = $cur->fetch(PDO::FETCH_OBJ)) {
			$ret = $object;
		}
		return $ret;	  
	  },
	  'getRows'=>function($self){
		$cur = $self->query(false);
		$array = array();
		while ($row = $cur->fetch(PDO::FETCH_OBJ)) {
				$array[] = $row;
		}
		return $array;	  
	  }
	  
    ))
	))
  ));
?>
