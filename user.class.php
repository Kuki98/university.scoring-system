<?php
require_once __DIR__ .'/_custom/db.class.php';
require_once('mail/contact_me.php');
require_once('_custom/_init.php');

class User{
    private $mail;
    private $db;
    function __construct(){
        $this->mail = new Mail();
        $this->db = new DB();
    }

    function authentication($p){
        
        $email = $this->db->esc($p['email']);
        $password = $this->db->esc($p['password']);
        $hashPassword = hash('sha256', $password);
        
        $r = $this->db->getArr("SELECT u.id, u.email, u.password, u.status, u.role FROM users u WHERE u.email = '$email' AND u.password = '$hashPassword'");
        
        
        if(!empty($r)) {
            $_SESSION['user'] = $r[0];

            if($_SESSION['user']['status'] == 255){
                return json_encode(array("res" => "5", "msg" => "First login, please change password!"));      
            } else {  
                return json_encode(array("res" => "6", "msg" => "Login succsessfully"));  
            }
            
        } else {
            return json_encode(array("res" => "2", "msg" => "Invalid login"));  
        }
    }
    function logout($u){
        if(isset($u['user'])) {
            unset($_SESSION['user']);
        } else return;
    }
    function getAllStudents($session){
        if($session['user']['role'] == "A"){
            $students = $this->db->getArr("SELECT u.id as u_id, s.id as s_id, u.email, u.status, s.name, s.last_name, s.u_group FROM users u JOIN students s ON u.id = s.user_id WHERE u.role='C' ");
            if($students) return $students;
        } 
        else return json_encode(array("res" => "2", "msg" => "No permissions"));
    }
    function getStudent($session){
        $user_id = $session['user']['id'];
        $student = $this->db->getArr("SELECT u.email, u.status, s.name, s.last_name, s.u_group FROM users u JOIN students s ON u.id = s.user_id WHERE u.id=$user_id ");
        if($student) return $student;
    }
    function getUserData($u){
        if($u['user']['role'] == "A"){
            $userId = $u['user']['id'];
            $r = $this->db->getArr("SELECT * FROM users WHERE id='$userId'");
            if($r) return $r;
        } else return json_encode(array("res" => "2", "msg" => "No permissions"));
    }
    function editClientData($p, $u){
        if($u['user']['role'] == 'A'){
            $userId = $u['user']['id'];
            $email = $this->db->esc($p['xEmail']);
            $sql = '';
            if(isset($p['xNewPassword']) && !empty($p['xNewPassword'])){
                $password = $this->db->esc($p['xNewPassword']);
                $password2 = $this->db->esc($p['xConfPassword']);
                if($password != $password2){
                    return json_encode(array("res" => "2", "msg" => "Passwords doesn't match!"));    
                } else {
                    $hashPassword = hash('sha256', $password);
                    $sql .= "u.password='$hashPassword', u.status='1' ,  ";
                    $_SESSION['user']['status'] = 1;
                }
            }
            $r = $this->db->update("UPDATE users u 
                SET $sql u.email='$email' 
                WHERE u.id='$userId' AND u.role='A'");
            if($r) return json_encode(array("res" => "6", "msg" => "Updated succsessfully!"));

        } else {
            $user_id = $u['user']['id'];
            $fname = $this->db->esc($p['xFirstName']);
            $lname = $this->db->esc($p['xLastName']);
            $email = $this->db->esc($p['xEmail']);
            $sql = '';
            if(isset($p['xNewPassword']) && !empty($p['xNewPassword'])){
                $password = $this->db->esc($p['xNewPassword']);
                $password2 = $this->db->esc($p['xConfPassword']);
                if($password != $password2){
                    return json_encode(array("res" => "2", "msg" => "Passwords doesn't match!"));    
                } else {
                    $hashPassword = hash('sha256', $password);
                    $sql .= "u.password='$hashPassword', u.status='1' ,  ";
                    $_SESSION['user']['status'] = 1;
                }
            }
            $students = $this->db->update("UPDATE students SET name = '$fname', last_name = '$lname' WHERE user_id = '$user_id' ");
            $users = $this->db->update($query = "UPDATE users u SET $sql u.email = '$email' WHERE u.id = '$user_id' ");
            return json_encode(array("res" => "6", "msg" => "Updated succsessfully!"));    
        }
    }
    function newStudent($p, $u){
        if($u['user']['role'] == 'A'){
            $email = $this->db->esc($p['email']);
            $password = $this->db->esc($p['password']);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) return json_encode(array("res" => "2", "msg" => "Invalid email!"));
            if(empty($email) || empty($password)) return json_encode(array("res" => "2", "msg" => "Empty fields!"));
            $hashPassword = hash('sha256', $password);

            $user_id = $this->db->insert("INSERT INTO users(email,password,role) VALUES('$email', '$hashPassword', 'C')");
            $student_id = $this->db->insert("INSERT INTO students(user_id) VALUES($user_id)");

            if(!$u) return json_encode(array("res" => "2", "msg" => "Empty fields!"));
            else {
                //here send mail on created client
                // $this->mail->sendCredentialsToClient($email, $password);
                return json_encode(array("res" => "6", "msg" => "Created successfully"));
            }
        } else {
            return json_encode(array("res" => "6", "msg" => "No permissions"));
        }
    }
    function deleteStudent($p, $u){
        if($u['user']['role'] == "A"){
            $clientId = $this->db->esc($p['id']);
            $students = $this->db->delete("DELETE FROM students WHERE user_id='$clientId'");
            $users = $this->db->delete("DELETE FROM users WHERE id='$clientId'");
            
            if(!$clientId || !$students ) return json_encode(array("res" => "2" , "msg" => "Error!"));
            else return json_encode(array("res" => "6", "msg" => "Client deleted successfully!"));
        } else return json_encode(array("res" => "2", "msg" => "No permissions")); 
    }
    
}