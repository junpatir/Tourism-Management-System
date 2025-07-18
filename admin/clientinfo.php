<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Clietinfo</title>
</head>
<style type="text/css">

	#client-table{
		max-width: 800px;
		width: 95%;
        box-shadow: 1px 5px 10px rgba(0, 0, 0, 1.3);	}

	#table th{
		border: 1px solid;
		font-weight: bold;
		text-align: center;
		background-color:#F5FBFF;
	}

	#table td{
		border: 1px solid;
		text-align: center;
		background-color: ghostwhite;
	}
	
</style>
<body>
	<?php include'navbar.php' ?>
<br><center>
	<div id="table">
<table border="1px" id="client-table">
	<h3>Client Message</h3>
	<tr>
		<th>Client Name</th>
		<th>Phone No.</th>
		<th>Email ID</th>
		<th>Message</th>
		
	</tr>

	<?php                                                            
$connection = new PDO("mysql:host=localhost;dbname=tourismmanagement", "root", "");

$query = "select * from contactus";

$statement = $connection->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

if($result)
{
	foreach($result as $row)

		echo'<tr>

	    <td>'.$row["name"].'</td>
	    <td>'.$row["phoneno"].'</td>
	    <td>'.$row["email"].'</td>
	    <td>'.$row["message"].'</td>
	    

	</tr>';
}

	 ?>
</table>	
</center>
</body>
</html>






















'