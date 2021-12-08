<?php
include_once "../config.php";
include_once "../Controller/UserC.php";

session_start();
if(!isset($_SESSION['loggedIn']) )
    header('location:../../Front/View/login.html');
else if($_SESSION['loggedIn'] != true)
    header('location:../../Front/View/login.html');
else{
    $control = new AdministratorC();
    $userId = $_SESSION['data'];
    $_SESSION['data']=NULL;
    $control->deleteAdministrator($userId);
    header("location:../View/ShowAdministrators.php");
}
?>