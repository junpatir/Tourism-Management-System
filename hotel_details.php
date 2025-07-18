<?php

$connection = new PDO("mysql:host=localhost;dbname=tourismmanagement", "root", "");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotel Booking</title>
</head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">


<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


<style>

    .navbar {
      background-color: floralwhite;
      font-size: 20px;
      position: sticky;
      z-index: 1000;/*by using this css content flow under the navbar*/      
      top: 0;

    }

      .container ul li a{
         color: black;
         text-decoration: none;
         padding: 15px;
         
      }

    .navbar .nav-link {
        color: black;
        
        position: relative;
        text-decoration: none;
        font-size: 15px; 

    }

    .navbar .nav-link::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -2px;
        width: 0%;
        height: 2px;
        background-color: black;
        transition: width 0.5s ease-in-out; 
    }

    .navbar .nav-link:hover::after {
        width: 100%;
    }


	@media(max-width:100px){
		#image-detail img{
			height: 300px;
		}
	}
  

#image-detail{
	position: relative;
    max-width: 100%;
    /*overflow: hidden;*/
    display: flex;
    flex-wrap: wrap;
} 
	
#image-detail img {
    width: 100%;
    height: auto;
    max-height: 580px;
    object-fit: cover;
}


.detail-info {
    padding: 30px 50px;  
    color: white;
    width: 100%;
    position: absolute;
    top: 100px;        
    left: 100px;      
}


.detail-info h2,
.detail-info p {
    margin: 0;
    padding: 5px 0;
    font-size: 24px;
    word-wrap: break-word;
}

.detail-info p {
    font-size: 18px;
}

@media (max-width: 768px) {
    .detail-info h2 {
        font-size: 20px;
    }

    .detail-info p {
        font-size: 16px;
    }
}



/*.detail-info {
    padding: 40px 100px;
    position: relative;
    height: 0;

}

.detail-info h2{
	color: white;
	position: relative;
	top: -650px;
	font-size: 30px;
	margin-top: 30px;
	padding: 100px;
}

.detail-info p{
	color: whitesmoke;
	position: relative;
	top: -730px;
	font-size: 30px;
	word-break: break-word;
	left: 100px;
	line-height: 0.9;    
    margin-bottom: 15px;

}

@media (max-width: 768px) {
    .detail-info p {
        font-size: 23px;
    }
}


/*@media{
    .detail-info h2{
        left: -28px;
        color: white;
        text-align: justify;
    }
}*/

 #book{
        width: 50%;
        max-width: 400px;
        height: 40px;
        padding: 5px;
        text-align: center;
        background-color: #0041C2;
        border-radius: 8px;
        top: 30px;
        position: relative;
        margin:10px;
        
    }

    
    #book a{
        text-decoration: none;
        font-size: 20px;
        font-weight: bold;
        color: white;
        padding: 10px;

        
    }
 #book:hover{
    background-color: #1E90FF;
    transition: 0.5s;
 }

 #Home{
        width: 80%;
        max-width: 400px;
        height: 40px;
        padding: 5px;
        text-align: center;
        background-color: #0041C2;
        border-radius: 8px;
        top: -680px;
        position: relative;
        margin:10px;
        left: 75px;        
}
     
    #Home a{
        text-decoration: none;
        font-size: 20px;
        font-weight: bold;
        color: white;
        
    }
 #Home a:hover{
    background-color: #1E90FF;
    transition: 0.5s;
 } 

  .modal-overlay {
  position: fixed;
  top: 55px;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.6); /* semi-transparent black */
  display: none;
  justify-content: center;
  align-items: center;
  z-index: 99999;
  overflow: auto; 
  padding: 20px;
  box-sizing: border-box;
}

.modal-box {
  position: relative;
  background: #fff;
  padding: 30px;
  border-radius: 10px;
  width: 90%;
  max-width: 500px;
  text-align: left;
  font-size: 18px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
  margin: auto;


}

    .close-btn {
      position: absolute;
      top: 10px;
      right: 15px;
      font-size: 30px;
      cursor: pointer;
      color: #888;     
     
    }

    .close-btn:hover {
      color: #000;
      
    }

.modal-box input {
  width: 100%;
  padding: 10px;
  margin: 10px 0;
  font-size: 16px;
  border-radius: 6px;
  border: 1px solid #ccc;
}

