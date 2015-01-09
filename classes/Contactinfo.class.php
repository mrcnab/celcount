<?php

class Contactinfo
{
	
	 	 	 	
		private $id;				
		private $postal_address;
		private $pobox;
		private $area_code;
		private $fone_num;
		private $cell_num;
		private $fax;
		private $email;
		private $email1;
		private $description;

	public function intro()
	{
		$this->id				= 0;		
		$this->postal_address	="";
		$this->pobox   		   	="";
		$this->area_code		="";				
		$this->fone_num	     	="";
		$this->cell_num	    	="";
		$this->fax      		="";
		$this->email			="";						         		
		$this->email1			="";
		$this->description	    		="";							
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
	
	public function setPostal_address($postal_address)
	{
			
			$this->postal_address = $postal_address;
				
	}
	public function setPobox($pobox)
	{
			
			$this->pobox = $pobox;
				
	}
	public function setArea_code($area_code)
	{
			
			$this->area_code = $area_code;
				
	}
	public function setFone_num($fone_num)
	{
			
			$this->fone_num = $fone_num;
				
	}
	public function setCell_num($cell_num)
	{
			
			$this->cell_num = $cell_num;
				
	}
	public function setFax($fax)
	{
			
			$this->fax = $fax;
				
	}
	public function setEmail($email)
	{
			
			$this->email = $email;
				
	}
	public function setEmail1($email1)
	{
			
			$this->email1 = $email1;
				
	}
	public function setDescription($description)
	{
			
			$this->description = $description;
				
	}
	
	
	
	
	
	function PopulateGrid($table,$whr_clause="")
	{	    
		$sql = "SELECT * FROM $table WHERE 1=1 $whr_clause";
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
				$sql = "select count(*) from $table WHERE 1=1 $whr_clause";
			}else{
				$sql = "select count(*) from $table ";
			}
			return $sql;
		}
		
		function insert($table)
		{
				$sql = "INSERT INTO $table set 
									postal_address 				= '".mySqlSafe($this->postal_address)."',
									pobox 			= '".mySqlSafe($this->pobox)."',
									area_code 			= '".mySqlSafe($this->area_code)."',
									fone_num 			= '".mySqlSafe($this->fone_num)."',
									cell_num 			= '".mySqlSafe($this->cell_num)."',
									fax 			= '".mySqlSafe($this->fax)."',
									email 			= '".mySqlSafe($this->email)."',
									email1 			= '".mySqlSafe($this->email1)."',
									description 				= '".mySqlSafe($this->description)."'";
							return $sql;
		}
		
		function update($table,$id)
		{
				$sql = 		"UPDATE $table set 
									postal_address 				= '".mySqlSafe($this->postal_address)."',
									pobox 			= '".mySqlSafe($this->pobox)."',
									area_code 			= '".mySqlSafe($this->area_code)."',
									fone_num 			= '".mySqlSafe($this->fone_num)."',
									cell_num 			= '".mySqlSafe($this->cell_num)."',
									fax 			= '".mySqlSafe($this->fax)."',
									email 			= '".mySqlSafe($this->email)."',
									email1 			= '".mySqlSafe($this->email1)."',
									description		= '".mySqlSafe($this->description)."'
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