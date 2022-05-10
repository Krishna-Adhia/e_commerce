<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <?php
        include_once 'include/common.php';
        include_once 'include/header.php';
        include_once 'include/sidebar.php';
    ?>

    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                 <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <h5 class="card-header">User List</h5>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-0">OrderID</th>
                                                <th class="border-0">UserID</th>
                                                <th class="border-0">Total Amount</th>
                                                <th class="border-0">Country</th>
                                                <th class="border-0">State</th>
                                                <th class="border-0">Pincode</th>
                                                <th class="border-0">Payment_Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                include_once '../include/db_connection.php';
                                                $select = "SELECT * FROM order_details";
                                                $result = mysqli_query($connection,$select) or die(mysqli_error($connection)); 
                                                $row = mysqli_fetch_assoc($result);
                                                foreach($result as $row)
                                                {

                                            ?>
                                            <tr>
                                                <td><?php echo $row['Order_ID'];?></td>
                                                <td><?php echo $row['User_ID'];?></td>
                                                <td><?php echo $row['Cart_Total'];?></td>
                                                <td><?php echo $row['Ship_Country'];?></td>
                                                <td><?php echo $row['Ship_State'];?></td>
                                                <td><?php echo $row['Ship_ZipCode'];?></td>
                                                <td><?php echo $row['Payment_Status'];?></td>
                                            </tr>
                                            <?php
                                              }
                                            ?>
                                         </tbody>
                                    </table>
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