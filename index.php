<?php 
session_start();
include("connect.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>STUDENT INFORMATION</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        <?php include("message.php"); ?>
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Details</h4>
                        <a href="student_create.php" class="btn btn-info float-end">Add Student</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Student Name</th>
                                    <th> Email</th>
                                    <th> Phone</th>
                                    <th> Cousre</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $query = "SELECT * FROM user ";
                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $student) {
                                        // echo 
                                        ?>
                                        <tr>
                                            <td><?php $student["id"];?></td>
                                            <td><?php $student["name"];?></td>
                                            <td><?php $student["email"];?></td>
                                            <td><?php $student["phone"];?></td>
                                            <td><?php $student["cousre"];?></td>
                                            <td>
                                                <a href="student_view.php?id=<?=$student['id'];?>" class="btn btn-info btn-sm">View</a>
                                                <a href="student_edit.php?id=<?=$student['id'];?>" class="btn btn-success btn-sm">Edit</a>
                                                <form action="code.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_student" value="<?=$student['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }else {
                                    echo "<h5>NO RECORD FOUND</h5>";
                                }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>        
         </div> 
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
