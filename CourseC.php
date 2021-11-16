<?php
    include('config.php');
    include_once('Model/Course.php');

    class CourseC{
        function afficherCourses()
        {
            $sql = "SELECT * FROM courses";
            $db = config::getConnexion();
            try{
				$list = $db->query($sql);
				return $list;
			}
			catch(Exception $e){
				die('Error:'. $e->getMessage());
			}
        }

		function afficherCoursesPaid()
        {
            $sql = "SELECT * FROM courses where free=0";
            $db = config::getConnexion();
            try{
				$list = $db->query($sql);
				return $list;
			}
			catch(Exception $e){
				die('Error:'. $e->getMessage());
			}
        }
		function afficherCoursesFree()
        {
            $sql = "SELECT * FROM courses where free=1";
            $db = config::getConnexion();
            try{
				$list = $db->query($sql);
				return $list;
			}
			catch(Exception $e){
				die('Error:'. $e->getMessage());
			}
        }

        function supprimerCourse($id)
        {
            $sql="DELETE FROM courses WHERE id=:id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Error:'. $e->getMessage());
			}
        }

        function ajouterCourse($course)
        {
			$sql="INSERT INTO courses (nom, image, category, teacher, teacher_image, free) 
			VALUES (:nom,:image,:category, :teacher, :teacher_image, :free)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'nom' => $course->getNom(),
					'image' => $course->getImage(),
					'category' => $course->getCategory(),
					'teacher' => $course->getTeacher(),
					'teacher_image' => $course->getTeacherImage(),
					'free' => $course->getFree()
				]);			
        }
        catch (Exception $e){
            echo 'Error: '.$e->getMessage();
        }	
        }

        function getCourse($id){
			$sql="SELECT * from courses where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$adherent=$query->fetch();
				return $adherent;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

        function updateCourse($course, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					"UPDATE courses SET 
						nom= :nom, 
						image= :image, 
						category= :category, 
						teacher= :teacher,
						teacher_image= :teacher_image,
						free= :free
					WHERE id=$id"
				);
				$query->execute([
					'nom' => $course->getNom(),
					'image' => $course->getImage(),
					'category' => $course->getCategory(),
					'teacher' => $course->getTeacher(),
					'teacher_image' => $course->getTeacherImage(),
					'free' => $course->getFree()
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
    }



?>