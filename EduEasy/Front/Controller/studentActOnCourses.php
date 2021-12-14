<?php

include_once "../config.php";

session_start();

function addCoursesToMyCourses($userId,$courseId){
    $db = config::getConnexion();

    try {
        $query = $db->prepare(
            'INSERT INTO followcourse (userId,courseId) 
                VALUES (:userId,:courseId) '
        );
        $query->execute([
            'userId' => $userId,
            'courseId' => $courseId
        ]);
    } catch (PDOException $e) {
        $e->getMessage();
    }
}

function removeCoursesFromMyCourses($userId,$courseId){
        $db = config::getConnexion();
        try {
            $query = $db->prepare(
                'DELETE FROM followcourse WHERE userId = :userId and courseId= :courseId'
            );
            $query->execute([
                'userId' => $userId,
                'courseId' => $courseId
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
}

function getCourse($courseId){
    $db = config::getconnexion();

        try {
            $query = $db->query(
            "SELECT * FROM courses where id='$courseId'"
            );
            return $query->fetch();

        } catch (PDOException $e) {
            $e->getMessage();
        }
}

function updateNumberOfParticipants($courseId,$action){
    $course = getCourse($courseId);
    if($action=="increment")
        $course['numberOfStudentsRegistered'] = $course['numberOfStudentsRegistered']+1;
    else if($action=="decrement")
        $course['numberOfStudentsRegistered'] = $course['numberOfStudentsRegistered']-1;
        
        $db = config::getconnexion();
    try{
        $query = $db->prepare(
            'UPDATE courses SET numberOfStudentsRegistered= :numberOfStudentsRegistered where id = :id'
        );
        $query = $query->execute([
            'numberOfStudentsRegistered' => $course['numberOfStudentsRegistered'],
            'id' => $courseId
        ]);
    }catch(PDOException $e){
        $e->getMessage();
    }

}

function updateNumberOfLikes($courseId,$action){
    $course = getCourse($courseId);
    if($action=="increment")
        $course['numberOfLikes'] = $course['numberOfLikes']+1;
    else if($action=="decrement")
        $course['numberOfLikes'] = $course['numberOfLikes']-1;
        
        $db = config::getconnexion();
    try{
        $query = $db->prepare(
            'UPDATE courses SET numberOfLikes= :numberOfLikes where id = :id'
        );
        $query = $query->execute([
            'numberOfLikes' => $course['numberOfLikes'],
            'id' => $courseId
        ]);
    }catch(PDOException $e){
        $e->getMessage();
    }
}

function unlikeCourse($userId,$courseId)
{
    $db = config::getConnexion();
        try {
            $query = $db->prepare(
                'DELETE FROM likecourse WHERE userId = :userId and courseId= :courseId'
            );
            $query->execute([
                'userId' => $userId,
                'courseId' => $courseId
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
}

function likeCourse($userId,$courseId)
{
    $db = config::getConnexion();
        try {
            $query = $db->prepare(
                'INSERT INTO likecourse (userId,courseId) 
                VALUES (:userId,:courseId) '
            );
            $query->execute([
                'userId' => $userId,
                'courseId' => $courseId
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
}

if(isset($_GET['courseNum']) && isset($_SESSION['userId']) && isset($_GET['action']) && $_GET['action']=='Join'){
    $courseId = $_GET['courseNum'];
    $userId = $_SESSION['userId'];
    addCoursesToMyCourses($userId,$courseId);
    updateNumberOfParticipants($courseId,"increment");
    header("location:../View/ShowFreeCourses.php");
}
else if(isset($_GET['courseNum']) && isset($_SESSION['userId']) && isset($_GET['action']) && $_GET['action']=='Drop'){
    $courseId = $_GET['courseNum'];
    $userId = $_SESSION['userId'];
    removeCoursesFromMyCourses($userId,$courseId);
    updateNumberOfparticipants($courseId,"decrement");
    header("location:../View/ShowFreeCourses.php");
}
else if(isset($_GET['courseNum']) && isset($_SESSION['userId']) && isset($_GET['action']) && $_GET['action']=='Like'){
    $courseId = $_GET['courseNum'];
    $userId = $_SESSION['userId'];
    likeCourse($userId,$courseId);
    updateNumberOfLikes($courseId,"increment");
    header("location:../View/ShowFreeCourses.php");
}
else if(isset($_GET['courseNum']) && isset($_SESSION['userId']) && isset($_GET['action']) && $_GET['action']=='Unlike'){
    $courseId = $_GET['courseNum'];
    $userId = $_SESSION['userId'];
    unlikeCourse($userId,$courseId);
    updateNumberOfLikes($courseId,"decrement");
    header("location:../View/ShowFreeCourses.php");
}


?>