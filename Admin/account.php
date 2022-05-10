<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Account</title>
    <?php
        include_once 'include/header.php'; 
    ?>
    <style>
            .bg-dark
            {
                background-color: #343a40!important;
            }
            .card 
            {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                max-width: 325px;
                margin: auto;
                text-align: center;
                font-family: arial;
                background-color: white;
            }

            .title 
            {
                color: grey;
                font-size: 18px;
            }


            button 
            {
                border: none;
                outline: 0;
                display: inline-block;
                padding: 8px;
                color: white;
                background-color: #000;
                text-align: center;
                cursor: pointer;
                width: 100%;
                font-size: 18px;
            }

            a
            {
                text-decoration: none;
                font-size: 22px;
                color: black;
            }

            button:hover, a:hover 
            {
                opacity: 0.7;
            }
        </style>

        <h2 style="text-align:center;">Admin Profile</h2>
    <div class = "container">
        <div class="card">
            <h1 style="padding-top: 20px;">Krishna Adhia</h1>
            <p class="title">CEO & Founder</p>
            <p>Harvard University</p>
            <a href = "index.php" class = "btn btn-primary">DashBoard</button></a>
        </div>
    </div>
</body>
</html>
