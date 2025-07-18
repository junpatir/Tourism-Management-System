<?php

$connection = new PDO("mysql:host=localhost;dbname=tourismmanagement", "root", "");

?>

<?php 

//TRANSPORTATION

if (isset($_POST['remove'])) 
{
  
  $query = "delete from booktransportation where id = :id";

  $statement = $connection->prepare("update booktransportation set status = 'cancelled' where id = :id");

  $statement->execute(array( ':id'=>$_POST['id']));

  echo "<script>alert('You Have Cancelled Client Booking');window.location.index.php;</script>";

}

if(isset($_POST['confirm']))
{
  $query = "update booktransportation set status = 'confirm' where id = :id";

  $statement = $connection->prepare($query);

  $statement->execute([':id' => $_POST['id']]);

  echo "<script>alert('You Have Confirmed Client Booking');</script>";

}

if (isset($_POST['transportupdate'])) {
  $query = "UPDATE booktransportation SET 
            category = :category,
            vmodel = :vmodel,
            rentfee = :rentfee,
            picklocation = :picklocation,
            bookingdate = :bookingdate,
            bookingtime = :bookingtime,
            dropdate = :dropdate,
            droplocation = :droplocation 
            WHERE id = :id";

  $stmt = $connection->prepare($query);
  $stmt->execute([
    ':category' => $_POST['category'],
    ':vmodel' => $_POST['vmodel'],
    ':rentfee' => $_POST['rentfee'],
    ':picklocation' => $_POST['picklocation'],
    ':bookingdate' => $_POST['bookingdate'],
    ':bookingtime' => $_POST['bookingtime'],
    ':dropdate' => $_POST['dropdate'],
    ':droplocation' => $_POST['droplocation'],
    ':id' => $_POST['id']
  ]);

  echo "<script>alert('Transportation booking updated successfully'); window.location='index.php';</script>";
}


//TOUR PACKAGE

if(isset($_POST['cancel']))

{  
  $query = "delete from bookpackage where id = :id";

  $statement = $connection->prepare("update bookpackage set status = 'cancelled' where id = :id");

  $statement->execute(array('id' => $_POST['id']));

  echo"<script>alert('You Have Cancelled Client Tour Booking');window.location='index.php';</script>";
}

if(isset($_POST['packageconfirm']))
{
  $query = "update bookpackage set status = 'confirm' where id = :id";

  $statement = $connection->prepare($query);

  $statement->execute([':id' => $_POST['id']]);
  
  echo "<script>alert('You Have Confirmed Client Booking');</script>";


}

if (isset($_POST['packageupdate'])) {
  $query = "UPDATE bookpackage SET 
            destiny = :destiny,
            pickuplocation = :pickuplocation,
            pickupdate = :pickupdate,
            packagedays = :packagedays,
            price = :price,
            dropoffdate = :dropoffdate,
            dropofflocation = :dropofflocation 
            WHERE id = :id";

  $stmt = $connection->prepare($query);
  $stmt->execute([
    ':destiny' => $_POST['destiny'],
    ':pickuplocation' => $_POST['pickuplocation'],
    ':pickupdate' => $_POST['pickupdate'],
    ':packagedays' => $_POST['packagedays'],
    ':price' => $_POST['price'],
    ':dropoffdate' => $_POST['dropoffdate'],
    ':dropofflocation' => $_POST['dropofflocation'],
    ':id' => $_POST['id']
  ]);

  echo "<script>alert('Tour package booking updated successfully'); window.location='index.php';</script>";
}


//HOTEL BOOKING

if(isset($_POST['delete']))
{
  $query = "delete from bookhotel where id = :id";

  $statement = $connection->prepare("update bookhotel set status = 'cancelled' where id = :id");
  
  $statement->execute(array(':id' => $_POST['id']));
        
  echo"<script>alert('You Have Cancelled Booking');window.location='index.php';</script>";
}

if(isset($_POST['hotelconfirm']))
{
  $query = "update bookhotel set status = 'confirm' where id = :id";

  $statement = $connection->prepare($query);

  $statement->execute([':id' => $_POST['id']]);
  
   echo"<script>alert('You Have Confirm Client Booking');</script>"; 

}

