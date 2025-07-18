<?php
session_start(); 
$connection = new PDO("mysql:host=localhost;dbname=tourismmanagement","root","");

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location:index.php?logged_out=true");exit();
}

 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tourism Management</title>

    <link rel="stylesheet" type="text/css" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


</head>

<style type="text/css">

.image-with-text img{
    width: 100%;
    height: 350px;
    display: block;
}

@media(max-width:800px){
    .image-with-text img{
        height: 300px;
    }
}  

.para{
  position: relative;
  top: -300px;
  max-width: 1000px;
  padding: 20px;
  color: white;
  text-align: justify;
  flex-wrap: wrap;
  display: flex;
  font-size: 20px;
}

/*Transportation Section*/

#tour{
    box-shadow: 5px 5px 10px;
    margin-top: 100px;

}

#tour h2{
    padding: 20px;
}

#transport-image a{
    margin: 20px;
    width: 300px;
    text-align: center;

}
#transport-image a:hover{
    transition: 0.8s;
}

 .destination-gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; 
             margin-top: 30px;
            gap: 5px;

        }
.destination-gallery #transport-image{
    width: 330px;    
}

 .destination-gallery  img{
   margin: 0px;
   max-width: 330px;
   width: 100%;
  
 }

 .destination-gallery  img:hover{
     transform: scale(1.07);
     transition: 0.4s;
}

  @media (max-width: 768px) {
            .destination-gallery {
                justify-content: center;

            }

            .transport-item {
                width: 100%;
                max-width: 70%;
            }

            .transport-item img {
                height: auto;

            }
        }

#toggleBtn {
  display: inline-block;
  padding: 10px 25px;
  background-color: #f39c12;
  color: white;
  font-weight: bold;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
  margin-top: 10px;
}

.transport-item {
  opacity: 1;
  max-height: 500px;
  transition: opacity 0.6s ease, max-height 0.8s ease;
  overflow: hidden;

}

   .transport-item img {
            max-width: 330px;
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
            margin-left: -20px;

        }

.transport-item.hidden {
  opacity: 0;
  max-height: 0;
  pointer-events: none;
}

.image-container img {
  width: 100;
  max-width: 350%;
  height: 300px;
  display: block;
  border-radius: 10px;
  object-fit: cover;

}

#book-car{
    color: black;
    text-decoration: none;
    font-size: 20px;
    font-size: bold;
    background-color: ghostwhite;
    border: 1px;
    border-radius:5px;
    text-align: center;
    height: 42px;
    padding: 5px;
    width: 250px;
    position: relative;
    left: 50px;
    box-shadow: 5px 5px 7px;

}


#book-car:hover{
    background-color: #454545;
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

/*Tour Package*/

#tour-package{
    margin-top: -60px;
}

.image-container img {
  width: 350px;
  max-width: 100%;
  height: 330px;
  display: block;
  border-radius: 10px;
  object-fit: cover;
}

.image-container img{
    box-shadow: 5px 14px 15px rgba(0, 0, 0, 0.6);
    background-color: black;
}

.image-container img:hover{
    transform:scale(1.07);
    transition:1.1s;
     box-shadow: 0 6px 20px rgba(0, 0, 0, 0.7);
}

.venue-info{
margin-top: -35px;
box-shadow: -1px 5px 5px;
}

.modal-overlay {
  position: fixed; 
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background-color: rgba(0,0,0,0.6); 
  display: none; /* Hide by default */
  justify-content: center;
  align-items: center;
  z-index: 9999;
}

.modal-box {
  background-color: #fff;
  padding: 20px;
  border-radius: 10px;
  width: 400px;
  max-width: 90%;
  position: relative;
}

.close-btn {
  position: absolute;
  top: 10px;
  right: 15px;
  font-size: 24px;
  cursor: pointer;
  color: #333;
  z-index: 10000;
}


/*Service we give*/

#our-service {
    text-align: center;
    margin: 40px 0;
    position: relative;
    /*top: -38px;*/
    overflow: hidden;

}

.scroll-track {
            display: flex;
            animation: scroll-left 15s linear infinite;
            gap: 30px;
            justify-content: flex-start;
            align-items: center;
    padding: 20px;
    position: relative;
    top: ;
    width: max-content;
        }


 @keyframes scroll-left {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }
        .service-container {
    text-align: center;
    flex: 0 0 auto;
}
.service-container img {
    width: 260px;
    height: 240px;
    object-fit: cover;
    border-radius: 50%;
   box-shadow: 10px 10px 15px rgba(10, 10, 0, 0.3);
    margin-bottom: 10px;
}

