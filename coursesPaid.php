<?php
include_once('header.php');
$courseC = new CourseC();
$cources = $courseC->afficherCoursesPaid()->fetchAll();



?>


<section id="courses-part" class="pt-120 pb-120 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="courses-top-search">
                    <ul class="nav float-left" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="active" id="courses-grid-tab" data-toggle="tab" href="#courses-grid" role="tab" aria-controls="courses-grid" aria-selected="true"><i class="fa fa-th-large"></i></a>
                        </li>
                        <li class="nav-item">
                            <a id="courses-list-tab" data-toggle="tab" href="#courses-list" role="tab" aria-controls="courses-list" aria-selected="false"><i class="fa fa-th-list"></i></a>
                        </li>
                        <li class="nav-item">Showning 4 0f 24 Results</li>
                    </ul> <!-- nav -->
                    
                    <div class="courses-search float-right">
                        <form action="#">
                            <input type="text" placeholder="Search">
                            <button type="button"><i class="fa fa-search"></i></button>
                        </form>
                    </div> <!-- courses search -->
                </div> <!-- courses top search -->
            </div>
        </div> <!-- row -->
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="courses-grid" role="tabpanel" aria-labelledby="courses-grid-tab">
                <div class="row">
                <?php 
                            for ($i=0; $i <count($cources); $i++) {
                                
                        
                        ?>
                    <div class="col-lg-4 col-md-6">
                        
                         <div class="singel-course mt-30">
                            <div class="thum">
                                <div class="image">
                                    <img src="images/course/<?php echo $cources[$i]['image'];?>" alt="Course">
                                </div>
                                <div class="price">
                                    <span><?php if($cources[$i]['free']==0){echo "Paid"; } ?></span>
                                </div>
                            </div>
                            <div class="cont">
                                <ul>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                                <span>(20 Reviws)</span>
                                <a href="#"><h4><?php echo $cources[$i]['nom']  ?>
                                </h4></a>
                                <div class="course-teacher">
                                    <div class="thum">
                                        <a href="#"><img src="images/course/teacher/<?php echo $cources[$i]['teacher_image']; ?>" alt="teacher"></a>
                                    </div>
                                    <div class="name">
                                        <a href="#"><h6><?php echo $cources[$i]['teacher']; ?></h6></a>
                                    </div>
                                    <div class="admin">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-user"></i><span>31</span></a></li>
                                            <li><a href="#"><i class="fa fa-heart"></i><span>10</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                            
                         <!-- singel course -->
                    </div>
                    <?php 
                            }
                            ?>
                    
                    
                </div>
          </div>
        </div>
    </div>
    </section>
    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

    <?php
include_once('footer.php');



?>