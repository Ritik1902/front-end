<?php
include('header.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
            <h1 align="center">ADD PRODUCT</h1>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" name="txtproduct" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter Name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Select Category</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Select Category</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Select SubCategory</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Select SubCategory</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <!-- <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div> -->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Product Detail</label>
                <textarea class="form-control" name="txtdetails" placeholder="Enter Product Details"
                    id="floatingTextarea"></textarea>
                <!-- <label for="floatingTextarea">Comments</label> -->
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-6">
                        <label for="formFile" class="form-label">Price</label>
                        <input class="form-control" placeholder="Enter Price" type="number" id="formFile">
                    </div>
                    <div class="col-6">
                        <label for="formFile" class="form-label">Photo</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                </div>

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>