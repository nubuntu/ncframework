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
      'q'=>'',
      'connect'=>function($self){
        $self::$base->connection = mysqli($self::$base->host,$self::$base->username,$self::$base->password,$self::$base->database);
      },
      'setQuery'=>function($self,$q){
        $self::$base->q=$q;
      }
    ))
  ));
?>