.service-label {
    display: block;
    font-weight: bold;
    font-size: 16px;
}

.scroll-wrapper {
            display: flex;
            overflow: hidden;
        }

.image img:hover{
     transform: scale(1.07);
     transition: 0.4s;
}

#book-package{
    color: black;
    text-decoration: none;
    font-size: 20px;
    font-weight: bold;
}

/*ABOUT US*/

.aboutus-container{
    margin-top: -35px;
    height: 550px;
}

/*GALLERY SECTION*/

.gallery-section{
margin-top: -60px;
}
.gallery-section h2{
    margin: 30px;

}

.photo-section{
    display: inline-block;
    margin-top: 30px;
    margin-bottom: 100px;
    margin-top: -35px;
    margin-left: 70px;
    width: 300px;
    gap: 30px;
    background-color: ghostwhite;

}

.photo-section img{
    background-color: ghostwhite;
    width: 370px;
    height: 200px;
    margin-top: 40px;
     margin-bottom: 10px;
    margin-top: -10px;
    margin-left: 10px;
    padding: 20px;
    height: 200px;
    object-fit: cover;
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
   
}

.photo-section img:hover{
     transform: scale(1.3);
     transition: 0.5s;
}

/*why choose us section*/
#choose-us{

     margin-top: -60px;
     background-color: ghostwhite;
}
.why-us{
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin: 5px;
    margin-top: -30px;
}

.why-us img{
    width: 550px;
    max-width: 90%;
    border-radius:10px;
    margin: 20px;
    box-shadow: 5px 5px 5px;
    
}

.paragraph {
  max-width: 700px;
  font-size: 18px;
  line-height: 1.6;
  text-align: justify;
  margin-top: -10px;
}

/*Contact US Section*/

.contact-us{
    border: 1px ;
    width: 90%;
    max-width: 800px;
    font-size: 22px;
    padding: 30px;
    margin: 40px;
    background-color: whitesmoke;
    box-shadow: 2px 1px 6px;
    border-radius: 5px;
}

.contact-us input{
         width: 80%;
         max-width: 500px;
         font-size: 19px;
         padding: 7px;
         border-radius: 8px;
         text-align: center;
         box-shadow:10px 10px 15px;
}

.contact-us button{
    color: white;
    background-color: red;
    border-radius: 10px;
    width: 200px;

}

.contact-us button:hover{
    background-color: #FF474C;
    transition: 0.5s;
}

/*Footer section*/

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

<?php  include 'navbar.php'; ?>

<section class="home" id="home">

  <div class="Explore-destiny">

    <h2>Explore Our Destination</h2>
    <p>Its Adventure Time.... Discover new place with us</p>

    <a href="#" class="btn">discover more</a>
  </div>

  <div id="video-box">

    <video autoplay muted loop id="video-slider">

      <source src="image/wedding.mp4" type="video/mp4">

        <p>Explore My Destination</p>
    </video>

  </div>

 <div class="controls">

    <span class="vid-btn active" data-src="image/wedding.mp4"></span>

    <span class="vid-btn" data-src="image/dance.mp4"></span>

    <span class="vid-btn" data-src="image/wedding2.mp4"></span>

    <span class="vid-btn" data-src="image/wedding.mp4"></span>

  </div>

</section>

<script>
  const btns = document.querySelectorAll(".vid-btn");

  const videoSlider = document.getElementById("video-slider");

  btns.forEach(btn => {
    btn.addEventListener("click", function () 

    {
      // Remove 'active' class from all buttons
      btns.forEach(b => b.classList.remove("active"));

      this.classList.add("active");
 
      const src = this.getAttribute("data-src");

      videoSlider.src = src;

      videoSlider.load(); // Reload video with new source
    });
  });
</script>