.modal-box select {
  width: 100%;
  padding: 10px;
  margin: 10px 0;
  font-size: 16px;
  border-radius: 6px;
  border: 1px solid #ccc;
}


.modal-box button {
  width: 100%;
  padding: 12px;
  font-size: 18px;
  background-color: #0041C2;
  color: white;
  border: none;
  border-radius: 6px;
  margin-top: 10px;
  cursor: pointer;
}

.modal-box button:hover {
  background-color: #1E90FF;
}


 /*footer section*/

  #footer{
    border: 1px  solid;
    margin: 0px;
    text-align: center;
    padding: 30px;
    background-color: #2c3e50;
    color: #ecf0f1;
    margin-top: 0px;

}

#footer-section{
    display: inline-block;
    margin: 20px;
    text-align: left;
    vertical-align: top;
    width: 300px;
    
   }

#footer-section h3{
    color: #ecf0f1;
}
#footer-section ul {
        list-style: none;
        padding: 0;
    }

#footer-section ul li{
        padding: 5px;
        font-size: 21px;
    }

#footer-section ul li a{
    list-style: none;
    text-decoration:none ;
    color:black;
    font-size: 20px;
    color: #f39c12;
    font-size: 21px;
}

#footer-section ul li i{
    padding: 15px;
}

body{
    margin: 0px;
    padding: 0px;
}

</style>

<body>

 <nav class="navbar navbar-expand-lg navbar-light" style="background-color: floralwhite; font-size: 20px;">

  <div class="container">

    <a class="navbar-brand" href="index.php">Tourism Management</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

      <span class="navbar-toggler-icon"></span>

    </button>

    <div class="collapse navbar-collapse" id="navbarNav">

      <ul class="navbar-nav ms-auto">

         <li class="nav-item me-3"><a class="nav-link" href="index.php">HOME</a></li>

        <li class="nav-item me-3"><a class="nav-link" href="index.php">TOURPACKAGES</a></li>

        <!--<li class="nav-item me-3"><a class="nav-link" href="#">TOUR</a></li>-->

        <li class="nav-item me-3"><a class="nav-link" href="index.php">HOTELS</a></li>

        <li class="nav-item me-3"><a class="nav-link" href="index.php">TRANSPORTATION</a></li>
 
        <li class="nav-item me-2"><a class="nav-link" href="index.php">GALLERY</a></li>
 
        <li class="nav-item me-3"><a class="nav-link" href="index.php">ABOUT US</a></li>

        <li class="nav-item"><a class="nav-link" href="index.php">CONTACT US</a></li>

        <li class="nav-item me-3"><a class="nav-link" href="#">LOGIN</a></li>


      </ul>
    </div>
  </div>
</nav>

<div id="detail">

<?php

    if (isset($_GET['id']))
 {
    $id = $_GET['id'];

    $query = "select * from hotel where id = :id";

    $statement = $connection->prepare($query);

    $statement ->execute([':id' =>$id]);

    $hotel = $statement->fetch(PDO::FETCH_ASSOC);

    if($hotel)
    {
    

echo "<div id='image-detail'>";


     echo"<img src='uploads/" . $hotel['image'] . "'>"; 

     echo "<div class='detail-info'>"; 

     echo"<h2> Hotel Name: ".$hotel['hotelname']."</h2>";

      echo"<p>Location: ".$hotel['location']."</p>";

    /*echo"<p>Hotel Price: ".$hotel['price']."</p>";*/

    /*echo"<p>Package status: ".$hotel['status']."</p>";*/

    /*echo"<p id=description >Package Description: ".$destiny['description']."</p>";*/

    echo"<div id='book'>";

    echo '<a href="#" onclick="openModal(this)" 
        data-days="' . $hotel['hotelname'] . '" 
        data-price="' . $hotel['location'] . '" 
        data-location="' . $hotel['price'] . '">Book Now</a>';

    echo"</div>";

    /*echo"<div id='Home'>";

      echo"<a href='index.php'>Back To Home</a>";
       echo"</div>";*/

    echo "</div>"; 

   echo "</div>";

    }
else {
        echo "<p>No record found for this ID.</p>";
    }
} else {
    echo "<p>ID not provided.</p>";
    }

    
