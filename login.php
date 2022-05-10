<!DOCTYPE html>
<html>
<head>
	
	<title>Login Page</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<style>
		.container{
    		margin-top: 5%;
    		margin-bottom: 5%;
		}
		.create-account{
		    padding: 5%;
		    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
		}
		.create-account h3{
		    text-align: center;
		    color: #333;
		}
		.login-form{
		    padding: 5%;
		    background: #666666;
		    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
		}
		.login-form h3{
		    text-align: center;
		    color: #fff;
		}
		.container form{
		    padding: 10%;
		}
		.btnSubmit{
    		width: 50%;
    		border-radius: 1rem;
    		padding: 1.5%;
    		border: none;
    		cursor: pointer;
		}
		.create-account .btnSubmit{
		    font-weight: 600;
		    background-color: #666666;
		    color: #ffffff;
		}
		.login-form .btnSubmit{
		    font-weight: 600;
		    background-color: #fff;
		    color: #666666;
		}
		
		p{
			color:#666666;
		}
		h4{
			color:#666666;
		}


	</style>
</head>
<body>
	<div class = "container">
		<div class = "row">
			<div class = "col-md-6 create-account">
				<form action = "signup.php">
					<div class = "form-group">
						<h4>New to our website?</h4>
						<p>Create your account here and find all the new Fashion clothes here.</p>
					</div>
					<div class="form-group">
                        <input type="submit" class="btnSubmit" value="Create Account"/>
                    </div>
				</form>
			</div>

			<div class = "col-md-6 login-form">
				<h3>Login Here</h3>
				<form action = "con_login.php" method="post">
					<div class = "form-group">
						<input type = "text" class = "form-control" placeholder="UserName" name = "UserName" required = "true">
					</div>
					<div class = "form-group">
						<input type = "password" class = "form-control" placeholder="Password" name = "UserPassword" required = "true">
					</div>
					<div class="form-group">
                       <input type="submit" class="btnSubmit" value="Login"/>
                    </div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>