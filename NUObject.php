<?php
class NUObject
{
    protected static $_classMethods    = array();
    protected static $_classProperties = array();
    protected $_instanceMethods        = array();
    protected $_instanceProperties     = array();
    protected $_usePrototype = false;
	public static $base;
	public function __construct($members = array()) {
		foreach ($members as $name => $value) {
			$this->prototype->$name = $value;
		}
		if(isset($members['init']) && $members['init']==true){
			self::$base=$this;
		}
	}
	
    public function __get($property)
    {
        if ($property === 'prototype') {
            $this->_usePrototype = true;
            return $this;
        } else {
            if (array_key_exists($property, $this->_instanceMethods)) {
                return $this->_instanceMethods[$property];
            }
            if (array_key_exists($property, $this->_instanceProperties)) {
                return $this->_instanceProperties[$property];
            }
            if (array_key_exists($property, self::$_classMethods)) {
                return self::$_classMethods[$property];
            }
            if (array_key_exists($property, self::$_classProperties)) {
                return self::$_classProperties[$property];
            }
 
            return $this->$property;
        }
    }
 
    public function __set($property, $value)
    {
        if ($property === 'prototype') {
            throw new Exception('Cannot assign to prototype');
        }
 
        if ($this->_usePrototype) {
            if ($value instanceof Closure) {
                self::$_classMethods[$property] = $value;
            } else {
                self::$_classProperties[$property] = $value;
            }
 
            $this->_usePrototype = false;
        } else {
            if ($value instanceof Closure) {
                $this->_instanceMethods[$property] = $value;
            } else {
                $this->_instanceProperties[$property] = $value;
            }
        }
    }
 
    public function __unset($property)
    {
        unset($this->_instanceMethods[$property]);
        unset($this->_instanceProperties[$property]);
        unset(self::$_classMethods[$property]);
        unset(self::$_classProperties[$property]);
    }

    public function __call($method, $args){	
	
        $args = array_merge(array($this),$args);
		//print_r($args);
        if (array_key_exists($method, $this->_instanceMethods)) {
            return call_user_func_array($this->_instanceMethods[$method], $args);
        }
        if (array_key_exists($method, self::$_classMethods)) {
            return call_user_func_array(self::$_classMethods[$method], $args);
        }
 
        return call_user_func_array(array($this, $method), $args);
    }
	
}
?>
