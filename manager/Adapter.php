<?php
include_once "Old.php";
include_once"NewInterface.php";
	class Adapter implements NewInterface{
		
		public $person;

		public function __construct($oldname,$oldlastname){
	 		$this->person= new Old($oldname,$oldlastname);
 		}

 		public function getName(){
 			$name= $this->person->getName();
 			$lastname= $this->person->getLastName();
 			$fullname = $name . " " . $lastname;
 			return $fullname; 
 		}

	}

?>