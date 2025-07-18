<?php 

$connection = new PDO("mysql:host=localhost;dbname=tourismmanagement","root","");

session_start();

if($_SERVER["REQUEST_METHOD"]=="POST")

{
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = "select * form loginpage where name = :username and password = :password";
	$statement = $connection->prepare($query);

	$statement->execute([
		':username' => $username,
	     ':password'=> $password
	 ]);

	$user = $statement->fetch(PDO::FETCH_ASSOC);

	if ($user)
	{
		$_SESSION['user'] = $user['name'];

		$_SESSION['show_welcome_alert'] = true;
	}

	else 
     {
        
        echo "<script>alert('Invalid username or password!'); window.location.href='navbar.php';</script>";

    }
} 

else 
{
   
    header("Location: index.php");
    exit();
}


?>

