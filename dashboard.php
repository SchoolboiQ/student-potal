<?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    session_start();
    require_once "dbConnect.php";
    $student_matric = $_SESSION['matric_no'];
    $query = "SELECT matric_no, firstname, profile_dp FROM students_tb WHERE `matric_no` = '$student_matric'";
    $checkdata = $connect->query($query);
    $user = $checkdata->fetch_assoc();
    print_r($user);
    $user_matric = $user['matric_no'];
    $student_name = $user['firstname'];
    // $student_dp = $user['profile_dp'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container shadow p-5">
        <div class="row">
            <div class="col-6 mx-auto shadow p-5">
                Welcome, <?php echo $user['firstname']; ?>
            </div>
            <img src="<?php echo "uploads/images".$user['profile_dp']; ?>" alt="">
            <form action="profile_upload.php" enctype="multipart/form-data" method="post">
                <input type="file" name="profile_pic" accept="image/*">
                <input type="submit" name="submit" value="upload profile" class="btn btn-dark">
            </form>
        </div>
        <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary me-md-2" type="button">Button</button>
            <button class="btn btn-primary" type="button">Button</button>
        </div> -->
    </div>

</body>
</html>