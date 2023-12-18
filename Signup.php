<?php
$alert=false;
if($_SERVER['REQUEST_METHOD']=='POST')
{
	
	$con=mysqli_connect("localhost:3307","root","","project");
	if(!$con)
	die ("Error!".mysqli_connect_error());
	 
   $name=$_POST['username'];
   $email=$_POST['email']; 
   $pass=$_POST['password'];
   $con_pass=$_POST['confirm_password'];
    
   if($pass==$con_pass)   {

	$exists=checkUserExists($con,$name,$email);

	if(!$exists){
     $sql="INSERT INTO user(`Name`,`Password`,`Email`,`Dt`) VALUES('$name','$pass','$email',current_timestamp())";
     $result=mysqli_query($con,$sql);
     if($result)
	 {
        $alert=true;
		// Redirect To confirmation page
		header("Location: confirmation.php");
		exit();
	 } 
	
	 else
	 	echo "Error!".mysqli_error($con);
	}
	else 
	{
		echo "User already Exists!";
	}
}
else
{
	echo "Password Do not match!";
}
	 mysqli_close($con);
     
}

function checkUserExists($con, $name, $email)
{
    $query = "SELECT * FROM user WHERE `Name` = '$name' OR `Email` = '$email'";
    $result = mysqli_query($con, $query);

    if ($result) {
        // Check the number of rows returned
        if (mysqli_num_rows($result) > 0) {
            return true; // User exists
        } else {
            return false; // User does not exist
        }
    } else {
        echo "Error checking user existence: " . mysqli_error($con);
        return false;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>SignUp Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style>
	body {
		color: #fcf9f9;
		background: #20c2a2;
		font-family: 'Roboto', sans-serif;
	}
	.form-control, .form-control:focus, .input-group-addon {
		border-color: #e1e1e1;
	}
    .form-control, .btn {        
        border-radius: 3px;
    }
	.signup-form {
		width: 390px;
		margin: 0 auto;
		padding: 30px 0;
	}
    .signup-form form {
		color: #aba6a6;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #fff;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.signup-form h2 {
		color: #333;
		font-weight: bold;
        margin-top: 0;
    }
    .signup-form hr {
        margin: 0 -30px 20px;
    }
	.signup-form .form-group {
		margin-bottom: 20px;
	}
	.signup-form label {
		font-weight: normal;
		font-size: 13px;
	}
	.signup-form .form-control {
		min-height: 38px;
		box-shadow: none !important;
	}	
	.signup-form .input-group-addon {
		max-width: 42px;
		text-align: center;
	}
	.signup-form input[type="checkbox"] {
		margin-top: 2px;
	}   
    .signup-form .btn{        
        font-size: 16px;
        font-weight: bold;
		background: #19aa8d;
		border: none;
		min-width: 140px;
    }
	.signup-form .btn:hover, .signup-form .btn:focus {
		background: #179b81;
        outline: none;
	}
	.signup-form a {
		color: #fff;	
		text-decoration: underline;
	}
	.signup-form a:hover {
		text-decoration: none;
	}
	.signup-form form a {
		color: #19aa8d;
		text-decoration: none;
	}	
	.signup-form form a:hover {
		text-decoration: underline;
	}
	.signup-form .fa {
		font-size: 21px;
	}
	.signup-form .fa-paper-plane {
		font-size: 18px;
	}
	.signup-form .fa-check {
		color: #fff;
		left: 17px;
		top: 18px;
		font-size: 7px;
		position: absolute;
	}
	
	h1 {
		text-align: center;
  --s: 0.1em;   /* the thickness of the line */
  --c: rgb(210, 71, 103); /* the color */
  
  color: rgb(197, 56, 155) ;
  padding-bottom: var(--s);
  background: 
    linear-gradient(90deg,var(--c) 50%,#000 0) calc(100% - var(--_p,0%))/200% 100%,
    linear-gradient(var(--c) 0 0) 0% 100%/var(--_p,0%) var(--s) no-repeat;
  -webkit-background-clip: text,padding-box;
          background-clip: text,padding-box;
  transition: 0.75s;
}
h1:hover {--_p: 100%}

h1 {
  font-family: system-ui, sans-serif;
  font-size: 5rem;
  cursor: pointer;
}

</style>
</head>
<body>
	<?php 
	if($alert)
	{
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Hola!</strong> You have Signed Up Successfully.Please Login.
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div> ';
	}

	
?>
	<h1>WELCOME TO SIGNUP PAGE</h1>
<div class="signup-form">
    <form action="Signup.php" method="POST">
		<h2>Sign Up</h2>
		<p>Please fill in this form to create an account!</p>
		<hr>
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				<input type="text" class="form-control" id="U" 
				name="username" placeholder="Username" required="required">
			</div>
        </div>
        <div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
				<input type="email" class="form-control" name="email" placeholder="Email Address" required="required">
			</div>
        </div>
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
				<input type="password" id="P" class="form-control" name="password" placeholder="Password" required="required">
			</div>
        </div>
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon">
					<i class="fa fa-lock"></i>
					<i class="fa fa-check"></i>
				</span>
				<input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
			</div>
        </div>
        <div class="form-group">
			<label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
		</div>
		<div class="form-group">
            <input type="submit" class="btn btn-primary btn-lg" value="Sign Up" name="sub1">
        </div>
		<!-- <div class="tooltip-container">
			<div class="tooltip">Password requirements: <br> - At least 8 characters <br> - At least one uppercase letter <br> - At least one lowercase letter <br> - At least one digit <br> - At least one special character</div>
		  </div>
		   -->
		  <!-- <script>
	document.addEventListener("DOMContentLoaded",function() {
	// Get the password and username input fields and the tooltip element
const passwordInput = document.getElementById('P'); // Replace with your input field's actual ID
const usernameInput = document.getElementById('U'); // Replace with your input field's actual ID
const tooltip = document.querySelector('.tooltip');

// Show the tooltip when hovering over the password input
passwordInput.addEventListener('mouseenter', () => {
  tooltip.style.display = 'block';
});

// Hide the tooltip when moving the mouse away from the password input
passwordInput.addEventListener('mouseleave', () => {
  tooltip.style.display = 'none';
});

// Similarly, you can add event listeners for the username input as well
usernameInput.addEventListener('mouseenter', () => {
  tooltip.style.display = 'block';
});

usernameInput.addEventListener('mouseleave', () => {
  tooltip.style.display = 'none';
});

	});
</script> -->
    </form>
	<div class="text-center">Already have an account? <a href="Login.php">Login here</a></div>   
</div> 		


</body>
</html>