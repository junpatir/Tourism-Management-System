<?php

$connection = new PDO("mysql:host=localhost;dbname=tourismmanagement", "root", "");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Package Details</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">


<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>
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
        transition: width 0.5s ease-in-out; /* Smooth transition */
    }

    .navbar .nav-link:hover::after {
        width: 100%;
    }

    @media(max-width:200px){
        #image-detail img{
            height: 400px;
        }

    }
  
#image-detail{
    position: relative;
    max-width: 100%;
    /*overflow: hidden;*/
    display: flex;
    flex-wrap: wrap;
} 
    
#image-detail img{
    width: 100%;
    height: 600px;
    /*display: block;*/
    display: flex;
    flex-wrap: wrap;

}

.detail-info {
    padding: 40px 100px;
    color: white;
    position: relative;
    top: -655px;
    margin: 50px;
    /*font-size: 18px;
    font-weight: bold;*/
    width: 100%;

}

.detail-info p{
    color: whitesmoke;
    display: flex;
    flex-wrap: wrap;
    word-wrap: break-word;
    font-size: 22px;
    
    line-height: 0.8;  
     max-width: 100%;  
    
}

@media(max-width:800px){
    .detail-info{
        height: 500px;

    }
}

@media(max-width:780px){
    .detail-info{
        
        display: flex;
        flex-wrap: wrap;
    }
}


@media{
    .detail-info h2{
        left: -28px;
        color: white;
        text-align: justify;
    }
}

 #book{
        width: 80%;
        max-width: 400px;
        height: 40px;
        padding: 5px;
        text-align: center;
        background-color: #0041C2;
        border-radius: 8px;
        top: 10px;
        position: relative;
        margin:10px;
        left:5px;
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

  .modal-overlay {
  position: fixed; 
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.6); 
  display: none;
  justify-content: center;
  align-items: center;
  z-index: 9999; 
  overflow: auto;
}

.modal-box {
  background: #fff;
  padding: 30px;
  border-radius: 10px;
  width: 90%;
  max-width: 500px;
  text-align: left;
  font-size: 18px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
   margin: auto;
   position: relative;

}

    .close-btn {
      position: relative;
      top: 10px;
      right: -95%;
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

#Home{
        width: 80%;
        max-width: 400px;
        height: 40px;
        padding: 5px;
        text-align: center;
        background-color: #0041C2;
        border-radius: 8px;
        top: 10px;
        position: relative;
        margin:10px;
        left: 5px;        
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

 /*footer section*/

#footer {
    width: 100%;
    text-align: center;
    padding: 30px 20px;
    background-color: #2c3e50;
    color: #ecf0f1;
    position: relative;
    clear: both; /* Helps in avoiding overlap with floating elements */
    margin-top: 30px; 
    margin-top: -600px;
}

@media (max-width: 768px) {
    #footer-section {
        width: 100%;
        margin: 10px 0;
        text-align: center;
    }
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

    $query = "select * from destiny where id = :id";

    $statement = $connection->prepare($query);

    $statement ->execute([':id' =>$id]);

    $destiny = $statement->fetch(PDO::FETCH_ASSOC);

    if($destiny)
    {
    

echo "<div id='image-detail'>";


     echo"<img src='uploads/" . $destiny['image'] . "'>"; 

     echo "<div class='detail-info'>"; 

     echo"<h2> Package Name: ".$destiny['destiny']."</h2>";

      echo"<p>Package Days: ".$destiny['packagedays']."</p>";

    echo"<p>Package Price: ".$destiny['price']."</p>";

    echo"<p>Package status: ".$destiny['status']."</p>";

    echo"<p id=description >Package Description: ".$destiny['description']."</p>";

    echo"<div id='book'>";

    echo '<a href="#" onclick="openModal(this)"
        data-package="' . $destiny['destiny'] . '" 
        data-days="' . $destiny['packagedays'] . '" 
        data-price="' . $destiny['price'] . '" 
        data-location="' . $destiny['destiny'] . '">Book Now</a>';

    echo"</div>";

  /*echo"<div id='Home'>";

      echo"<a href='index.php'>Back To Home</a>";
       echo"</div>";*/

    echo "</div>"; 

   echo "</div>";
}

}    
    
?>

</div>

<form method="POST">
    
<div class="modal-overlay" id="rentModal">

  <div class="modal-box">

    <span class="close-btn" onclick="closeModal()">&times;</span>

    <h2>Book Tour Package Now</h2>

    <form method="POST">

        Enter package Name
      <input type="text" id="modal-package" name="destiny" required>
   
      Enter Pickup Location
      <input type="text" name="pickuplocation" required>

      Enter Pickup Date<br>
      <input type="date" name="pickupdate" required>

      Package Days<br>
      <input type="text" id="modal-days" name="packagedays" readonly class="form-control">

      Package Price<br>
      <input type="text" id="modal-price" name="price" readonly class="form-control">

      Enter Drop-off Date<br>
      <input type="date" name="dropoffdate" required>

      Enter Drop-off Location<br>
      <input type="text" name="dropofflocation" required>

      <input type="hidden" id="modal-location-hidden" name="location_name">

      <button type="submit" class="book-btn" name="btn">Book Now</button>
    </form>

  </div>
</div>

</form>

<?php 


if (isset($_POST['btn'])) 
{
    $destiny = $_POST['destiny'];
    $pickuplocation = $_POST['pickuplocation'];
    $pickupdate = $_POST['pickupdate'];
    $packagedays = $_POST['packagedays'];
    $pickupdate = $_POST['pickupdate'];
    $price = $_POST['price'];
    $dropoffdate = $_POST['dropoffdate'];
    $dropofflocation = $_POST['dropofflocation'];
    $status = 'pending';

        $query = "INSERT INTO bookpackage(destiny, pickuplocation, pickupdate, packagedays, price, dropoffdate, dropofflocation, status)
                  VALUES (:destiny, :pickuplocation, :pickupdate, :packagedays, :price, :dropoffdate, :dropofflocation, :status)";
        $statement = $connection->prepare($query);

        $statement->execute([
            ':destiny' => $destiny,    
            ':pickuplocation' => $pickuplocation,
            ':pickupdate' => $pickupdate,
            ':packagedays' => $packagedays,
            ':price' => $price,
            ':dropoffdate' => $dropoffdate,
            ':dropofflocation' => $dropofflocation,
            ':status' => $status
        ]);

       echo "<script>alert('Package successfully added!');window.location.href='package_details.php?id=$id';</script>";


        /*header("Location: package.php");
        exit;*/
        
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
  
   const package = element.getAttribute("data-package");
  const days = element.getAttribute("data-days");
  const price = element.getAttribute("data-price");
  const location = element.getAttribute("data-location");
  
   document.getElementById("modal-package").value = package;
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