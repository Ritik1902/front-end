<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registration</title>
</head>
<body>
    <div class="container">
        <div class="contain">
            <div class="form-regis">
                <h1 align="center">Registration</h1>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Name</label>
                        <input type="text" name="txtname" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="txtemail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="txtpass" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mobile No</label>
                        <input type="number" name="txtnumber" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Photo</label>
                        <input class="form-control" name="photo" type="file" id="formFile">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Type</label>
                        <input type="text" name="txtuser" value="customer" class="form-control" id="exampleInputPassword1">
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    <a href="index.php">Already have account?</a>
                </form>
            </div>
        </div>
    </div>
</body>
<?php


if(isset($_POST['submit']))
{
    $conn = mysqli_connect("localhost", "root", "", "shopping");
    if($conn->connect_error)
    {
        echo "Not Connected Successfully!".$conn->connect_error;
    }    
    else{
        $name = $_POST['txtname'];
        $email = $_POST['txtemail'];
        $pass = $_POST['txtpass'];
        $contact = $_POST['txtnumber'];
        $type = $_POST['txtuser'];
        $filename = $_FILES["photo"]["name"];
        $size = $_FILES["photo"]["size"];
       
        $basename = substr($filename,0,strpos($filename,'.'));
        $ext  = substr($filename,strripos($filename,'.'));
        $allowed_array = array(".pdf", ".png", ".gif");
        $tmpname = $_FILES["photo"]["tmp_name"];
        if(in_array($ext,$allowed_array) && $size<2000000)
        {
            $newfilename = md5($basename).rand(50,500).$ext;
            if(file_exists("upload/".$newfilename))
            {
                echo "<script>alert('file is already exits')</script>";
            }
            else{
                move_uploaded_file($tmpname, "upload/".$newfilename);
            }
        }
        elseif(empty($basename)){
                echo "<script>alert('please select  file!')</script>";
            }
        elseif($ext === "jpg")
        {
            echo "<script>alert('please select valid file!')</script>";
        }
        
        $query = "insert into db_registration(name, email, password, contact, photo,type) values('$name', '$email', '$pass', $contact, '$newfilename','$type')";
       if($conn->query($query) === TRUE)
        {
            echo "<script>alert('Record inserted Successfully')</script>";
        }
        else{
            echo "Error!".$sql."<br>";
        }

        
        // echo $type;
        // echo $name,$email,$pass,$contact;
    }
}

?>
</html>