<?php
  $mysql = new NUObject(array(
    'db'=>new NUObject(array(
      'connect'=>function($self){
        $self->connection = new mysqli($self->host,$self->username,$self->password,$self->database);
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}		
      },
      'setQuery'=>function($self,$q){
		$self->connect();
        $self->q=$q;
      },
	  'query'=>function($self,$affected_rows=true){
		$self->recordset = $self->connection->query($self->q);
		$self->affected_rows=$self->connection->affected_rows;
		if ($affected_rows){
			$self->recordset->close;
			$self->connection->close;
			return $self->affected_rows;
		}else{
			return $self->recordset;
		}
	  },
	  'getResult'=>function($self){
		$cur = $self->query(false);
		$ret = null;
		if($res=$cur->fetch_row()){
			$ret=$res[0];
		}
		$cur->close();
		$self->connection->close();
		return $ret;	  
	  },
	  'getRow'=>function($self){
		$cur = $self->query(false);
		$ret=array();
		if ($object = $cur->fetch_object()) {
			$ret = $object;
		}
		$cur->close();
		$self->connection->close();
		return $ret;	  
	  },
	  'getRows'=>function($self){
		$cur = $self->query(false);
		$array = array();
		while ($row = $cur->fetch_object()) {
				$array[] = $row;
		}
		$cur->close();
		$self->connection->close();
		return $array;	  
	  }
    ))
  ));
?>
