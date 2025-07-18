<?php 

$connection = new PDO("mysql:host=localhost;dbname=tourismmanagement","root","");

session_start();

 ?>

 <?php 

if (isset($_POST['booking']))
 {

 $clientname = $_POST['clientname'];   
 $mobile = $_POST['mobile'];   
 $tourpackage = $_POST['tourpackage'];   
 $schedule = $_POST['schedule'];  
 $transportation = $_POST['transportation'];   
 $pickuplocation = $_POST['pickuplocation'];   
 $pickuptime = $_POST['pickuptime'];   
 $status = 'confirm'; 

$query = "insert into booking(clientname, mobile, tourpackage, schedule, transportation, pickuplocation, pickuptime, status)values(:clientname, :mobile, :tourpackage, :schedule, :transportation, :pickuplocation, :pickuptime, :status)";

$statement = $connection->prepare($query);

$statement->execute([
       
            ':clientname' => $clientname,
            ':mobile' => $mobile,
            ':tourpackage' => $tourpackage,
            ':schedule' => $schedule,
            ':transportation' => $transportation,
            ':pickuplocation' => $pickuplocation,
            ':pickuptime' => $pickuptime,
            ':status' => $status
             
  
             ]);
echo 

  '<script>alert("booking successfully added");</script>';

  header('Location:booking.php');
  exit();

}

if(isset($_POST['update']))
{
  $slno = $_POST['slno'];
  $clientname = $_POST['clientname'];
  $mobile = $_POST['mobile'];
  $tourpackage = $_POST['tourpackage'];
  $schedule = $_POST['schedule'];
  $transportation = $_POST['transportation'];
  $pickuplocation = $_POST['pickuplocation'];
  $pickuptime = $_POST['pickuptime'];
  $status = $_POST['status'];

  $query = "update booking set clientname = :clientname, mobile = :mobile, tourpackage = :tourpackage, schedule = :schedule, transportation = :transportation, pickuplocation = :pickuplocation, pickuptime = :pickuptime,  status = :status where slno = :slno";

  $statement = $connection->prepare($query);

  $statement->execute([
    ':clientname' => $clientname,
    ':mobile' => $mobile,
    ':tourpackage' => $tourpackage,
    ':schedule' => $schedule,
    ':transportation' => $transportation,
    ':pickuplocation' => $pickuplocation,
    ':pickuptime' => $pickuptime,
    ':status' => $status,
    ':slno' => $slno
  ]);

  echo '<script>alert("Booking updated successfully.");</script>';
  echo '<script>window.location.href = "booking.php";</script>';
  exit();
}

if(isset($_POST['remove']))
{
  $query = "delete from booking where slno = :slno";

  $statement = $connection->prepare($query);

  $statement->execute(array(':slno'=>$_POST['slno']));

  echo"<script>alert('You have Cancelled client booking');</script>";
}

if(isset($_POST['confirm']))
{
   $query = "update booking set status = 'confirm' where slno = :slno";

   $statement = $connection->prepare($query);

   $statement ->execute([':slno'=>$_POST['slno']]);

   echo"<script>alert('booking confirm successfully');</script>";
}

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>

<link rel="stylesheet" type="text/css" href="style.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style type="text/css">
  .table-booking{
      font-weight: bold;
      margin: 20px;

  }

  .table-booking a{
    color: black;
    background-color: ghostwhite;
    text-decoration: none;
    padding: 10px;
  }

  .table-booking th{
    /*border: 1px solid #ddd;*/
    border: 2px solid;
        padding: 10px;
        ext-align: center;
        vertical-align: middle;
        font-size: 18px;
        font-weight: bold;
        word-wrap: break-word;
        overflow-wrap: break-word;
        color: blue;

  }

    .table-booking td{
    /*border: 1px solid #ddd;*/
    border: 1px solid;
        padding: 10px;
        ext-align: center;
        vertical-align: middle;
        font-size: 15px;
        word-wrap: break-word;
        overflow-wrap: break-word;
        color: black;

  }

</style>

<body>
 
 <?php include'navbar.php' ?>

<center>
  <div class="table-booking"> 
      
       <a href="#" data-bs-toggle="modal" data-bs-target="#createPackageModal">Add new client</a><br><br>


    <table border="">
         
         <tr>
          <th>slno</th>
          <th>Client Name</th>
          <th>Mobile No.</th>
          <th>Tour Package</th>
          <th>Schedule</th>
          <th>transportation</th>
          <th>Pickup Location</th>
          <th>Pickup Time</th>
          <th>Status</th>
          <th>action</th>
         </tr>

         <?php 
          
          $query = "select * from booking order by slno ASC";

          $statement= $connection->prepare($query);

          $statement ->execute();

          $result = $statement->fetchAll();

          $slno = 1;

          foreach($result as $row)

            echo '<tr>
                  
                  <td>'.$row["slno"].'</td>
                  <td>'.$row["clientname"].'</td>
                  <td>'.$row["mobile"].'</td>
                  <td>'.$row["tourpackage"].'</td>
                  <td>'.$row["schedule"].'</td>
                  <td>'.$row["transportation"].'</td>
                  <td>'.$row["pickuplocation"].'</td>
                  <td>'.$row["pickuptime"].'</td>
                  <td>'.$row["status"].'</td>
                   
                   <td>

                   <button onclick="editform('.$row["slno"].', \''.$row["clientname"].'\', \''.$row["mobile"].'\', \''.$row["tourpackage"].'\', \''.$row["schedule"].'\', \''.$row["transportation"].'\', \''.$row["pickuplocation"].'\', \''.$row["pickuptime"].'\', \''.$row["status"].'\')">Edit</button>

                   <form method="post" style="display:inline;"> 

                   <input type="hidden" name="slno" value="'.$row["slno"].'">

                   <button type="submit" name="remove" onclick="return confirm(\'are you sure you want to cancel the booking?\')">cancel</button>

                   <button type="submit" name="confirm" onclick="return confirm(\'you have confirm client request\')">confirm</button>

                   </form>

                   </td>

          </tr>';

          $slno++;
 
          ?>
      
    </table>
  </div>


