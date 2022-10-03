<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="container-fluid">
        <div class="form">
            <h1 align="center">Login</h1><br>
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name = "txtname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name = "txtpass" class="form-control" id="exampleInputPassword1">
                </div>
                <!-- <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> -->
                <br>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <a href="registration.php">Do you have account?</a>
            </form>
        </div>
    </div>
</body>
<?php
session_start();
if(isset($_POST['submit']))
{
   $name = $_POST['txtname'];
   $pass = $_POST['txtpass'];
   $conn = mysqli_connect("localhost", "root", "", "shopping");
   if($conn->connect_error)
   {
    echo "Not connected".$conn->connect_error;
   }
   else{
    $sql = "select * from db_registration where email = '$name' and password = '$pass'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($result);
//    print_r($row);
    $count = mysqli_num_rows($result);
    if($count == 1)
    {
        $_SESSION['id'] = $row[0];
        $_SESSION['username'] = $name;
        $_SESSION['pass'] = $pass;
        $_SESSION['type'] = $row[6];
       echo "<script>alert('Welcome to admin side')</script>";
        header('Location:dashboard.php');
    }else
    {
        echo "<script>alert('please enter valid id password')</script>";
    }
    
   }
}
   

?>
</html>