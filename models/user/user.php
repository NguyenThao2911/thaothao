<?php
include_once('../../library/database.php');
class user extends database{
    protected $id;
	protected $user_name;
	protected $password;
    protected $fullname;
	protected $role;
    protected $birthday;
    protected $email;
    protected $sex;
	protected $first_login;
	protected $error_login;
	protected $token;
	protected $deleteflag;
	protected $resetflag;
	protected $timelogin;
    protected $department;
    protected $position;

	public function __construct(){
		$this->connect();
	}
    public function set_id($id){
        $this->id = $id;
    }
    public function get_id(){
        return $this->id;
    }

	public function set_name($name){
		$this->user_name = $name;
	}
    public function get_name(){
		return $this->user_name;
	}

    public function set_pass($pass){
    	$this->password = $pass;
    }
    public function get_pass(){
    	return $this->password;
    }
    public function set_fullname($fullname){
        $this->fullname = $fullname;
    }
    public function get_fullname(){
        return $this->fullname;
    }
    public function set_role($role){
    	$this->role = $role;
    }
    public function get_role(){
    	return $this->role;
    }
    public function set_sex($sex){
        $this->sex = $sex;
    }
    public function get_sex(){
        return $this->sex;
    }
    public function set_birthday($birthday){
        $this->birthday = $birthday;
    }
    public function get_birthday(){
        return $this->birthday;
    }
    public function set_email($email){
        $this->email = $email;
    }
    public function get_email(){
        return $this->email;
    }
    public function set_firstlogin($firstlogin){
    	$this->first_login=$firstlogin;
    }
    public function get_firstlogin(){
    	return $this->first_login;
    }
    public function set_errorlogin($errologin){
    	$this->error_login = $errologin;
    }
    public function get_errorlogin(){
    	return $this->error_login;
    }
    public function set_token($token){
    	$this->token = $token;
    }
    public function get_token(){
    	return $this->token;
    }
    public function set_deleteflag($deleteflag){
    	$this->deleleflag = $deleteflag;
    }
    public function get_deleteflag(){
    	return $this->deleteflag;
    }
    public function set_resetflag($resetflag){
    	$this->resetflag = $resetflag;
    }
    public function get_resetflag(){
    	return $this->resetflag;
    }
    public function set_timelogin($timelogin){
    	$this->timelogin = $timelogin;
    }
    public function get_timelogin(){
    	return $this->timelogin;
    }
    public function set_department($department){
        $this->department = $department;
    }
    public function get_department(){
        return $this->department;
    }
    public function set_position($position){
        $this->position = $position;
    }
    public function get_position(){
        return $this->position;
    }

	public function login(){
	
		$sql = "SELECT * FROM users
				WHERE user_name = '$this->user_name' AND password = '$this->password'";
	    $this->query($sql);
       // echo $sql;
	    if($this->num_row()==1){ 
	    	$row = $this->fetch();
	    	
	    	$_SESSION['name'] = $this->user_name;
            $_SESSION['pass'] = $this->password;
	    	$_SESSION['role'] = $row['role'];
            $_SESSION['first_login'] = $row['first_login'];
            $_SESSION['id'] = $row['id'];
	    	return "ok";
	    }
    }


    //khi người dùng thay đổi pass trong lần đăng nhập đầu thì lưu pass mới và chuyển first_login = 1(ko phải lần đầu đăng nhập)
    public function setfirstlogin(){
        $sql = 'SELECT * FROM users WHERE user_name = "'.$_SESSION['name'].'" AND first_login = "0" AND id = "'.$_SESSION['id'].'"';
        $this->query($sql);

        if ($this->num_row()==0) {
            return "fail";
        }else{
            $sql = "UPDATE users SET password = '$this->password', first_login = '1' WHERE id = '".$_SESSION['id']."'";
            $this->query($sql);   
           
        }      
    }

    public function infoUser(){

        $sql = "SELECT * FROM user_department
                INNER JOIN users ON user_department.user_id = users.id
                INNER JOIN departments ON user_department.department_id = departments.id WHERE user_department.user_id ='$this->id'";
        $this->query($sql);
        if ($this->num_row()==0){
            return "fail";
        }else{
            $row = $this->fetch();
            return $row;

        }
    }
    
