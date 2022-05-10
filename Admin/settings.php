<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Settings</title>
    <?php
        include_once 'include/header.php'; 
    ?>
    <script>
            function myFunction()
            {
                alert("Are you sure, you want change your password?");
            }
        </script>

        <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-form">
                    <form action="con_changepassword.php" method="POST">
                        <div class="form-group">
                            <input type="hidden" name="Admin_Name" value="<?php echo $_SESSION['Admin_Name']; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" name="OldPassword" class="form-control" placeholder="OldPassword" required>
                        </div>
                        
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" name="NewPassword" class="form-control" placeholder="NewPassword"required = "true">
                        </div>
                        
                          <div class="form-group">
                             <label>Confirm Password</label>
                              <input type="password" name="ConfirmPassword" class="form-control" placeholder="ConfirmPassword" required>
                          </div>
                                <button type="submit" ID="submit" class="btn btn-primary" name="Submit" onclick="myFunction()">Set Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>
</html>