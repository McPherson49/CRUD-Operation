<?php 
session_start();

// STUDENT CREATE

require("connect.php");
if(isset($_POST["save_student"])) {
 
    $name = mysqli_real_escape_string($conn ,$_POST["name"]);
    $email = mysqli_real_escape_string($conn ,$_POST["email"]);
    $phone = mysqli_real_escape_string($conn ,$_POST["phone"]);
    $cousre = mysqli_real_escape_string($conn ,$_POST["cousre"]);

    // INSERTING INTO MY DATABASE
    $sql = "INSERT INTO user (name, email, phone,	cousre) 
    VALUES ('$name', '$email', '$phone', '$cousre')";

    $query_run = mysqli_query($conn, $sql);


    if($query_run){
        $_SESSION["message"] = "Student Created Sucessfully";
        header("location: student_create.php");
        exit;
    }else{
        $_SESSION["message"] = "Student Not Created ";
        header("location: student_create.php");
        exit;
    }
}

// STUDENT EDIT
if (isset($_POST["update_student"])) {
    $student_id = mysqli_real_escape_string($conn ,$_POST["student_id"]);
    $name = mysqli_real_escape_string($conn ,$_POST["name"]);
    $email = mysqli_real_escape_string($conn ,$_POST["email"]);
    $phone = mysqli_real_escape_string($conn ,$_POST["phone"]);
    $cousre = mysqli_real_escape_string($conn ,$_POST["cousre"]);

    // UPDATING MY DATABASE
    $sql = "UPDATE user SET name='$name', email='$email', phone='$phone', cousre='$cousre' 
                WHERE id='$student_id'";

    $query_run = mysqli_query($conn, $sql);

    if($query_run){
        $_SESSION["message"] = "Student Sucessfully Updated";
        header("location: index.php");
        exit;
    }else{
        $_SESSION["message"] = "Student Not Updated ";
        header("location: index.php");
        exit;
    }
    
}

// DELETING FROM MY DATABASE
if (isset($_POST['delete_student'])) {
    $student_id = mysqli_real_escape_string($conn, $_POST['delete_student']); 

    $sql = "DELETE FROM user WHERE id='$student_id'";
    $query_run = mysqli_query($conn, $sql);

    if($query_run){
        $_SESSION["message"] = "Student Deleted Sucessfully ";
        header("location: index.php");
        exit;
    }else{
        $_SESSION["message"] = "Student Not Deleted ";
        header("location: index.php");
        exit;
    }
}

?>



