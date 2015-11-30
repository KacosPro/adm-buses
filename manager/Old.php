<?php

 class Old {

 	public $name;
 	public $lastname;

 	public function __construct($name, $lastname){
 		$this->name =$name;
 		$this->lastname = $lastname;
 	}

 	public function getName(){
 		$caca= $this->name;
 		return $caca;
 	}

 	public function getLastname(){
 		return $this->lastname;
 	}
	
}