?>

</div>

<div class="modal-overlay" id="rentModal">

  <div class="modal-box">

    <span class="close-btn" onclick="closeModal()">&times;</span>

    <h2>Book Your Room Now</h2>

    <form method="POST">

      Name(Guest)<br>
      <input type="text" id="name" name="name" required class="form-control">

      Mobile No<br>
      <input type="tel" name="mobile" required class="form-control">

      Hotel Name<br>
      <input type="text" id="modal-days" name="hotelname" readonly class="form-control">

      Location<br>
      <input type="text" id="modal-price" name="rtype" readonly class="form-control">

      Room Type<br>
      <!--<input type="text" id="modal-rtype" name="rtype" readonly class="form-control" style="color: black;">-->

      <select>
          <option>Deluxe</option>
          <option>Standard</option>
          <option>Semi-Deluxe</option>
      </select>

      Number of Guest<br>
      <input type="number" name="noguest" required class="form-control">

      Checkin Date<br>
      <input type="date" name="checkin" required class="form-control">

      Checkin Out<br><input type="date" name="checkout" required class="form-control">

      <input type="hidden" id="modal-location-hidden" name="location_name">

      <button type="submit" class="book-btn" name="book">Book</button>
    </form>

  </div>
</div>

<?php 

if(isset($_POST['book']))
{

    $name = $_POST['name'];
    $mobile =$_POST['mobile'];
    $hotelname =$_POST['hotelname'];
    $rtype =$_POST['rtype'];
    $noguest =$_POST['noguest'];
    $checkin =$_POST['checkin'];
    $checkout =$_POST['checkout'];
    $status ='pending';

   $query = "insert into bookhotel(name, mobile, hotelname, rtype, noguest, checkin, checkout, status)values(:name, :mobile, :hotelname, :rtype, :noguest, :checkin, :checkout, :status)";

    $statement = $connection->prepare($query);

    $statement->execute([
        ':name' => $name,
        ':mobile' => $mobile,
        ':hotelname' => $hotelname,
        ':rtype' => $rtype,
        ':noguest' => $noguest,
        ':checkin' => $checkin,
        ':checkout' => $checkout,
        ':status' => $status
    ]);

    echo"<script>alert('your booking has been successfully Send');window.location.href='hotel_details.php?id=$id';</script>";

    /*echo"<script>alert('your booking has been successfully Send');</script>";*/

}

 ?>


<div id="footer">

    <div id="footer-section">
        <h3>QUICKS LINKS</h3>
        <ul>
            <li><a href="#home">Home</a></li>

            <li><a href="#our-service">Services</a></li>

            <li><a href="#tour">Transportation</a></li>

            <li><a href="#tour-package">Tour Package</a></li>

            <li><a href="#Available-hotel">Hotels</a></li>

            <li><a href="#gallery">Gallery</a></li>
        </ul>
    </div>

    <div id="footer-section">
        <h3>Contact Information</h3>
        <ul>
            <li><i class="bi bi-chat-dots"></i>577673265</li>

            <li><i class="bi bi-telephone-forward-fill"></i>964765978</li>

            <li><i class="bi bi-envelope-at-fill"></i>tourism1@gmail.com</li>

            <li><i class="bi bi-house-add-fill"></i>Guwahati, Assam</li>

        </ul>
    </div>

    <div id="footer-section" class="contact-info">
        <h3>Find Us On</h3>
        <ul>
            <li><i class="bi bi-facebook">Facebook</i></li>
            <li><i class="bi bi-instagram"></i>Instagram</i></li>

            <li><i class="bi bi-twitter"></i>Twitter</li>
            <li><i class="bi bi-youtube"></i>Youtube</li>
        </ul>
    </div>
     
 </div>

<script>

function openModal(element) 
{
  document.getElementById("rentModal").style.display = "flex";

  const days = element.getAttribute("data-days");

  const price = element.getAttribute("data-price");

  const location = element.getAttribute("data-location");

  document.getElementById("modal-days").value = days;

  document.getElementById("modal-price").value = price;

  document.getElementById("modal-location-hidden").value = location;
}

function closeModal() 
{
  document.getElementById("rentModal").style.display = "none";
}


</script>

</body>
</html>
