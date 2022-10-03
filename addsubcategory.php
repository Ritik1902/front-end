<!DOCTYPE html>
<html lang="en">
<?php
include('header.php');
$conn = mysqli_connect("localhost", "root", "", "shopping");
$sql = "select * from db_category";
$result = mysqli_query($conn,$sql);

if(isset($_POST['submit']))
{
    $categoryid = $_POST['categoryname'];
    $subcategoryname = $_POST['txtsubcategory'];
    $sql1 = "insert into db_subcategory(category_id, subcategory) values($categoryid, '$subcategoryname')";
    if($conn->query($sql1) === TRUE){
        echo "<script>alert('Data Inserted Successfully!')</script>";
    }
    else{
        echo "Error!".$sql1."<br>";
    }
}?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <h1 align="center">ADD SubCategory</h1>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Select Category</label>
                <?php
                while($row = mysqli_fetch_row($result)){
                ?>
                <select class="form-select" name="categoryname" aria-label="Default select example">
                    <option selected name=""> Select Category</option>
                    <option value="<?php echo $row[0]; ?>"><?php echo $row[1];?></option>
                </select>
                <?php } ?>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Enter SubCategory</label>
                <input type="text" name="txtsubcategory" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>