<?php

include_once "../config.php";

function checkStudent($userId){
    $db = config::getconnexion();

    try {
        $query = $db->query(
            "SELECT * FROM student where userId = '$userId' "
        );
        return $query->fetch();

    } catch (PDOException $e) {
        $e->getMessage();
    }
}

function checkTeacher($userId){
    $db = config::getconnexion();

    try {
        $query = $db->query(
            "SELECT * FROM teacher where userId = '$userId' "
        );
        return $query->fetch();

    } catch (PDOException $e) {
        $e->getMessage();
    }
}

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

function addConnection($userId){
    $db = config::getconnexion();
    $loginTime = date('y-m-d-H-i-s');
    try {
        $query = $db->prepare(
            'INSERT INTO onlineusers (userId,loginTime) 
                VALUES (:userId,:loginTime) '
        );
        $query->execute([
            'userId' => $userId,
            'loginTime' => $loginTime
        ]);
    } catch (PDOException $e) {
        $e->getMessage();
    }
}


$submittedUserId = $_POST['userId'];
$submittedPassword = $_POST['password'];

$searchSTU = "STU";
$searchTEA = "TEA";
$searchADM = "ADM";


//==================== STUDENT LOGIN STARTS ===============================
if(preg_match("/{$searchSTU}/i", $submittedUserId)){

    $student = checkStudent($submittedUserId);

if($student==NULL)
    header("Location:../View/login.html?error=1");
else{
    $cryptedPassword = $student['password'];
    if(password_verify($submittedPassword,$cryptedPassword)==false)
        header("Location:../View/login.html?error=1");
    else if($submittedUserId==$student["userId"] && password_verify($submittedPassword,$cryptedPassword)==true){
        session_start();
        $_SESSION['loggedIn'] = true;
        $_SESSION['userId'] = $submittedUserId;
        $_SESSION['userName'] = $student['userName'];
        $_SESSION['email'] = $student['email'];
        addConnection($submittedUserId);
        header("Location:../View/studentpage.php");
    }
}

}
//==================== STUDENT LOGIN STOPS ===============================


//==================== TEACHER LOGIN STARTS ===============================
else if(preg_match("/{$searchTEA}/i", $submittedUserId)){

    $teacher = checkTeacher($submittedUserId);

if($teacher==NULL)
    header("Location:../View/login.html?error=1");
else{
    $cryptedPassword = $teacher['password'];
    if(password_verify($submittedPassword,$cryptedPassword)==false)
        header("Location:../View/login.html?error=1");
    else if($submittedUserId==$teacher["userId"] && password_verify($submittedPassword,$cryptedPassword)==true){
        session_start();
        $_SESSION['loggedIn'] = true;
        $_SESSION['userId'] = $submittedUserId;
        $_SESSION['userName'] = $teacher['userName'];
        $_SESSION['email'] = $teacher['email'];
        addConnection($submittedUserId);
        header("Location:../View/teacherpage.php");
    }
}

}
//==================== TEACHER LOGIN STOPS ===============================

//==================== ADMINISTRATOR LOGIN STARTS ===============================
else if(preg_match("/{$searchADM}/i", $submittedUserId)){

    $administrator = checkAdministrator($submittedUserId);

if($administrator==NULL)
    header("Location:../View/login.html?error=1");
else{
    $cryptedPassword = $administrator['password'];
    if(password_verify($submittedPassword,$cryptedPassword)==false)
        header("Location:../View/login.html?error=1");
    else if($submittedUserId==$administrator["userId"] && password_verify($submittedPassword,$cryptedPassword)==true){
        session_start();
        $_SESSION['loggedIn'] = true;
        $_SESSION['userId'] = $submittedUserId;
        $_SESSION['userName'] = $administrator['userName'];
        $_SESSION['email'] = $administrator['email'];
        header("Location:../../Back/View/index.php");
    }
}

}


//==================== ADMINISTRATOR LOGIN STOPS ===============================
?>