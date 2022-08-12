<?php
session_start();
include("connect.php");
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EDIT STUDENT PROFILE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Information Details </h4>
                        <a href="index.php" class="btn btn-danger float-end">Back</a>
                    </div>
                    <div class="card-body">
                        <?php 
                        if (isset($_GET['id'])) {
                            $student_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM user WHERE id='$student_id' ";
                            $query_run = mysqli_query($conn, $query);
                            if(mysqli_num_rows($query_run)> 0){
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                    <div class="mb-3">
                                        <label for="">Student Name</label>
                                        <p class="form-control"><?=$student['name'] ;?></p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Student Email</label>
                                        <p class="form-control"><?=$student['email'] ;?></p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Student Phone Number</label>
                                        <p class="form-control"><?=$student['phone'] ;?></p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Student Course</label>
                                        <p class="form-control"><?=$student['cousre'] ;?></p>
                                    </div>
                                
                                <?php 
                            }else {
                                echo "<h4>NO SUCH ID FOUND </h4>";
                            }
                        }
                                     ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html> 