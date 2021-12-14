<?php

include_once "../config.php";

function ajouterchapter($nom,$category,$courseId,$file)
{
	$db = config::getConnexion();

        try {
            
            $query = $db->prepare(
                'INSERT INTO chapter (nom,category,course_id,file) 
                    VALUES (:nom,:category,:course_id,:file)'
            );
            $query->execute([
                'nom' => $nom,
                'category' => $category,
                'course_id' => $courseId,
                'file' => $file
            ]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
}

//if(isset($_FILES['file']) && isset($_POST['category']) && isset($_POST['name']) && isset($_GET['CourseId']) && $_FILES['file']['error'] == UPLOAD_ERR_OK){
    move_uploaded_file($_FILES['file']['tmp_name'], "../View/images/CourseElements/".basename($_FILES["file"]["name"])); 
    ajouterchapter($_POST['name'],$_POST['category'],$_GET['id'],"images/CourseElements/".basename($_FILES["file"]["name"]));
    $id=$_GET['id'];
    header("location:../View/singleCoursePage.php?id=".$id);
//}


?>