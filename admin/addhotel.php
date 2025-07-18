<?php 

$connection = new PDO("mysql:host=localhost;dbname=tourismmanagement","root","");

 ?>

 <?php 

if(isset($_POST['submit']))
{

	$id = $_POST['id'];
	$hotelname = $_POST['hotelname'];
	$location = $_POST['location'];
	$price = $_POST['price'];
	$image_name= $_POST['existing_image'];

  if(!empty($_FILES['image']['name']))
  {
  	$image = $_FILES['image'];

  	$image_name = $image['name'];

  	$image_tmp_name = $image['tmp_name'];
  	
  	$image_destination = '../uploads/' . $image_name;

  	move_uploaded_file($image_tmp_name, $image_destination);
  }

  if(!empty($id))
  {

	$query = "update hotel set hotelname = :hotelname, location = :location, price = :price, image = :image where id = :id";

	$statement = $connection->prepare($query);

	$statement ->execute([
		':id' => $id,
		':hotelname' => $hotelname,
		':location' => $location,
		':price' => $price,
		':image' => $image_name
	]);

 echo "<script>alert('Hotel updated successfully'); window.location.href='addhotel.php';</script>";
    } 
   else 
    {
      
        $query = "INSERT INTO hotel (hotelname, location, price, image) VALUES (:hotelname, :location, :price, :image)";

        $statement = $connection->prepare($query);

        $statement->execute([
            ':hotelname' => $hotelname,
            ':location' => $location,
            ':price' => $price,
            ':image' => $image_name
        ]);
        
        echo "<script>alert('Hotel added successfully'); window.location.href='addhotel.php';</script>";
    }
}


if (isset($_POST['remove'])) 
{
	$query = "delete from hotel where id = :id";

	$statement = $connection->prepare($query);

	$statement->execute(array(':id'=>$_POST['id']));

	echo"<script>alert('hotel removed');</script>";
}

  ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Hotel</title>
</head>

<link rel="stylesheet" type="text/css" href="style.css">

<style>

    #hotel button:hover{
        background-color: #FFB09C;
        transition: 0.8s;

    }

    #book-room{
        border: 1px solid;
        margin: 30px;
        max-width: 700px;
        width: 70%;
        background-color: ghostwhite;

    }
    
    #book-room input{
        max-width: 350px;
        width: 60%;
        height: 35px;
        font-size: 17px;
        text-align: center;
        border-radius: 5px;
    }

      #book-room button{
        background-color: red;
        margin: 25px;
        color: white;
        padding: 5px;
        border-radius: 5px;

      }

      #book-room button:hover{
        background-color: #FFB09C;
        transition: 0.8s;
      }

      #book-room select{
        max-width: 350px;
        width: 60%;
        height: 35px;
        font-size: 17px;
        text-align: center;
        border-radius: 5px;
    }

    #hoteltable{
        border: 1px solid;
        max-width: 600px;
        width: 70%;
        text-align: center;
       
    }

	#hoteltable th{
		border: 1px solid;
	}

	#hoteltable td{
		border: 1px solid;
        padding: 5px;
	}

    #hoteltable button{
        background-color: red;
        color: white;
        border-radius: 5px;
        border: 1px solid black;
        margin:3px;
        padding: 10px;
    }

    #hoteltable button:hover{
        background-color: #FFB09C;
        transition: 0.8s;
      }



</style>

<body>

	<?php include 'navbar.php' ?><br><br>

<center>
	<div id="hotel">

		<form method="post" enctype="multipart/form-data">

			<h2 id="form-title">Add Here Hotel</h2>

			 <input type="hidden" name="id" id="hotel-id">

       <input type="hidden" name="existing_image" id="existing-image">


			Hotel Name:<br>
			<input type="text" name="hotelname" id="hotelname"><br>

			Hotel Location:<br>
			<input type="text" name="location" id="location"><br>

			Hotel Price<br>
			<input type="text" name="price" id="price"><br>

			Image:<br>
			<input type="file" name="image" id="image" accept="image/*">

			<br><button name="submit" id="submit-button">Add</button><br>

		</form><br>

	</div><br>
</center>

<center>
<div id="tab">
	<table border="1px"  id="hoteltable">
		<tr>
			<th>Slno</th>
			<th>Hotel Name</th>
			<th>Location</th>
			<th>Price</th>
			<th>Image</th>
			<th>Action</th>
		</tr>
       
       <?php 

      $query = "select * from hotel";

      $statement = $connection->prepare($query);

      $statement->execute();

      $result = $statement->fetchAll();

      foreach($result as $row)

      	echo'<tr>

      <td>'.$row["id"].'</td>
      <td>'.$row["hotelname"].'</td>
      <td>'.$row["location"].'</td>
      <td>'.$row["price"].'</td>
      <td><img src="../uploads/'.$row["image"].'" width="100"</td>

      <td>
       
       <button onclick="edit('.$row["id"].', \''.$row["hotelname"].'\', \''.$row["location"].'\', \''.$row["price"].'\', \''.$row["image"].'\')">Edit</button>

       <form method="post">

       <input type="hidden" name="id" value="'.$row["id"].'">

       <button type="submit" name="remove" onclick="return confirm(\'are you sure you want to remove ?\')">cancel</button>

       </form> 
   
      </td>

      </tr>';

  
        ?>

	</table>
