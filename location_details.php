<?php

$connection = new PDO("mysql:host=localhost;dbname=tourismmanagement", "root", "");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Car Rent</title>
</head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">


<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>

    body{
      background-color: aliceblue;
    }
    
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
        /*font-weight: bold;*/
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


    #car-detail{
        padding: 40px;
        /*text-align: center;*/
        display: flex;
        flex-wrap: wrap;
        gap: 130px;
        justify-content: center;

    }

    @media(max-width:1000px){
        #car-detail{
            gap: 40px;

        }
    }

    @media(max-width:780px){
        #car-detail{
            gap: 10px;
            flex-direction: column;
            align-items: center;
        }
    }


    #car-detail h2{
        font-size: 27px;
        font-weight: bold;
        top: 80px;
        position: relative;
    }

    #detail h1{
        position: relative;
        left: 70%;
    }

     #car-detail img{
        width: 100%;
        max-width:600px;
        border-radius: 10px;

     }

     #car-detail p{
         font-size: 25px;
         font-weight: bold;
         top: 80px;
         position: relative;
        
    }

    #book{
        width: 400px;
        height: 65px;
        padding: 5px;
        text-align: center;
        background-color: #0041C2;
        border-radius: 8px;
        top: 100px;
        position: relative;
         margin-bottom: 80px;
    }

    #book a{
        text-decoration: none;
        font-size: 20px;
        font-weight: bold;
        color: white;       
    }
 #book:hover{
    background-color: #1E90FF;
    transition: 0.5s;
 }

  .modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  margin: 20px;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.6); 
  display: none;
  justify-content: center;
  align-items: center;
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

#Home a{
        height: 65px;
        padding: 5px;
        text-align: center;
        background-color: #0041C2;
        border-radius: 8px;
        top:35px;
        position: relative;
        left: 30%;
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

 #footer{
    border: 1px  solid;
    margin: 0px;
    text-align: center;
    padding: 30px;
    background-color: #2c3e50;
    color: #ecf0f1;
  
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

        <li class="nav-item me-3"><a class="nav-link" href="index.php">TOURPACKAGE</a></li>

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

    $query = "select * from transportation where id = :id";

    $statement = $connection->prepare($query);

    $statement ->execute([':id' =>$id]);

    $transportation = $statement->fetch(PDO::FETCH_ASSOC);

    if($transportation)
    {
    
/*echo"<h1>Car Details</h1>";*/

echo "<div id='car-detail'>";

     echo"<img src='uploads/" . $transportation['image'] . "'>"; 

     echo "<div class='detail-info'>"; 

     echo"<h2> category: ".$transportation['category']."</h2>";

      echo"<p>Vehical No. : ".$transportation['modelno']."</p>";

    echo"<p>Model No: ".$transportation['modelno']."</p>";

    echo"<p>Rent Fee: ".$transportation['rentfee']."</p>";

    echo"<div id='book'>";

    echo "<a href='#' onclick='openModal()'>Rent Our Car in just Rs 2000/Day<br>Book Now</a>";

    echo"</div>";

    echo "</div>"; 

   echo "</div>";

    }
}
?>

<script>

    var selectedCategory = <?php echo json_encode($transportation['category']); ?>;

    var selectedVModel = <?php echo json_encode($transportation['modelno']); ?>;

    var selectedRentFee = <?php echo json_encode($transportation['rentfee']); ?>;
</script>

</div>

<form method="post">

<div class="modal-overlay" id="rentModal">

    <div class="modal-box">
        
      <span class="close-btn" onclick="closeModal()">&times;</span>

      <h2>Book Car Now</h2>

      <label>Category</label><br>
<input type="text" id="categoryDisplay" readonly><br><br>

<label>Vehicle No.</label><br>
<input type="text" id="modelDisplay" readonly><br><br>

<label>Rent Fee</label><br>
<input type="text" id="rentDisplay" readonly><br><br>

<?php

$vmodel = $rentfee = "";

if (isset($_GET['category'])) 
{
    $category = $_GET['category'];

    $stmt = $connection->prepare("SELECT vmodel, rentfee FROM transportation WHERE category = :cat LIMIT 1");

    $stmt->execute([':cat' => $category]);

    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($data) 
    {
        $vmodel = $data['vmodel'];
        $rentfee = $data['rentfee'];
    }
}
?>

<!--<input type="text" name="vmodel" value="<?php echo $vmodel; ?>" readonly><br><br>

<input type="text" name="rentfee" value="<?php echo $rentfee; ?>" readonly>--><br><br>

      Enter Pickup Location<br><input type="text" name="picklocation" id="modelno" required>

      Enter Pickup Date<br><input type="date" name="bookingdate" id="bookdate" required>

      Enter Pickup Time<br><input type="time" name="bookingtime" id="picktime" required>

      Enter Drop-off Date<br><input type="date" name="dropdate" id="dropdate" required>

      Enter Drop-off Location<br><input type="text" name="droplocation" id="droplocation" required>

      <input type="hidden" name="status">

      <button type="submit" name="book">Confirm Booking</button>

    </div>
  </div>
</form>

<?php 

if(isset($_POST['book']))
{

    $picklocation = $_POST['picklocation'];
    $bookingdate =$_POST['bookingdate'];
    $bookingtime =$_POST['bookingtime'];
    $dropdate =$_POST['dropdate'];
    $droplocation =$_POST['droplocation'];
    $status = 'Pending';

   $query = "insert into booktransportation(picklocation, bookingdate, bookingtime, dropdate, droplocation, status)values(:picklocation, :bookingdate, :bookingtime, :dropdate, :droplocation, :status)";

    $statement = $connection->prepare($query);

    $statement->execute([
        ':picklocation' => $picklocation,
        ':bookingdate' => $bookingdate,
        ':bookingtime' => $bookingtime,
        ':dropdate' => $dropdate,
        ':droplocation' => $droplocation,
        ':status' => $status
    ]);

    echo"<script>alert('your booking has been successfully Send');window.location.href='location_details.php?id=$id';</script>";
}

 ?>

<script>
function openModal() 
{
  document.getElementById("rentModal").style.display = "flex";

  // Fill values in modal display fields
  document.getElementById("categoryDisplay").value = selectedCategory;
  document.getElementById("modelDisplay").value = selectedVModel;
  document.getElementById("rentDisplay").value = selectedRentFee;

  // Set hidden fields for form submission
  document.getElementById("categoryInput").value = selectedCategory;
  document.getElementById("modelInput").value = selectedVModel;
  document.getElementById("rentInput").value = selectedRentFee;
}

</script>

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
function openModal() 
{
  const modal = document.getElementById("rentModal");
  modal.style.display = "flex";

  // Fill modal display fields
  document.getElementById("categoryDisplay").value = selectedCategory;

  document.getElementById("modelDisplay").value = selectedVModel;

  document.getElementById("rentDisplay").value = selectedRentFee;

  // Set hidden fields for form submission
  document.getElementById("categoryInput").value = selectedCategory;
  document.getElementById("modelInput").value = selectedVModel;
  document.getElementById("rentInput").value = selectedRentFee;
}

function closeModal() {
  const modal = document.getElementById("rentModal");
  modal.style.display = "none";
}

/*Optional: close modal when clicking outside the box
window.onclick = function(event) {
  const modal = document.getElementById("rentModal");
  if (event.target === modal) {
    modal.style.display = "none";
  }
};*/
</script>

</body>
</html>
