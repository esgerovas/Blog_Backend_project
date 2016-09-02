<?php
	class Database
		{
			public $host;
			public $db_username;
			public $db_password;
			public 	$db_name;
			public $db_con;
			public function __construct($host, $user, $pass, $name){
				$this->host = $host;
				$this->db_username = $user;
				$this->db_password = $pass;
				$this->db_name = $name;
				$this->db_con = mysqli_connect($this->host, $this->db_username, $this->db_password, $this->db_name);
				if(!$this->db_con){
					echo "you access your database";
				}
			}
			public function select($tname, $col='*', $id=NULL){
				$sql = "SELECT $col from $tname";
				if($id!=NULL){
					$sql.=" WHERE id=$id ";
				}
				$query = mysqli_query($this->db_con, $sql);
				return $query;
			}
			public function insert($tname, $col, $value){
				$sql = "INSERT INTO $tname ($col) VALUES($value)";
				$query = mysqli_query($this->db_con, $sql);
			}
			public function delete($tname, $id){
				$sql = "DELETE FROM  $tname WHERE id = $id";
				$query = mysqli_query($this->db_con, $sql);
			}
			public function update($tname,$col, $id){
				$sql = "UPDATE $tname SET $col WHERE id = $id";
				$query = mysqli_query($this->db_con, $sql);
			}
			
		}
	$newConnect = new Database('localhost', 'root', '', 'news');
		
?>
