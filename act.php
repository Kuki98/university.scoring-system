<?php
session_name('UniversityPortal');
session_start();
require_once('_libs/Smarty.class.php');
require_once('user.class.php');

$user = new User();
$smarty = new Smarty();

if(isset($_GET['do'])){
    if ($_GET['do']) {
        if ($_GET['do'] == 'login'){
            if(isset($_POST)){
                echo $user->authentication($_POST);
            }
        }
        if ($_GET['do'] == 'logout'){
            $user->logout($_SESSION);
        }
        
        if ($_GET['do'] == 'editClientData'){
            if(isset($_POST)){
                echo $user->editClientData($_POST, $_SESSION);
            }
        }
        //admin only functions 
        if ($_GET['do'] == 'newStudent'){
            if(isset($_POST)){
                echo $user->newStudent($_POST, $_SESSION);
            }
        }
        if ($_GET['do'] == 'deleteStudent'){
            if(isset($_POST)){
                echo $user->deleteStudent($_POST, $_SESSION);
            }
        } //admin functions end
    }//end do
}

