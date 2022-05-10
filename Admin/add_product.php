<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add Product</title>
    <?php
        include_once 'include/header.php';
        include_once 'include/sidebar.php'; 
    ?>


    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section-block" id="basicform">
                        <h3 class="section-title">Add Product</h3>
                    </div>

                    <div class="card">
                        <h5 class="card-header">Add Product</h5>
                        <div class="card-body">
                            <form action = "con_addproduct.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="file" name="product">
                                </div>

                                <div class="form-group">
                                    <label for="input-select">Product Gender</label>
                                    <select class="form-control" name = "ProductGender">
                                        <option>Male</option>
                                        <option>Female</option>
                                     </select>
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword">Product Price</label>
                                    <input type="text" placeholder="Price" class="form-control" name = "ProductPrice">
                                </div>

                                 <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-block" name = "submit" value = "Add Product">
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