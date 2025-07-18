<?php 

$connection = new PDO("mysql:host=localhost;dbname=tourismmanagement","root","");

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register Account</title>
</head>

<style>
	
	#reg{
		border: 1px solid;
		margin: 50px;
		max-width: 700px;
		width: 80%;
		padding: 5px;
		border-radius: 5px;
		background-color: ghostwhite;
	}

	#reg p{
      
		margin: 7px;
		font-size: 20px;
	}

	#reg input{
		padding: 10px;
		max-width: 350px;
		width: 70%;
		border-radius: 7px;
		text-align: center;
		font-size: 17px;
	}

	#reg button{
		padding: 8px;
		width: 180px;
		border-radius: 5px;
		background-color: red;
		color: white;
		font-size: 17px;
	}

	#reg button:hover{
		background-color: #FF7F7F;
		transition: 0.3s;
	}

</style>

<body>

	<?php include'navbar.php' ?>
<center>
	<div id="reg">
	<form method="POST">

		<h2>Register Account To Login</h2>

		<p>Enter Email ID:</p><input type="email" name="username" required><br><br>

		<!--inter your Email ID:<br><input type="Email" name="email" required><br>-->

		<p>Create Password:</p><input type="password" name="password" required><br><br>

		<!--confirm password:<br><input type="password" name="pasword" required><br><br>-->

		<button name="reg">Register</button><br><br>

		Already have account? <a href="index.php">Login</a> <br><br>
		
	</form>
</div>
</center>

<?php 

if (isset($_POST['reg'])) 
{
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = "insert into loginpage (username, password)values(:username, :password)";

	$statement = $connection->prepare($query);

	$statement->execute([
		':username'=> $username,
		':password'=> $password]);

	echo"<script>alert('You have successfully register');window.location.href='index.php';</script>";


}

 ?>

</body>
</html>