if (isset($_POST['hotelupdate'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $hotelname = $_POST['hotelname'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $rtype = $_POST['rtype'];
    $noguest = $_POST['noguest'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];

    $query = "UPDATE bookhotel SET 
              name = :name, 
              mobile = :mobile, 
              hotelname = :hotelname, 
              location = :location, 
              price = :price, 
              rtype = :rtype, 
              noguest = :noguest, 
              checkin = :checkin, 
              checkout = :checkout 
              WHERE id = :id";

    $stmt = $connection->prepare($query);
    $stmt->execute([
        ':name' => $name,
        ':mobile' => $mobile,
        ':hotelname' => $hotelname,
        ':location' => $location,
        ':price' => $price,
        ':rtype' => $rtype,
        ':noguest' => $noguest,
        ':checkin' => $checkin,
        ':checkout' => $checkout,
        ':id' => $id
    ]);

    echo "<script>alert('Hotel booking updated successfully'); window.location='index.php';</script>";
}

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
</head>

<style type="text/css">

  /*transpotation*/

  #transport{
  border-collapse: collapse;
  width: 99%;
  max-width: 1000px;
  table-layout: fixed;
  word-wrap: break-word;
  overflow-wrap: break-word;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
  }

  #transport th, #transport td {
  word-wrap: break-word;
  overflow-wrap: break-word;
}

#transport td button {
  padding: 6px 6px;
  font-size: 15px;
  margin: 2px;
  display: inline-block;
  max-width: 100%;
  border-radius: 6px;
}

  #tab button{
  color: white;
  background-color: red;
  margin: 2px;
  border-radius: 5px;
}

#tab button:hover{
   background-color: #FFB09C;
   transition: 0.8s;
}

/*hotel section*/

#hotel-table{
  border-collapse: collapse;
  width: 99%;
  max-width: 1000px;
  table-layout: fixed;
  word-wrap: break-word;
  overflow-wrap: break-word;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
  }

  #hotel-table th, #hotel-table td {
  word-wrap: break-word;
  overflow-wrap: break-word;
}

#hotel-table td button {
  padding: 6px 6px;
  font-size: 15px;
  margin: 2px;
  display: inline-block;
  max-width: 100%;
  border-radius: 6px;
}

#hotel-booking button{
  color: white;
  background-color: red;
  margin: 2px;
  border-radius: 5px;
}

#hotel-booking button:hover{
   background-color: #FFB09C;
   transition: 0.8s;
}

  table{
    text-align: center;
  }
  table th{
    border: 1px solid;
   
  }

  table th{
    border: 1px solid;
  }

  /*tour package*/
  #tour-table{
  border-collapse: collapse;
  width: 99%;
  max-width: 1000px;
  table-layout: fixed;
  word-wrap: break-word;
  overflow-wrap: break-word;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
  }

  #tour-table th, #tour-table td {
  word-wrap: break-word;
  overflow-wrap: break-word;
}

#tour-table td button {
  padding: 6px 6px;
  font-size: 15px;
  margin: 2px;
  display: inline-block;
  max-width: 100%;
  border-radius: 6px;
}
#package-table tr td{
  border: 1px solid;
}

#package-table{
}

#package-table button{
  color: white;
  background-color: red;
  margin: 2px;
  border-radius: 5px;
}

#package-table button:hover{
   background-color: #FFB09C;
   transition: 0.8s;
}

table tr td{
  border: 1px solid;
}
.cancelled {
  background-color: #ffcccc; 
  color: #a00 !important;              
}

.confirm {
  background-color: #d4edda; 
  color: #155724 !important;              
}


</style>

<body>

<?php include'navbar.php' ?>

<br><center>

<!--TRANSPORTATION-->

