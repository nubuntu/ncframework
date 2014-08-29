<?php
  $mysql = new NUObject(array(
    'connect'=>function($self){
      $self::$base->conn = new mysqli($self::$base->host, $self::$base->username,$self::$base->password,$self::$base->database);
    },
    'setQuery'=>function($self){
      $self::$base->q=$q;
    }
  ));
?>