<div id="our-service">
    <h1>SERVICES WE GIVE</h1>

    <div class="scroll-wrapper">

        <div class="scroll-track">

            <div class="service-container"><img src="image/food.jpg"><span class="service-label">Fooding</span></div>

            <div class="service-container"><img src="image/hotel2.jpg"><span class="service-label">Loading</span></div>

            <div class="service-container"><img src="image/download.png"><span class="service-label">Tour Guide</span></div>

            <div class="service-container"><img src="image/bus.jpg"><span class="service-label">Transportation</span></div>

            <div class="service-container"><img src="image/trekking.jpg"><span class="service-label">Trekking</span></div>

            <div class="service-container"><img src="image/fire.jpg"><span class="service-label">Camp Fire</span></div>

            <div class="service-container"><img src="image/camping.jpg"><span class="service-label">Camping</span></div>

            <div class="service-container"><img src="image/food.jpg"><span class="service-label">Fooding</span></div>

            <div class="service-container"><img src="image/hotel2.jpg"><span class="service-label">Loading</span></div>

            <div class="service-container"><img src="image/download.png"><span class="service-label">Tour Guide</span></div>

            <div class="service-container"><img src="image/bus.jpg"><span class="service-label">Transportation</span></div>

            <div class="service-container"><img src="image/trekking.jpg"><span class="service-label">Trekking</span></div>

            <div class="service-container"><img src="image/fire.jpg"><span class="service-label">Camp Fire</span></div>

            <div class="service-container"><img src="image/camping.jpg"><span class="service-label">Camping</span></div>
        </div>
    </div>
</div>

<div id="tour">
    <center>
        <h2>Available Transportation We Have</h2>
    </center>

    <?php 
    $query = "SELECT id, image, category, vmodel, rentfee FROM transportation";
    $statement = $connection->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    echo '<div class="destination-gallery" row justify-content-center">';

    $count = 0;
    foreach ($result as $row): 
        $id = $row['id'];
        $image = $row['image'];
        $category = $row['category'];
        $vmodel = $row['vmodel'];
        $rentfee = $row['rentfee'];
        $transportation = ($count >= 4) ? 'hidden' : '';
    ?>
        <div class="transport-item <?= $transportation ?>">

            <div id="transport-image">

                <a href="location_details.php?id=<?= $id ?>">

                    <img src="uploads/<?= $image ?>" style="height: 200px;">
                </a><br>

                <a href="#" 
                   class="btn btn-outline-dark shadow-sm" 
                   onclick="opentransportation(this)"
                   data-category="<?= $category ?>" 
                   data-vmodel="<?= $vmodel ?>" 
                   data-rentfee="<?= $rentfee ?>">
                   Book Transportation
                </a>
            </div>
        </div>
    <?php 

        $count++;

    endforeach; 

    echo '</div>';
    ?>

    <div style="text-align: center; margin: 8px; padding: 7px;">

        <button id="toggleBtn" onclick="toggleItems()">Show More</button>

    </div>
</div>

<form method="post">

<div class="modal-overlay" id="rentModal">

    <div class="modal-box">

        <span class="close-btn" onclick="closeModal()">&times;</span>
        <h2>Book Car Now</h2>

        <label>Category</label><br>
        <input type="text" id="categoryDisplay" name="category" readonly><br><br>

        <label>Vehicle No.</label><br>
        <input type="text" id="modelDisplay"  name="vmodel" readonly><br><br>

        <label>Rent Fee</label><br>
        <input type="text" id="rentDisplay" name="rentfee" readonly><br><br>

        Enter Pickup Location<br><input type="text" name="picklocation" required><br><br>

        Enter Pickup Date<br><input type="date" name="bookingdate"><br><br>

        Enter Pickup Time<br><input type="time" name="bookingtime"><br><br>

        Enter Drop-off Date<br><input type="date" name="dropdate"><br><br>

        Enter Drop-off Location<br><input type="text" name="droplocation"><br><br>

        <button name="booktransportation" onclick="confirmBooking()">Confirm Booking</button>
    </div>

</div>
</form>

<?php 

if(isset($_POST['booktransportation']))
{
    $category = $_POST['category'];
    $vmodel = $_POST['vmodel'];
    $rentfee = $_POST['rentfee'];
    $picklocation = $_POST['picklocation'];
    $bookingdate =$_POST['bookingdate'];
    $bookingtime =$_POST['bookingtime'];
    $dropdate =$_POST['dropdate'];
    $droplocation =$_POST['droplocation'];
    $status = 'pending';

   $query = "insert into booktransportation(category, vmodel, rentfee, picklocation, bookingdate, bookingtime, dropdate, droplocation, status)values(:category, :vmodel, :rentfee, :picklocation, :bookingdate, :bookingtime, :dropdate, :droplocation, :status)";

    $statement = $connection->prepare($query);

    $statement->execute([
        ':category' => $category,
        ':vmodel' => $vmodel,
        ':rentfee' => $rentfee,
        ':picklocation' => $picklocation,
        ':bookingdate' => $bookingdate,
        ':bookingtime' => $bookingtime,
        ':dropdate' => $dropdate,
        ':droplocation' => $droplocation,
        ':status' => $status
    ]);

    echo"<script>alert('your booking has been successfully Send');window.location.href='index.php?id=$id';</script>";

}

 ?>


