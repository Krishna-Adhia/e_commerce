<!doctype html>
<html lang="en">
 
<head>
    <title>Product</title>
    <?php
        include_once 'include/common.php';
        include_once 'include/header.php';
        include_once 'include/sidebar.php';
    ?>

    <div class="dashboard-main-wrapper">
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Concept - Bootstrap 4 Admin Dashboard Template </h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">E-coommerce</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Concept - Bootstrap 4 Admin Dashboard Template</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <?php
                                    include_once '../include/db_connection.php';
                                    $select = "SELECT * FROM product";
                                    $result = mysqli_query($connection,$select) or die(mysqli_error($connection));
                                    $row = mysqli_fetch_assoc($result);
                                    foreach($result as $row)
                                    {
                                ?>
                                <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="product-thumbnail">
                                        <div class="product-img-head">
                                            <div class="product-img">
                                                <img src="product/<?php echo $row['Product']?>" alt="" class="img-fluid"></div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-content-head">
                                                <h3 class="product-title">Name: <?php echo $row['Product_Name']; ?></h3>
                                                <div class="product-price">Price: <?php echo '$' . $row['Product_Price']; ?></div>
                                            </div>
                                            <div class="product-btn">
                                                <a href="update_product.php?Product_ID=<?php echo $row['Product_ID'];?>" class="btn btn-primary">Edit</a>
                                                <a href="con_deleteproduct.php?Product_ID=<?php echo $row['Product_ID'];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item')">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    include_once 'include/footer.php';
                ?>
            </div>
        </div>
    </div>
</body>
 
</html>