<div id="tab">
<table border="1px" id="transport">
  <h3>TRANSPORTATION</h3>
  <tr>
    <th>Slno</th>
    <th>Category</th>
    <th>Car No.</th>
    <th>Rent</th>
    <th>Pick Location</th>
    <th>Pickup Date</th>
    <th>Pick Time</th>
    <th>Drop Off Date</th>
    <th>Drop Off location</th>
    <th>Status</th>
    <th>Action</th>
    
  </tr>

   <?php

         $query = "SELECT * FROM booktransportation ORDER BY id ASC";

         $statement = $connection->prepare($query);

         $statement->execute();

         $result = $statement->fetchAll();

         $id = 1;
           
          if($result)
     {

          foreach ($result as $row) 
         {
             $statusClass = '';
             if($row["status"] === 'cancelled'){
              $statusClass = 'cancelled';
             }

             elseif($row["status"] === 'confirm'){
              $statusClass = 'confirm';
             }

           echo '<tr class="' . $statusClass . '">
           
                <td>'.$row["id"].'</td>

                <td>'.$row["category"].'</td>

                <td>'.$row["vmodel"].'</td>

                <td>'.$row["rentfee"].'</td>

                <td>'.$row["picklocation"].'</td>

                <td>'.$row["bookingdate"].'</td>

                <td>'.$row["bookingtime"].'</td>

                <td>'.$row["dropdate"].'</td>
                
                <td>'.$row["droplocation"].'</td>

                <td>'.$row["status"].'</td>

                <td>';

                if ($row["status"] == 'confirm')
                 {
                  echo '<span style="color:green; font-weight:bold;">completed</span>';
                }

                else

                  if($row["status"] == 'cancelled')
                {
                  echo'<span style="color:red; font-weight:bold;">cancelled</span>';
                }

                else
                {
                  echo'


                <button onclick="edittransportation('.$row["id"].', \''.$row["category"].'\',\''.$row["vmodel"].'\',\''.$row["rentfee"].'\', \''.$row["picklocation"].'\', \''.$row["bookingdate"].'\', \''.$row["bookingtime"].'\', \''.$row["dropdate"].'\', \''.$row["droplocation"].'\')"data-bs-toggle="modal" data-bs-target="#createtransportationModal">Edit</button>

                <form method="post" style="display:inline;">

            <input type="hidden" name="id" value="'.$row["id"].'">

            <button type="submit" name="remove" onclick="return confirm(\'Are you sure you want to cancel this booking?\')">cancel </button>

            <button type="submit" name="confirm">confirm</button>
           
              </form>';
              }

                '</td>';

      $id++;
}
}
   ?>
</table>
</div>
<br>
<!-- Transportation Edit Modal -->

<div class="modal fade" id="editTransportationModal" tabindex="-1" aria-labelledby="editTransportationModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <form method="post">

      <div class="modal-content">

        <div class="modal-header">


          <h5 class="modal-title">Edit Transportation Booking</h5>

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <input type="hidden" name="id" id="transport-id">

          <div class="mb-3"><label>Category</label><input type="text" name="category" id="transport-category" class="form-control"></div>

          <div class="mb-3"><label>Vehical No. </label><input type="text" name="vmodel" id="transport-vmodel" class="form-control"></div>

          <div class="mb-3"><label>Rent</label><input type="text" name="rentfee" id="transport-rentfee" class="form-control"></div>

          <div class="mb-3"><label>Pick Up Location</label><input type="text" name="picklocation" id="transport-picklocation" class="form-control"></div>

          <div class="mb-3"><label>Booking Date</label><input type="date" name="bookingdate" id="transport-bookingdate" class="form-control"></div>

           <div class="mb-3"><label>Pick Up Time</label><input type="time" name="bookingtime" id="transport-bookingtime" class="form-control"></div>

            <div class="mb-3"><label>Drop  Date</label><input type="date" name="dropdate" id="transport-dropdate" class="form-control"></div>

             <div class="mb-3"><label>Drop Location</label><input type="text" name="droplocation" id="transport-droplocation" class="form-control"></div>

        </div>

        <div class="modal-footer">
          <button type="submit" name="transportupdate" class="btn btn-primary">Update</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
  
  function edittransportation(id, category, vmodel, rentfee, picklocation, bookingdate, bookingtime, dropdate, droplocation) {
  document.getElementById('transport-id').value = id;
  document.getElementById('transport-category').value = category;
  document.getElementById('transport-vmodel').value = vmodel;
  document.getElementById('transport-rentfee').value = rentfee;
  document.getElementById('transport-picklocation').value = picklocation;
  document.getElementById('transport-bookingdate').value = bookingdate;
  document.getElementById('transport-bookingtime').value = bookingtime;
  document.getElementById('transport-dropdate').value = dropdate;
  document.getElementById('transport-droplocation').value = droplocation;

  new bootstrap.Modal(document.getElementById('editTransportationModal')).show();
}

</script>


<!--TOUR PACKAGE BOOKING-->
<center>

 <div id="package-table">
  <table border="1px solid" id="tour-table">

  <h2>Client Tour Package booking</h2>
  <tr>  
   <th>slno</th>
  <th>Package Name</th>
  <th>pickup Location</th>
  <th>Pick up Date</th>
  <th>Package Days</th>
  <th>Price</th>
  <th>Dropoff Date</th>
  <th>Dropoff location</th>
  <th>Status</th>
  <th>Action</th>
