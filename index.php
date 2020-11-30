<?php
session_name('UniversityPortal');
session_start();
require_once('_libs/Smarty.class.php');
require_once('user.class.php');
require_once('_custom/_init.php');


$user = new User();
$smarty = new Smarty();
if(isset($_SESSION['user'])){
        if($_SESSION['user']['role'] == 'A'){
            $smarty->assign('STUDENTS', $user->getAllStudents($_SESSION));
            $smarty->assign('USER', $user->getUserData($_SESSION));
        }
        if($_SESSION['user']['role'] == 'C'){
            $smarty->assign('STUDENT', $user->getStudent($_SESSION));
        }
    $smarty->display('home.tpl'); 
} else $smarty->display('login.tpl');
?>