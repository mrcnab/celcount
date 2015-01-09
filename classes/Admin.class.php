<?php

/*********************************************************
	Author:				Mohsin Tariq (Software Engineer)
	Created Date:		16/04/2009
	Modified By:
	Modification Date:

**********************************************************/
class Admin
{
		private $id;		
		private $email;		
		private $dated;
		private $name;
		private $phone;
		private $address;
		private $username;
		private $password;
			
			
	
	/*********************************************************
		Defaualt Constructor
		Created Date:		16/04/2009
		Modified By:
		Modification Date:
		Purpose:			For Assigning default values
	**********************************************************/
	
	public function Admin()
	{
		$this->id		= 0;		
		$this->email	="";		
		$this->dated 	= 0;
		$this->name		="";
		$this->phone	="";
		$this->address	="";
		$this->username	="";
		$this->password	="";
		
		
				
	}
	
	/********************************************************
	
	
	SET METHODS STARTS HERE
	
	
	*********************************************************/
	public function setId($id)
	{
		if(is_numeric($id))
		{
			$this->id = $id;
		}
	}

	
	public function setEmail($var)
	{
		$this->email = trim($var);
	}
	
	
	public function setDated($var)
	{
		$this->dated = trim($var);
	}
	public function setName($name)
	{
			
			$this->name = (trim($name));
				
	}
	public function setPhone($phone)
	{
		$this->phone= (trim($phone));
	}
	public function setAddress($address)
	{
		$this->address= (trim($address));
	}
	
	public function setUsername($username)
	{
		$this->username= (trim($username));
	}
	public function setPassword($password)
	{
		$this->password= (trim($password));
	}
	
	
	
	
	
	
	//SET METHODS END
	
	//*******************************************************
	
	/********************************************************
	
	
	GET METHODS STARTS HERE
	
	
	*********************************************************/
	
	
	public function getId()
	{
		return	$this->id;
	}
			

	public function getEmail()
	{
		return $this->email;
	}
	public function getName()
	{
			
			return $this->name ;
				
	}
	public function getPhone()
	{
		return $this->phone;
	}
		
	
	/********************************************************
	
	
	GET METHODS ENDS HERE
	
	
	*********************************************************/
	
	
	
	public function validate(){
	
		if(!$this->username)
			$error .= "&nbsp; &bull; &nbsp;Please enter username.<br>";

		if(!$this->password)
			$error .= "&nbsp; &bull; &nbsp;Please enter password.<br>";

		return $error;	
	}
	
	function PopulateGrid($table,$whr_clause="")
	{	    
		$sql = "SELECT * FROM $table WHERE 1=1 $whr_clause";
		return $sql;
	}

		////////////////////Change Password////////////////////////////
		function changePassword($table,$where="")
		{
			$sql = "UPDATE ".$table." SET password ='".mySqlSafe($this->password)."' WHERE 1=1 ".$where."";
			return $sql;
		}
	
	
}

?>