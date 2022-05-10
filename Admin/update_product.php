<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Update Product</title>
    <?php
        include_once 'include/header.php';
        include_once 'include/sidebar.php'; 
    ?>


    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section-block" id="basicform">
                        <h3 class="section-title">Edit Product</h3>
                    </div>
                    <?php
                        include_once '../include/db_connection.php';
                        $Product_ID = $_GET['Product_ID'];
                        $select = "SELECT * FROM product WHERE Product_ID = $Product_ID";
                        $result = mysqli_query($connection,$select) or die(mysqli_error($connection));
                        $row = mysqli_fetch_assoc($result);
                    ?>
                    <div class="card">
                        <h5 class="card-header">Edit Product</h5>
                        <div class="card-body">
                            <form action = "con_updateproduct.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="inputEmail">Product ID</label>
                                    <input type="text" class="form-control" name = "ProductID" value = "<?php echo $row['Product_ID'];?>" readonly = "true">
                                </div>

                                <div class="form-group">
                                    <input type="file" name="product">
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail">Product Name</label>
                                    <input type="text" class="form-control" name = "ProductName" value="<?php echo $row['Product_Name'];?>">
                                </div>

                                <div class="form-group">
                                    <label for="input-select">Product Gender</label>
                                    <select class="form-control" name = "ProductGender">
                                        <?php
                                            if($row['Product_Gender'] == 'Male')
                                            {
                                                $selected = 'Male';
                                            }
                                            else
                                            {
                                                $selected = 'Female';
                                            }
                                        ?>

                                        <option <?php if($row['Product_Gender'] == 'Male') echo 'selected="selected"'; ?>>Male</option>
                                        <option <?php if($row['Product_Gender'] == 'Female') echo 'selected="selected"'; ?>>Female</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword">Product Price</label>
                                    <input type="text" placeholder="Price" class="form-control" name = "ProductPrice" value="<?php echo $row['Product_Price']?>">
                                </div>

                                 <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-block" name = "submit" value = "Update Product">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>