</tr>

 <?php

         $query = "SELECT * FROM bookpackage ORDER BY id ASC";

         $statement = $connection->prepare($query);

         $statement->execute();

         $result = $statement->fetchAll();

         $id = 1;
           
          if($result)
     {

            foreach ($result as $row) {
  $statusClass = '';
  if ($row["status"] === 'cancelled') {
    $statusClass = 'cancelled';
  } elseif ($row["status"] === 'confirm') {
    $statusClass = 'confirm';
  }

           echo '<tr class="' . $statusClass . '">

                <td>'.$row["id"].'</td>

                <td>'.$row["destiny"].'</td>

                <td>'.$row["pickuplocation"].'</td>

                <td>'.$row["pickupdate"].'</td>

                <td>'.$row["packagedays"].'</td>
       
                <td>'.$row["price"].'</td>

                <td>'.$row["dropoffdate"].'</td>

                <td>'.$row["dropofflocation"].'</td>

                <td>'.$row["status"].'</td>

                <td>';

                 if ($row["status"] == 'confirm')
                 {
                  echo '<span style="color:green; font-weight:bold;">completed</span>';
                }

                else

                  if($row["status"] == 'cancelled')
                {
                  echo'<span style="color:red; font-weight:bold;">cancelled</span>';
                }

                else
                {
                  echo'

                
      <button onclick="editform('.$row["id"].', \''.$row["destiny"].'\', \''.$row["pickuplocation"].'\',  \''.$row["pickupdate"].'\', \''.$row["packagedays"].'\', \''.$row["price"].'\', \''.$row["dropoffdate"].'\', \''.$row["dropofflocation"].'\', \''.$row["status"].'\')" data-bs-toggle="modal" data-bs-target="#editpackagemodal">edit</button>

        <form method="post">

        <input type="hidden" name="id" value="'.$row["id"].'">

        <button type="submit" name="cancel" onclick="return confirm(\'Areyou sure you want to cancel this booking?\')">cancel </button>

        <button type="submit" name="packageconfirm">confirm</button>
        </form>';
}
echo
                '</td>';

      $id++;
}
}

?>

</table>
</div><br>
</center>

<!-- Tour Package Edit Modal -->
<div class="modal fade" id="editPackageModal" tabindex="-1" aria-labelledby="editPackageModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Tour Package Booking</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <input type="hidden" name="id" id="package-id">
          <div class="mb-3"><label>Package Name</label><input type="text" name="destiny" id="package-destiny" class="form-control"></div>
          <div class="mb-3"><label>Pickup Location</label><input type="text" name="pickuplocation" id="package-pickuplocation" class="form-control"></div>
          <div class="mb-3"><label>Pickup Date</label><input type="text" name="pickupdate" id="package-pickupdate" class="form-control"></div>
          <div class="mb-3"><label>Package Days</label><input type="text" name="packagedays" id="package-days" class="form-control"></div>
          <div class="mb-3"><label>Price</label><input type="text" name="price" id="package-price" class="form-control"></div>
          <div class="mb-3"><label>Drop Date</label><input type="text" name="dropoffdate" id="package-dropdate" class="form-control"></div>
          <div class="mb-3"><label>Drop Location</label><input type="text" name="dropofflocation" id="package-droplocation" class="form-control"></div>
        </div>

        <div class="modal-footer">
          <button type="submit" name="packageupdate" class="btn btn-primary">Update</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
function editform(id, destiny, pickuplocation, pickupdate, packagedays, price, dropoffdate, dropofflocation) {
  document.getElementById('package-id').value = id;
  document.getElementById('package-destiny').value = destiny;
  document.getElementById('package-pickuplocation').value = pickuplocation;
  document.getElementById('package-pickupdate').value = pickupdate;
  document.getElementById('package-days').value = packagedays;
  document.getElementById('package-price').value = price;
  document.getElementById('package-dropdate').value = dropoffdate;
  document.getElementById('package-droplocation').value = dropofflocation;

  new bootstrap.Modal(document.getElementById('editPackageModal')).show();
}
</script>



