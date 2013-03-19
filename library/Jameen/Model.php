<?php
class Jameen_Model
{
	public function __set($name, $value)
	{
		if (array_key_exists($name, get_object_vars($this)))
		{
			$this->$name = $value;
			return true;
		}
		else throw new Exception('Set: Undefined property: ' . $name, 1);
	}
	
	public function __get($name)
	{
		if (array_key_exists($name, get_object_vars($this)))
		{
			return $this->$name;
		}
		else throw new Exception("Get: Undefined property $name" , 2);
	}

    public function exposeVars()
    {
        return get_class_vars(__CLASS__);
    }
}
?>