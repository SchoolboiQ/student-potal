<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
<body>
  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="container w-50 my-4">
    <?php 
      // session_start();
      // print_r($_SESSION);
      // if (isset($_SESSION['signup_error'])) {
      //   echo " <div class='alert alert-danger'>". $_SESSION['signup_error']."</div>";
      // }
      // session_destroy();
    ?>
    <div class="mb-3 border rounded">
      <!-- <label for="Email" class="form-label">Email address</label> -->
      <h1 class="text-center fs-4">sign up</h1>
      <input type="text" name="firstname" class="form-control m-2" placeholder="Enter Firstname">
      <input type="text" name="middlename" class="form-control m-2" placeholder="Enter Middlename">
      <input type="text" name="surname" class="form-control m-2" placeholder="Enter Surname">
      <input type="email" name="Email" class="form-control m-2" placeholder="Enter Email">
      <input type="number" name="phone_no" class="form-control m-2" placeholder="Enter Phone No">
      <input type="text" name="address" class="form-control m-2" placeholder="Enter Address">
      <div class="text-center my-2">
        <button type="submit" name="submit" class="btn btn-primary w-25">Submit</button>
      </div>
    </div>
  </form>

  <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    require_once "dbConnect.php"; 

    if (isset($_POST["submit"])) {
      $firstname = $_POST['firstname'];
      $middlename = $_POST['middlename'];
      $surname = $_POST['surname'];
      $mail = $_POST['Email'];
      $contact_address = $_POST['address'];
      $phone_no = $_POST['phone_no'];
      $generate_passwd = mt_rand(10000, 20000);
      $generate_matricno = mt_rand(1000000, 2000000);

      $hashpasswd = password_hash($generate_passwd, PASSWORD_DEFAULT);

      $query = "INSERT INTO students_tb(`firstname`, `middlename`, `surname`, `email`, `contact_address`, `phone_no`, `passwd`, `matric_no`)
      VALUES('$firstname', '$middlename', '$surname', '$mail', '$contact_address' , '$phone_no', '$hashpasswd', '$generate_matricno')";
      $insert = $connect->query($query);
      if ($insert){
        echo "Registration Completed". $generate_passwd;
        // header("Location: signin.php");
      }else{
        // echo "An error Occurred";
        header("Location: signup.php");
        // $_SESSION["signup_error"] = "Email Already Exist!";
      }

    }


  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>