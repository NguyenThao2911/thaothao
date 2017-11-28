<?php
include_once('../../library/database.php');
class department extends database{
	protected $id;
	protected $name_department;
    protected $disc;
	protected $delete_flag;

	public function __construct(){
        $this->connect();
    }

    public function set_id($id){
        $this->id = $id;
    }
    public function get_id(){
        return $this->id;
    }

    public function set_name_department($name_department){
    	$this->name_department = $name_department;
    }
    public function get_name_department(){
    	return $this->name_department;
    }

    public function set_disc($disc){
        $this->disc = $disc;
    }
    public function get_disc(){
        return $this->disc;
    }

    public function set_deleteflag($deleteflag){
    	$this->delete_flag = $deleteflag;
    }
    public function get_deleteflag(){
    	return $this->delete_flag;
    }

    public function select_department(){
        $sql = "SELECT * FROM departments WHERE id = '$this->id'";
        $this->query($sql);
        if($this->num_row()==0){
            return "fail";
        }else{
        $row = $this->fetch();
        return $row;
    }
    }

    public function listDepartment(){
        $sql = "SELECT * FROM departments";
        $this->query($sql);
        $result = array();
        $i=0;
        while ($row = $this->fetch()) {
            $result[$i] = array("id"=>$row['id'], "name"=>$row['name']);
            $i++;
        }
        return $result;
    }

    public function editDepartment(){
        $sql = "SELECT * FROM departments WHERE name ='$this->name_department' AND id != '$this->id'";
        $this->query($sql); 
        if($this->num_row()==0){
            $sql = "UPDATE departments SET name = '$this->name_department', discription = '$this->disc' WHERE id = '$this->id'";
            $this->query($sql);
        }
        else{
            return "fail";
        }
    }

    public function delDepartment(){
        $sql = "SELECT * FROM departments WHERE id = '$this->id'";
        $this->query($sql);
        if($this->num_row()==0){
            echo "fail";
        }
        else{
            $sql = "DELETE FROM departments WHERE id = '$this->id'";
            $this->query($sql);
        }
    }

    public function addDepartment(){
        $sql = "SELECT * FROM departments WHERE name ='$this->name_department' AND id != '$this->id'";
        $this->query($sql);
        if($this->num_row()==0){
            $sql = "INSERT INTO departments(name, discription) VALUES('$this->name_department', '$this->disc')";
            $this->query($sql);
        }
        else{
            return "fail";
        }
    }
}
?>