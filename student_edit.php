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
        <?php 
        include("message.php");
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Edit</h4>
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

                                <form action="code.php" method="post">
                                    <input type="hidden" name="student_id" value="<?=$student['id'] ;?>">
                                    <div class="mb-3">
                                        <label for="">Student Name</label>
                                        <input type="text" class="form-control" value="<?=$student['name'] ;?>" name="name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Student Email</label>
                                        <input type="email" class="form-control" name="email" value="<?=$student['email'] ;?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Student Phone Number</label>
                                        <input type="text" class="form-control" name="phone" value="<?=$student['phone'] ;?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Student Course</label>
                                        <input type="text" class="form-control" name="cousre"value="<?=$student['cousre'] ;?>"  required>
                                    </div>
                                    <div class="mb-4">
                                        <button type="submit" class="btn btn-primary" name="update_student">Update Student Info</button>
                                    </div>
                                </form>  
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