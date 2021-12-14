<?php

/* include_once('../../Controller/ChapterC.php');

$chapterC = new ChapterC();
$id=$_GET['id'];
$res=$chapterC->afficherchapter($id);
$chapter=$res->fetchAll();*/

include('header.php');

 require '../config.php';




 $course=$_GET['id'];
echo $course;

 $sql='SELECT * FROM chapter WHERE course_id=:course';
 $statement=config::getConnexion()->prepare($sql);
 $statement->execute([':course' => $course]);
 $list=$statement->fetchAll(PDO::FETCH_OBJ);

?>

<table class="table table-bordered">
    <thead>
        <tr>

            <th>#</th>
            <th>Name</th>

            <th>Category</th>


            <th> Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>

            <?php
foreach($list as $pro){

?>

            <td> <?php echo $pro->id ?> </td>
            <td><?php echo $pro->nom ?></td>

            <td><?php echo $pro->category ?></td>
            <!-- <td><?php// echo $pro-> ?></td> -->

            <td><a class="btn btn-info" href="updatechapter.php?id='.$chapter[$i]['id'].'">Update</a> <a
                    class="btn btn-danger" href="deletechapter.php?id='.$chapter[$i]['id'].'">Delete</a></td>
            <input type="hidden" value="<?php echo $pro['id'] ?>" name="id">

            <form method="GET" action="updatechapter.php">

                <input type="hidden" value="<?php echo $pro['id'] ?>" name="id">
                <?php 
echo $course;
?>
            </form>
            </td>
            </td>
        </tr>
        <?php  } ?>
    </tbody>
</table>
</div>
<!-- /.card-body -->

</div>
<!-- /.card -->


</div>
<!-- /.col -->

</div>

</div><!-- /.container-fluid -->
</section>

<?php
  include('footer.php')



?>