<!-- Modal & Toggle -->
<script>
function opentransportation(button)
 {
  const category = button.getAttribute("data-category");

  const vmodel = button.getAttribute("data-vmodel");

  const rentfee = button.getAttribute("data-rentfee");

  document.getElementById("categoryDisplay").value = category;

  document.getElementById("modelDisplay").value = vmodel;

  document.getElementById("rentDisplay").value = rentfee;

  document.getElementById("rentModal").style.display = "flex";
}

function closeModal() 
{
  document.getElementById("rentModal").style.display = "none";
}

function confirmBooking()
 {
  /*alert("Your booking has been confirmed!");*/

  closeModal();
}

function toggleItems() 
{
  const items = document.querySelectorAll('.transport-item');

  const btn = document.getElementById('toggleBtn');

  const isShowMore = btn.innerText === 'Show More';

  items.forEach((item, index) => {
    if (index >= 4) 
    {
      if (isShowMore)
       {
        item.classList.remove('hidden');
      } 
      else 

      {
        item.classList.add('hidden');
      }
    }
  });

  btn.innerText = isShowMore ? 'Show Less' : 'Show More';
}
</script>


<div id="tour-package">

<center>
  <h2>Best Tour Package Offers For You</h2>
</center>

  <div class="Location">
            
<div class="location-container" id="location">

 <?php 

$query = "SELECT id, destiny, image, packagedays, description, price, status FROM destiny";

$statement = $connection->prepare($query);

$statement->execute();

$destiny = $statement->fetchAll();

echo'<div class="destination-gallery">';

 foreach ($destiny as $destiny)
     {
        $location_id = $destiny['id'];

        $location_name = $destiny['destiny'];

        $image = $destiny['image'];

        $packagedays = $destiny['packagedays'];

        $description = $destiny['description'];

        $price = $destiny['price'];

        $status = $destiny['status'];

        echo '
        <div id="location-box">

            <a href="package_details.php?id=' . $location_id . '" name style="text-decoration:none;">

            <div class="image-container">

               <img src="uploads/' . $image . '" width="350" height="400" style="border-radius:10px; object-fit:cover;">

                </div>

            </a>

            <div class="venue-info" style="background-color:#9FE2BF;" >

               <a href=" package_details.php?id='.$id.' " style="text-decoration:none;">
               <p><strong>Package Name: </strong>' .$location_name.'</p>
                
             </a> 
            
            <a href="#" onclick="openTourModal(this)"
                data-package="' . $location_name . '"          
                data-days="' . $packagedays . '"           
                data-price="' . $price . '" 
                data-location="' . $location_name . '" 
                id="book-package">
                Book Now
            </a>         
               
            </div><br><br>

        </div>';
    }
    ?>
</div>

</div>
  
</div>

<!-- Tour Package Modal -->
<div class="modal-overlay" id="tourModalPackage">
  <div class="modal-box">
    <span class="close-btn" onclick="closeTourModal()">&times;</span>
    <h2>Book Tour Now</h2>
    <form method="POST">
      Enter Package Name
      <input type="text" id="modal-package" name="destiny" required>

      Enter Pickup Location
      <input type="text" name="pickup_location" required>

      Enter Pickup Date<br>
      <input type="date" name="pickup_date" required>

      Package Days<br>
      <input type="text" id="modal-days" name="packagedays" readonly class="form-control">

      Package Price<br>
      <input type="text" id="modal-price" name="price" readonly class="form-control">

      Enter Drop-off Date<br>
      <input type="date" name="dropoff_date" required>

      Enter Drop-off Location<br>
      <input type="text" name="dropoff_location" required>

      <input type="hidden" id="modal-location-hidden" name="location_name">

      <button type="submit" class="book-btn">Book Now</button>
    </form>
  </div>
</div>

<script>
function openTourModal(element) {
  document.getElementById("tourModalPackage").style.display = "flex";

  document.getElementById("modal-package").value = element.getAttribute("data-package");
  document.getElementById("modal-days").value = element.getAttribute("data-days");
  document.getElementById("modal-price").value = element.getAttribute("data-price");
  document.getElementById("modal-location-hidden").value = element.getAttribute("data-location");
}

function closeTourModal() {
  document.getElementById("tourModalPackage").style.display = "none";
}

// Optional: close when clicking outside the modal
window.onclick = function(event) {
  const modal = document.getElementById("tourModalPackage");
  if (event.target === modal) {
    modal.style.display = "none";
  }
};
</script>

