<?php

class Intro
{
	
	 	 	 	
		private $id;				
		private $introduction;
		private $pics1;
		private $pics2;
		private $pics3;				
		
	public function intro()
	{
		$this->id					= 0;		
		$this->introduction			="";
		$this->pics1                ="";
		$this->pics2                ="";
		$this->pics2                ="";				
					
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
	
	public function setIntroduction($introduction)
	{
			
			$this->introduction = $introduction;
				
	}
	public function setPics1($pics1)
	{
			
			$this->pics1 = $pics1;
				
	}
	public function setPics2($pics2)
	{
			
			$this->pics2 = $pics2;
				
	}
	public function setPics3($pics3)
	{
			
			$this->pics3 = $pics3;
				
	}
	
	
	
	function PopulateGrid($table,$whr_clause="")
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
				$sql = "select count(*) from $table WHERE 1=1 $whr_clause";
			}else{
				$sql = "select count(*) from $table ";
			}
			return $sql;
		}
		
		function insert($table)
		{
				$sql = "INSERT INTO $table set 
									introduction		= '".mySqlSafe($this->introduction)."',
									pic1       		= '".mySqlSafe($this->pics1)."',
									pic2 				= '".mySqlSafe($this->pics2)."',
									pic3 				= '".mySqlSafe($this->pics3)."'";
							return $sql;
		}
		
		function update($table,$id)
		{
				$sql = 		"UPDATE $table set 
									introduction		= '".mySqlSafe($this->introduction)."',
									pic1       		= '".mySqlSafe($this->pics1)."',
									pic2 				= '".mySqlSafe($this->pics2)."',
									pic3 				= '".mySqlSafe($this->pics3)."'

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