<?php
  include("NUObject.php");
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
	  'query'=>function($self){
		$self->recordset = $self->connection->query($self->q);
		return $self->connection->affected_rows;	  
	  },
	  'getResult'=>function($self){
		if($self->query()<1){
			return null;
		}
		$ret = null;
		if($res=$self->recordset->fetch_row()){
			$ret=$res[0];
		}
		$cur->close();
		$self->connection->close();
		return $ret;	  
	  },
	  'getRow'=>function($self){
		if($self->query()<1){
			return array();
		}
		$ret=array();
		if ($object = $self->recordset->fetch_object()) {
			$ret = $object;
		}
		$cur->close();
		$self->connection->close();
		return $ret;	  
	  },
	  'getRows'=>function($self){
		if($self->query()<1){
			return array();
		}
		$array = array();
		while ($row = $self->recordset->fetch_object()) {
				$array[] = $row;
		}
		$cur->close();
		$self->connection->close();
		return $array;	  
	  }
    ))
  ));
?>