<div class="modal fade" id="createbookingModal" tabindex="-1" aria-labelledby="createPackageModalLabel" aria-hidden="true">

    <div class="modal-dialog">

      <form method="post">
      
        <div class="modal-content">

          <div class="modal-header">

            <h5 class="modal-title" id="createPackageModalLabel">Book Client</h5>

            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

          </div>

          <div class="modal-body">
            <div class="mb-3">

              <label class="form-label">slno</label>

              <input type="text" class="form-control" id="slno" name="slno" required>
            </div>

            <div class="mb-3">

              <label class="form-label">Client Name</label>

              <input type="text" class="form-control" id="name" name="clientname" required>
            </div>

            <div class="mb-3">

              <label class="form-label">Mobile Number</label>

              <input type="text" class="form-control" id="mobile" name="mobile" required>
            </div>

            <div class="mb-3">

              <label class="form-label">Tour Package</label>

              <input type="text" class="form-control" id="package" name="tourpackage" >

            </div>
            <div class="mb-3">

              <label class="form-label">Schedule</label>

              <input type="date" class="form-control" id="schedule" name="schedule" required>

            </div>

            <div class="mb-3">

              <label class="form-label">Transportation</label>

              <input type="text" class="form-control" id="transportation" name="transportation" required>

            </div>
            
            <div class="mb-3">

              <label class="form-label">Pickup loaction</label>

              <input type="text" class="form-control" id="pickuplocation" name="pickuplocation" required>

            </div>

            <div class="mb-3">

              <label class="form-label">Pickup Time</label>

              <input type="time" class="form-control" id="packuptime" name="pickuptime" required>

            </div>

            <!--<div class="mb-3">

              <label class="form-label">Status</label>

              <input type="text" class="form-control" id="status" name="status" required>

            </div>-->

          </div>
          <div class="modal-footer">

            <button type="submit" class="btn btn-primary" name="booking">book</button>

            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

          </div>
        </div>
      </form>
    </div>
  </div>


<div class="modal fade" id="editPackageModal" tabindex="-1" aria-labelledby="createPackageModalLabel" aria-hidden="true" id="editform">

    <div class="modal-dialog">

      <form method="post">
      
        <div class="modal-content">

          <div class="modal-header">

            <h5 class="modal-title" id="createPackageModalLabel">Update booking</h5>

            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

          </div>

          <div class="modal-body">
            <div class="mb-3">

              <label class="form-label">slno</label>

              <input type="text" class="form-control" id="edit-slno" name="slno" required>
            </div>

            <div class="mb-3">

              <label class="form-label">Client Name</label>

              <input type="text" class="form-control" id="edit-name" name="clientname" required>
            </div>

            <div class="mb-3">

              <label class="form-label">Mobile Number</label>

              <input type="text" class="form-control" id="edit-mobile" name="mobile" required>
            </div>

            <div class="mb-3">

              <label class="form-label">Tour Package</label>

              <input type="text" class="form-control" id="edit-package" name="tourpackage" >

            </div>
            <div class="mb-3">

              <label class="form-label">Schedule</label>

              <input type="date" class="form-control" id="edit-schedule" name="schedule" required>

            </div>

            <div class="mb-3">

              <label class="form-label">Transportation</label>

              <input type="text" class="form-control" id="edit-transportation" name="transportation" required>

            </div>
            
            <div class="mb-3">

              <label class="form-label">Pickup loaction</label>

              <input type="text" class="form-control" id="edit-pickuplocation" name="pickuplocation" required>

            </div>

            <div class="mb-3">

              <label class="form-label">Pickup Time</label>

              <input type="time" class="form-control" id="edit-packuptime" name="pickuptime" required>



            </div>

            <div class="mb-3">

              <label class="form-label">Status</label>

              <input type="text" class="form-control" id="edit-status" name="status" required>

            </div>

          </div>
          <div class="modal-footer">

            <button type="submit" class="btn btn-primary" name="update">Update</button>
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>


          </div>
        </div>
      </form>
    </div>
  </div>

</center>

  <!-- Bootstrap 5 JS (with Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
  
  function editform(slno, clientname, mobile, tourpackage, schedule, transportation, pickuplocation, pickuptime, status) {
  const modal = new bootstrap.Modal(document.getElementById('editPackageModal'));

  document.getElementById('edit-slno').value = slno;
  document.getElementById('edit-name').value = clientname;
  document.getElementById('edit-mobile').value = mobile;
  document.getElementById('edit-package').value = tourpackage;
  document.getElementById('edit-schedule').value = schedule;
  document.getElementById('edit-transportation').value = transportation;
  document.getElementById('edit-pickuplocation').value = pickuplocation;
  document.getElementById('edit-packuptime').value = pickuptime;
  document.getElementById('edit-status').value = status;

  modal.show();
}



</script>

</body>
</html>