    public function editInfoUser(){
        $sql = "SELECT * FROM users WHERE user_name ='$this->user_name' AND id != '$this->id'";
        $this->query($sql); 
        if($this->num_row()==0){
            $sql = "UPDATE users SET user_name = '$this->user_name', fullname = '$this->fullname', birthday = '$this->birthday', email ='$this->email' WHERE id = '$this->id'";
            $this->query($sql);
        }
        else{
            return "fail";
        }
    }

    public function listStaff(){
        $sql = "SELECT users.id, users.fullname, users.user_name, users.sex, users.birthday, users.email, user_department.position, departments.name FROM user_department
                INNER JOIN users ON user_department.user_id = users.id
                INNER JOIN departments ON user_department.department_id = departments.id WHERE departments.id='$this->id' ";
        $this->query($sql);
        $result = array();
        $i=0;
        while ($row = $this->fetch()){
            $result[$i] = array("id"=>$row['id'], "fullname"=>$row['fullname'], "username" =>$row['user_name'], "birthday"=>$row['birthday'], "sex"=>$row['sex'], "email"=>$row['email'], "position"=>$row['position'], "department"=>$row['name']);
            $i++;
        }
        return $result;
    }

    public function listUser(){
        $sql = "SELECT id, user_name, role FROM users";
        $this->query($sql);
        $result = array();
        $i=0;
        while ($row = $this->fetch()) {
            $result[$i] = array("id"=>$row['id'], "user_name"=>$row['user_name'], "role"=>$row['role']);
            $i++;
        }
        return $result;
    }

    public function selectUser(){
        $sql = "SELECT * FROM users WHERE id='$this->id'";
        $this->query($sql);
        if ($this->num_row()==0) {
            return "fail";
        }else{
            $row=$this->fetch();
            return $row;
        }
    }
    
    public function resetPass(){
        $sql = "SELECT * FROM users WHERE id = '$this->id'";
        $this->query($sql);
        if ($this->num_row()==0) {
           return "fail";
        }else{
            $sql1 = "UPDATE users SET password = '".md5($this->password)."', first_login =0 WHERE id ='$this->id'";
            $this->query($sql1);
        }
    }

    public function delUser(){
        $sql = "SELECT * FROM users WHERE id = '$this->id'";
        $this->query($sql);
        if($this->num_row()==0){
            echo "fail";
        }
        else{
            $sql = "DELETE FROM users WHERE id = '$this->id'";
            $this->query($sql);
        }
    }
    
    public function editStaff(){
        $sql = "SELECT * FROM user_department
                INNER JOIN users ON user_department.user_id = users.id
                INNER JOIN departments ON user_department.department_id = departments.id WHERE users.id='$this->id'";

        $this->query($sql); 
        if($this->num_row()!=0){
            $sql = "UPDATE users SET fullname = '$this->fullname' WHERE id = '$this->id'";
            $this->query($sql);
            // $sql1 = "UPDATE departments SET name = '$this->department' WHERE users.id = '$this->id'";
            // $this->query($sql1);
            $sql2 = "UPDATE user_department SET position = '$this->position', department_id = '$this->department'  WHERE user_id = '$this->id'";
            $this->query($sql2);
            // $this->query($sql2);
        }
        else{
            return "fail";
        }
    }

    public function addStaff(){
        $sql = "SELECT * FROM users, user_department, departments WHERE users.user_name ='$this->user_name' AND users.id != '$this->id'";
        $this->query($sql);
        if($this->num_row()==0){
            $sql = "INSERT INTO users(user_name, password, fullname, role, sex, birthday, email, first_login, error_login, token, created, updated) VALUES('$this->user_name', '$this->password','$this->fullname', '$this->role', '$this->sex', '$this->birthday', '$this->email', 0, '','','".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."')";
            $this->query($sql);

            $user_id = mysqli_insert_id($this->conn);

            $sql1= "INSERT INTO user_department(user_id, department_id, position) VALUES ('$user_id','$this->department', '$this->position')";
            $this->query($sql1);
        }
        else{
            return "fail";
        }
    }

    public function infoStaff(){
        $sql = "SELECT * FROM user_department
                INNER JOIN users ON user_department.user_id = users.id
                INNER JOIN departments ON user_department.department_id = departments.id WHERE user_department.position = 0";
        $this->query($sql);
        $result = array();
        $i=0;
        while ($row = $this->fetch()){
            $result[$i] = array("fullname"=>$row['fullname'], "birthday"=>$row['birthday'], "sex"=>$row['sex'], "email"=>$row['email'], "position"=>$row['position']);
            $i++;
        }
        return $result;
    }

}


?>