<div id="Available-hotel">

 <center>

  <h2>Available Hotels</h2>

</center>

  <?php 
    
    $query  = "select id, hotelname, location, price, image from hotel";

    $statement = $connection->prepare($query);

    $statement ->execute();

    $hotel = $statement->fetchAll();

    echo'<div class="destination-gallery">';

    foreach($hotel as $hotel)

    {
        $id = $hotel['id'];
        $hotelname = $hotel['hotelname'];
        $location = $hotel['location'];
        $price = $hotel['price'];
        $image = $hotel['image'];

        echo '
        <div id="location-box">

            <a href="hotel_details.php?id=' .$id . '">

            <div class="image-container">

               <img src="uploads/' . $image . '" width="350" height="400" style="border-radius:10px; object-fit:cover;">
                </div>

            </a>

            <div class="venue-info" style="background-color:#9FE2BF;">

               <p><strong>Hotel Name: </strong><a href=" hotel_details.php?id='.$id.' " style="text-decoration:none; color:black;"> ' .$hotelname.' </a>

               </p>
                       
               
            </div><br><br>
        </div>';
    }

   ?>

</div>

<div class="gallery-section" id="gallery">

<center>

    <h2>Our Gallery </h2>

</center>

    <div class="photo-section">
        <img src="image/kerala.jpg" style="height: 280px;">
    </div>

     <div class="photo-section">
        <img src="image/kerala.jpg" style="height: 280px;">
    </div>

     <div class="photo-section">
        
        <img src="image/kerala.jpg" style="height: 280px;">
    </div> 

    <div class="photo-section">
       <img src="image/kerala.jpg" style="height: 280px;">
    </div>

     <div class="photo-section">
        
        <img src="image/kerala.jpg" style="height: 280px;">
    </div>

    <div class="photo-section">
        
        <img src="image/kerala.jpg" style="height: 280px;">
    </div>

</div>   
</div>

<div class="aboutus-container" id="about-us">
<div class="about-us">

<center>

  <h1>About Us</h1>

</center>

  <div class="image-with-text">

  <img src="image/background.jpg">

  <center>

<div class="para" >
<p>
  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
</p>
</div>
</center>
</div>
</div>
</div>

<div id="choose-us">

     <div class="why-us">
        <img src="image/image1.jpg">

    <div class="paragraph">
        <h2>WHY CHOOSE US</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>

     </div>
</div>

<center>
<div class="contact-us" id="contactus">

    <h1>Contact Us</h1>

    <form method="post">

        Your Name:<br>
        <input type="text" name="name"><br><br>

        Phone No.:<br>
        <input type="number" name="phoneno"><br><br>

        Email Address:<br>
        <input type="text" name="email"><br><br>

        Your Message:<br>
        <input type="message" name="message"><br><br>

        <button name="sub">Submit</button>
        
    </form>
    
</div>
</center>

<?php 

if(isset($_POST['sub']))
{
    $name = $_POST['name'];
    $phoneno = $_POST['phoneno'];
    $email = $_POST['email'];
    $message = $_POST['message'];

        $query = "insert into contactus(name, phoneno, email, message)values(:name, :phoneno, :email, :message)";

        $statement = $connection->prepare($query);

        $statement->execute([
            ':name' => $name,
            ':phoneno' => $phoneno,
            ':email' => $email,
            ':message' => $message
        ]);

        echo"<script>alert('Your Message has Been Send Successfullt');window.location.href = 'index.php'; </script>"; 

        exit;
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
            <li><i class="bi bi-facebook"></i><a href="#">Facebook</a></li>

            <li><i class="bi bi-instagram"></i><a href="#">Instagram</a></li>

            <li><i class="bi bi-twitter"></i><a href="#">Twitter</a></li>

            <li><i class="bi bi-youtube"></i><a href="#">Youtube</a></li>
        </ul>
    </div>
     
 </div>

<!-- <script>
function toggleItems() {
  const items = document.querySelectorAll('.transport-item');
  const btn = document.getElementById('toggleBtn');
  const isShowMore = btn.innerText === 'Show More';

  items.forEach((item, index) => {
    if (index >= 4) {
      if (isShowMore) {
        item.classList.remove('hidden');
      } else {
        item.classList.add('hidden');
      }
    }
  });

  btn.innerText = isShowMore ? 'Show Less' : 'Show More';
}
</script>-->
<script>
function closeModal() {
  document.getElementById("rentModal").style.display = "none";
}
</script>

</body>
</html>




