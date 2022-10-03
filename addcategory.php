<!DOCTYPE html>
<html lang="en">
<?php
include('header.php');

if(isset($_POST['submit'])){
    // echo"<script>alert('heelo!')</script>";
    $category = $_POST['txtcategory'];
    $conn = mysqli_connect("localhost", "root", "", "shopping");
    if($conn->connect_error){
        echo "Not Connected!".$conn->connect_error;
    }else{
        $sql = "insert into db_category(category_name) values('$category')";
        if($conn->query($sql) === TRUE){
            echo "<script>alert('Data inserted Successfully!')</script>";
        }
        else{
            echo "Error!".$sql."<br>";
        }
    }
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" >
            <h1 align="center">ADD Category</h1>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Enter Category</label>
                <input type="text" name="txtcategory" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>