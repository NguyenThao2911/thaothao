<?php
class database{ 
	protected $host = "localhost";
	protected $name = "root";
	protected $pass = "";
	protected $db = "quanlynhansu";

	protected $charset;
	protected $conn;
	protected $result;

	public function connect(){
		$this->conn = mysqli_connect($this->host, $this->name, $this->pass, $this->db);
		$this->charset = mysqli_set_charset($this->conn, 'UTF8');
	}

	public function getCon(){
		if(!empty($this->conn)){
			return $this->conn;
		}else return false;
	}

	public function disconnect(){
		if($this->conn){
			mysqli_close($this->con);
		}
	}

	public function query($sql){
		if($this->conn){
			$this->free_query();
			$this->result = mysqli_query($this->conn,$sql);
		}
	}

	public function free_query(){
		if($this->result){
			$row = mysqli_free_result($this->result);
			return $row;
		}
	}

	public function num_row(){
		if($this->result){
			$row = mysqli_num_rows($this->result);
			return $row;
		}
	}

	public function fetch(){
		if($this->conn){
			$row = mysqli_fetch_assoc($this->result);
			return $row;
		}
	}
}

?>