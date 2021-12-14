<?php

include_once "../Controller/UserC.php";
include_once "../Model/User.php";
//include_once "../Controller/loginControl.php";

session_start();
$userId = $_SESSION['userId'];

$searchSTU = "STU";
$searchTEA = "TEA";
$searchADM = "ADM";

//=============== DELETING STUDENT PART STARTS ================================
if(preg_match("/{$searchSTU}/i", $userId)){
    $control = new StudentC();
    notifyAdministrator('delatedAccount',$_SESSION['userName'],$_SESSION['userId'],'student');
    $control->deleteStudent($userId);
    $_SESSION['loggedIn']=false;
    $_SESSION['userId']="";
    $_SESSION['userName'] = "";
    $_SESSION['email'] = "";
    $_SESSION = NULL;
    session_destroy();
    header("location:../View/index.html");
}
//================== DELETING STUDENT PART ENDS =================================



//================= DELETING TEACHER PART STARTS ============================
else if(preg_match("/{$searchTEA}/i", $userId)){
    $control = new TeacherC();
    notifyAdministrator('delatedAccount',$_SESSION['userName'],$_SESSION['userId'],'teacher');
    $control->deleteTeacher($userId);
    $_SESSION['loggedIn']=false;
    $_SESSION['userId']="";
    $_SESSION['userName'] = "";
    $_SESSION['email'] = "";
    $_SESSION = NULL;
    session_destroy();
    header("location:../View/index.html");
}
//==================== DELETING TEACHER PART ENDS =============================
?>