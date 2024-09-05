<?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    session_start();
    require_once "dbConnect.php";
    $student_matric = $_SESSION['matric_no'];

    if (isset($_POST['submit'])) {
        $tempFile = $_FILES['profile_pic']['tmp_name'];
        $profilename = $_FILES['profile_pic']['name'];
        $newname = time().$profilename; //1676987
        $move = move_uploaded_file($tempFile, 'uploads/images/'.$newname);
        if ($move) {
           $query = "UPDATE students_tb SET profile_dp = '$newname' WHERE matric_no = '$student_matric'";
           $querydb = $connect->query($query);
           if($query){
            header("Location: dashboard.php");
           }else{
            $_SESSION['upload_error'] = "unable to upload.";
            header("Location: dashboard.php");
           }
        }else{
            $_SESSION['upload_error'] = "unable to upload.";
            header("Location: dashboard.php");
        }
    }else{
        header("Location: dashboard.php");
    }
    





?>