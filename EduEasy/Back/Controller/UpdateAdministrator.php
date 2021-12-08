<?php
include_once "../Controller/UserC.php";
include_once "../config.php";

session_start();

function checkAdministrator($userId){
    $db = config::getconnexion();

    try {
        $query = $db->query(
            "SELECT * FROM administrator where userId = '$userId' "
        );
        return $query->fetch();

    } catch (PDOException $e) {
        $e->getMessage();
    }
}



if(!isset($_SESSION['loggedIn']) )
    header('location:../../Front/View/login.html');
else if($_SESSION['loggedIn'] != true)
    header('location:../../Front/View/login.html');
else{
    $control = new AdministratorC();
    $userId = $_SESSION['userId'];
    if(isset($_POST['userName'])){
        $control->updateAdministratorUserName($_POST['userName'],$userId);
        $_SESSION['userName']=$_POST['userName'];
        header("location:../View/updateAdministrator.php");
    }
    else if(isset($_POST['email'])){
        $control->updateAdministratorEmail($_POST['email'],$userId);
        $_SESSION['email']=$_POST['email'];
        header("location:../View/updateAdministrator.php");
    }
    else if(isset($_POST['oldpassword']) && isset($_POST['newpassword']) && isset($_POST['confirmpassword'])){
    $administrator = checkAdministrator($userId);
    if(password_verify($_POST['oldpassword'],$administrator['password'])==true){
        $control->updateAdministratorPassword($_POST['newpassword'],$userId);
        header("location:../View/updateAdministrator.php");
    }
    else{
        header("location:../View/updateAdministrator.php?error=1");
    }
    
    }
    
    
        
}

?>