<!--HOTEL BOOKING-->
<center>
<div id="hotel-booking">

  <h2>Book Hotel For Client</h2>
  <table id="hotel-table">
    
      <th>Guest Name</th>
      <th>Mobile No</th>
      <th>Hotel Name</th>
      <th>Location</th>
      <th>Price</th>
      <th>Room Type</th>
      <th>No. of Guest</th>
      <th>Checkin Date</th>
      <th>Checkout Date</th>
      <th>Status</th>
      <th>Action</th>

     <?php 
      
      $query = "SELECT * FROM bookhotel ORDER BY id ASC";

      $statement = $connection->prepare($query);

      $statement ->execute();

      $result = $statement->fetchAll();

     foreach ($result as $row) {
  $statusClass = '';
  if ($row["status"] === 'cancelled') {
    $statusClass = 'cancelled';
  } elseif ($row["status"] === 'confirm') {
    $statusClass = 'confirm';
  }

      {
        //echo '<tr data-id="'.$row["id"].'">

         echo '<tr class="' . $statusClass . '">

        <td>'.$row["name"].'</td>
        <td>'.$row["mobile"].'</td>
        <td>'.$row["hotelname"].'</td>
        <td>'.$row["location"].'</td>
        <td>'.$row["price"].'</td>
        <td>'.$row["rtype"].'</td>
        <td>'.$row["noguest"].'</td>
        <td>'.$row["checkin"].'</td>
        <td>'.$row["checkout"].'</td>
        <td>'.$row["status"].'</td>

        <td>';

        if ($row["status"] == 'confirm')
                 {
                  echo '<span style="color:green; font-weight:bold;">completed</span>';
                }

                else

                  if($row["status"] == 'cancelled')
                {
                  echo'<span style="color:red; font-weight:bold;">cancelled</span>';
                }

                else
                {
                  echo'

        <button onclick="edit('.$row["id"].', \''.$row["name"].'\', \''.$row["mobile"].'\',  \''.$row["hotelname"].'\', \''.$row["location"].'\', \''.$row["price"].'\', \''.$row["rtype"].'\', \''.$row["noguest"].'\', \''.$row["checkin"].'\', \''.$row["checkout"].'\')">edit</button>

        <form method="post">

        <input type="hidden" name="id" value="'.$row["id"].'">

        <button type="submit" name="delete" onclick="return confirm(\'Areyou sure you want to cancel this booking?\')">cancel </button>

        <button type="submit" name="hotelconfirm">confirm</button>
        </form>';
      }
      echo

        '</td>';

      
      }
}
      ?>

  </table>  
</div>
</center>

<!-- Hotel Edit Modal -->
<div class="modal fade" id="editHotelModal" tabindex="-1" aria-labelledby="editHotelModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Hotel Booking</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <input type="hidden" name="id" id="hotel-id">

          <div class="mb-3">
            <label class="form-label">Guest Name</label>
            <input type="text" name="name" id="hotel-name" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Mobile No</label>
            <input type="text" name="mobile" id="hotel-mobile" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Hotel Name</label>
            <input type="text" name="hotelname" id="hotel-hotelname" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Location</label>
            <input type="text" name="location" id="hotel-location" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="text" name="price" id="hotel-price" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Room Type</label>
            <input type="text" name="rtype" id="hotel-rtype" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">No. of Guest</label>
            <input type="text" name="noguest" id="hotel-noguest" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Check-in Date</label>
            <input type="text" name="checkin" id="hotel-checkin" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Check-out Date</label>
            <input type="text" name="checkout" id="hotel-checkout" class="form-control">
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" name="hotelupdate" class="btn btn-primary">Update</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
function edit(id, name, mobile, hotelname, location, price, rtype, noguest, checkin, checkout) {
  document.getElementById('hotel-id').value = id;
  document.getElementById('hotel-name').value = name;
  document.getElementById('hotel-mobile').value = mobile;
  document.getElementById('hotel-hotelname').value = hotelname;
  document.getElementById('hotel-location').value = location;
  document.getElementById('hotel-price').value = price;
  document.getElementById('hotel-rtype').value = rtype;
  document.getElementById('hotel-noguest').value = noguest;
  document.getElementById('hotel-checkin').value = checkin;
  document.getElementById('hotel-checkout').value = checkout;

  // Show modal
  var myModal = new bootstrap.Modal(document.getElementById('editHotelModal'));
  myModal.show();
}
</script>


</body>
</html>