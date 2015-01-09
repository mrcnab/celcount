<?php

class MailingList
{
	
	 	 	 	
		private $id;				
		private $f_name;
		private $l_name;
		private $email;
		private $job_title;
		private $company;
		private $address;
		private $city;
		private $phone;
		private $cell;
		private $fax;
		private $postal_code;
		private $flag;
	
		

	public function MailingList()
	{
		$this->id				= 0;		
		$this->f_name          	="";
		$this->l_name   	   	="";
		$this->email    	   	="";
		$this->job_title		="";				
		$this->company		="";
		$this->address	     	="";
		$this->city	    	    ="";
		$this->phone      		="";
		$this->cell	    		="";						         		
		$this->fax		="";
		$this->postal_code			="";
	

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
	
	public function setF_name($f_name)
	{
			$this->f_name = $f_name;
	}
	public function setL_name($l_name)
	{
			$this->l_name = $l_name;
	}
	public function setEmail($email)
	{
			$this->email = $email;
	}
	public function setJob_title($job_title)
	{
			$this->job_title = $job_title;
	}
	public function setCompany($company)
	{
			$this->company = $company;
	}
	public function setAddress($address)
	{
			$this->address = $address;
	}
	public function setCity($city)
	{
			$this->city = $city;
	}
	public function setPhone($phone)
	{
			$this->phone = $phone;
	}
	public function setCell($cell)
	{
			$this->cell = $cell;
	}
	public function setFax($fax)
	{
			$this->fax = $fax;
	}
	
	public function setPostal_code($postal_code)
	{
			$this->postal_code = $postal_code;
	}
	public function setFlag($flag)
	{
			$this->flag = $flag;
	}	



	function List_View($table,$whr_clause="")
	{	    
		$sql = "SELECT * FROM $table $whr_clause";
		return $sql;
	}
	
	
	function GetCountSqlSearch($val,$table)
		{	
		$sql = "Select count(*) from $table where 						
						
						email like '".$val."%' 
						
						order by email asc";
					//$res=mysql_query($sql) or die(mysql_error());
					return $sql;
		}
		
		function GetCountSql($table,$whr_clause="")
		{	
			if(!empty ($whr_clause)){
				$sql = "select count(*) from $table $whr_clause";
			}else{
				$sql = "select count(*) from $table ";
			}
			return $sql;
		}
		
		function insert($table)
		{
				$sql = "INSERT INTO $table set 
									f_name 	       = '".mySqlSafe($this->f_name)."',
									l_name	   = '".mySqlSafe($this->l_name)."',
									email 	   = '".mySqlSafe($this->email)."',
									job_title    = '".mySqlSafe($this->job_title)."',
									address       = '".mySqlSafe($this->address)."',
									city 	   	   = '".mySqlSafe($this->city)."',
									phone 		   = '".mySqlSafe($this->phone)."',
									cell 		   = '".mySqlSafe($this->cell)."',
									fax 	   = '".mySqlSafe($this->fax)."',
									postal_code 		   = '".mySqlSafe($this->postal_code)."',
									company    = '".mySqlSafe($this->company)."'";
							return $sql;
		}
		
		function update($table,$id)
		{
				$sql = 		"UPDATE $table set 
									f_name 				= '".mySqlSafe($this->f_name)."',
									l_name 			= '".mySqlSafe($this->l_name)."',
									email 	   = '".mySqlSafe($this->email)."',
									job_title 			= '".mySqlSafe($this->job_title)."',
									address 			= '".mySqlSafe($this->address)."',
									city 			= '".mySqlSafe($this->city)."',
									phone 			= '".mySqlSafe($this->phone)."',
									cell 			= '".mySqlSafe($this->cell)."',
									fax 			= '".mySqlSafe($this->fax)."',
									postal_code 		   = '".mySqlSafe($this->postal_code)."',
									flag 		   = '".mySqlSafe($this->flag)."',
									company		= '".mySqlSafe($this->company)."'
									WHERE id=".$id;
									
							return $sql;
		}

		////////////////////Change Password////////////////////////////
		
		function delete($table)
		{
			$sql = "DELETE FROM  ".$table." WHERE id=".$this->id;
			return $sql;
		}
	
	
}

?>