</div>
</center>

<script>
function edit(id, hotelname, location, price, image) {
    document.getElementById('form-title').innerText = 'Update Hotel';
    document.getElementById('hotel-id').value = id;
    document.getElementById('hotelname').value = hotelname;
    document.getElementById('location').value = location;
    document.getElementById('price').value = price;
    document.getElementById('existing-image').value = image;

    document.getElementById('submit-button').innerText = 'Update';
}
</script>

<center>
<div id="book-room">

<form method="post">

	<h2>Book Your Room </h2>
     
     Name(Guest):<br>
     <input type="text" name="name" id="gname"><br><br>

     Mobile No.:<br>
     <input type="text" name="mobile" id="mobileno"><br><br>

     Hotel Name:<br>
     
     <select name="hotelname" id="hotel">

            <option value="">-- Select Package --</option>

            <?php 
            $query = "SELECT * FROM hotel";

            $statement = $connection->prepare($query);

            $statement->execute();

            $packages = $statement->fetchAll(PDO::FETCH_ASSOC);

           $selected_package = isset($_POST['hotelname']) ? $_POST['hotelname'] : '';

foreach ($packages as $package) {
    $selected = ($selected_package == $package['hotelname']) ? 'selected' : '';
    echo '<option value="' . htmlspecialchars($package['hotelname']) . '" ' . $selected . '>' . htmlspecialchars($package['hotelname']) . '</option>';
}

$location = '';
$price = '';
if ($selected_package != '') {
    foreach ($packages as $package) {
        if ($package['hotelname'] == $selected_package) {
            $location = $package['location'];
            $price = $package['price'];
            break;
        }
    }
}
            ?>
        </select><br><br>

     Location:<br>
<input type="text" name="location" id="hotel-location"><br><br>

Price:<br>
<input type="text" name="price" id="hotel-price"><br><br>


     Room Type<br>
     <select name="rtype" id="Roomtype">
         <option>Deluxe</option>
         <option>Standard</option>
         <option>Semi-Deluxe</option>
     </select><br><br>
     <!--<input type="text" name="rtype"><br><br>-->

     Number Of Guest:<br>
     <input type="number" name="noguest" id="guest"><br><br>

     Checkin Date<br>
     <input type="date" name="checkin" id="checkindate"><br><br>

     Checkout Date<br>
     <input type="date" name="checkout" id="checkoutdate"><br>

     <button type="submit" name="bookroom">Confirm Booking</button>
 
	</form>
</div>
</center>

<script>
    const hotelData = <?php echo json_encode($packages); ?>;

    document.querySelector('select[name="hotelname"]').addEventListener('change', function() {
        const selectedHotel = this.value;
        const hotel = hotelData.find(h => h.hotelname === selectedHotel);
        if (hotel) {
            document.getElementById('hotel-location').value = hotel.location;
            document.getElementById('hotel-price').value = hotel.price;
        } else {
            document.getElementById('hotel-location').value = '';
            document.getElementById('hotel-price').value = '';
        }
    });

    // Auto-trigger once on page load if a hotel is already selected
    window.addEventListener('DOMContentLoaded', function() {
        const event = new Event('change');
        document.querySelector('select[name="hotelname"]').dispatchEvent(event);
    });
</script>

<?php 

if(isset($_POST['bookroom']))
{

    $name = $_POST['name'];
    $mobile =$_POST['mobile'];
    $hotelname =$_POST['hotelname'];
    $location =$_POST['location'];
    $rtype =$_POST['rtype'];
    $price =$_POST['price'];
    $noguest =$_POST['noguest'];
    $checkin =$_POST['checkin'];
    $checkout =$_POST['checkout'];
    $status = 'confirm';

   $query = "insert into bookhotel(name, mobile, hotelname, location, rtype, noguest, price,  checkin, checkout, status)values(:name, :mobile, :hotelname, :location, :rtype, :noguest, :price, :checkin, :checkout, :status)";

    $statement = $connection->prepare($query);

    $statement->execute([
        ':name' => $name,
        ':mobile' => $mobile,
        ':hotelname' => $hotelname,
        ':location' => $location,
        ':rtype' => $rtype,
        ':noguest' => $noguest,
        ':price' => $price,
        ':checkin' => $checkin,
        ':checkout' => $checkout,
        ':status' => $status
    ]);

    echo"<script>alert('you have booked successfully Send');window.location.href='addhotel.php?id=$id';</script>";
}

 ?>

</body>
</html>