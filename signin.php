<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/sign-in.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <main class="form-signin w-100 m-auto border rounded">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <img class="mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
            <input type="text" class="form-control my-2" name="matric" placeholder="matric number">
            <label for="floatingInput">matric number</label>
            </div>
            <div class="form-floating">
            <input type="password" class="form-control" name="passwrd" placeholder="Password">
            <label for="floatingPassword">password</label>
            </div>

            <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Remember me
            </label>
            </div>
            <button type="submit" name="submit" class="btn btn-primary w-100 py-2">Sign in</button>
            <p class="mt-5 mb-3 text-body-secondary">ab_school&copy;2024</p>
        </form>
    </main>

    <?php
        error_reporting( E_ALL);
        ini_set( "display_errors", 1 );
        session_start();
        require_once "dbConnect.php" ; 
        if (isset($_POST['submit'])) {
            $matric = $_POST['matric'];
            $passwd = $_POST['passwrd'];

            if($matric == "" || $passwd == ""){
                echo "<div class='alert alert-danger text-center'>
                    input field mustnt be empty</div>";
            }

            $checkdata = "SELECT matric_no, passwd FROM students_tb WHERE matric_no = '$matric'";
            $check = $connect->query($checkdata);
            $fetchdata = $check->fetch_assoc();
            $hashedpassword = $fetchdata['passwd'];
            $user_matric = $fetchdata['matric_no'];
            if ($user_matric && password_verify($passwd, $hashedpassword)){
                $_SESSION['matric_no'] = $fetchdata['matric_no'];
                $_SESSION['passwd'] = $fetchdata['passwd'];
                header("Location: dashboard.php");
            }else {
                echo "<div class='alert alert-danger text-center'>Incorrect matric number/password</div>";
            }
            

        }

    ?>


<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>