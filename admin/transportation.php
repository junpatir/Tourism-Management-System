<?php 

$connection = new PDO("mysql:host=localhost;dbname=tourismmanagement", "root", "");

?>

<?php 

  if (isset($_POST['send'])) 
{   
    $id = $_POST['id'];
    $category = $_POST['category'];
    $vmodel = $_POST['vmodel'];
    $modelno = $_POST['modelno'];
    $rentfee = $_POST['rentfee'];
    $image_name = $_POST['existing_image'];

    if(!empty($_FILES['image']['name']))

    { 
      $image = $_FILES['image'];
    $image_name = $image['name'];
    $image_tmp_name = $image['tmp_name'];
    $image_destination = "../uploads/" . $image_name;
    move_uploaded_file($image_tmp_name, $image_destination);

    }

    if(!empty($id))
    {
      $query = "update transportation set category = :category, vmodel = :vmodel, modelno = :modelno, rentfee = :rentfee, image = :image where id = :id";

        $statement = $connection->prepare($query);

        $statement->execute([
            ':category' => $category,
            ':vmodel' => $vmodel,
            ':modelno' => $modelno,
            ':rentfee' => $rentfee,
            ':image' => $image_name,
            ':id' => $id
        ]);
        echo "<script>alert('Transportation updated'); window.location.href='transportation.php';</script>";
        exit;
    }
   else 
   {
    $query = "insert into transportation (category, vmodel, modelno, rentfee, image) VALUES (:category, :vmodel, :modelno, :rentfee, :image)";
        $statement = $connection->prepare($query);

        $statement->execute([
            ':category' => $category,
            ':vmodel' => $vmodel,
            ':modelno' => $modelno,
            ':rentfee' => $rentfee,
            ':image' => $image_name
        ]);

        echo "<script>alert('Transportation added'); window.location.href='transportation.php';</script>";
        exit;
   }
  }

if(isset($_POST['remove']))
{
  $query = "delete from transportation where id = :id";

  $statement = $connection->prepare($query);

  $statement->execute(array(':id' =>$_POST['id']));

  echo"<script>alert('You Have Cancelled your Transportation Details');</script>";
}

?>
 
<?php 

if(isset($_POST['book']))
{
    $category = $_POST['category'];
    $vmodel = $_POST['vmodel'];
    $rentfee = $_POST['rentfee'];
    $picklocation = $_POST['picklocation'];
    $bookingdate =$_POST['bookingdate'];
    $bookingtime =$_POST['bookingtime'];
    $dropdate =$_POST['dropdate'];
    $droplocation =$_POST['droplocation'];
    $status = 'confirm';

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

  #add-transportation{
    border: 1px  solid;
    max-width: 800px;
    width: 80%;
    margin: 10px;
    padding: 15px;
    font-size: 20px;
  }

#rentModal select{
    max-width: 400px;
    width: 70%;
    height: 43px;
    text-align: center;
    border-radius: 5px;
}

  #add-transportation input{
     margin: 8px;
     padding: 10px;
     max-width: 400px;
     width: 70%;
     height: 43px;
     border-radius: 5px;
     font-size: 18px;
     text-align: center;
  }

    .transportation-form{
          font-weight: bold;
          margin: 12px;

    }

  .transportation-form a{
    color: black;
    background-color: ghostwhite;
    text-decoration: none;
    padding: 10px;
  }

    .transportation-form th{
        border: 1px solid;
        padding: 10px;
        ext-align: center;
        vertical-align: middle;
        font-size: 18px;
        word-wrap: break-word;
        overflow-wrap: break-word;
       
    }

    .transportation-form td{
        border: 1px solid;
        padding: 10px;
        text-align: center;
        vertical-align: middle;
        font-size: 15px;
        word-wrap: break-word;
        overflow-wrap: break-word;
    }

    .transportation-form button{
      color: white;
      background: red;
      margin: 3px;
      border-radius: 5px;
    }

    .transportation-form button:hover{
      background-color: #FFB09C;
      transition: 0.8s;
    }

    .modal-box{
      background-color: ghostwhite;
    }

    .modal-box button{
      background: red;
      padding: 7px;
      border-radius: 5px;
    }

    .modal-box button:hover{
       background-color: #FFB09C;
        transition: 0.8s;
    }

 #transport-table{
  border-collapse: collapse;
  width: 100%;
  max-width: 1000px;
  table-layout: fixed;
  word-wrap: break-word;
  overflow-wrap: break-word;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
  }

  #transport-table th, #transport-table td {
  word-wrap: break-word;
  overflow-wrap: break-word;
}

#transport-table td button {
  padding: 6px 6px;
  font-size: 15px;
  margin: 2px;
  display: inline-block;
  max-width: 100%;
  border-radius: 6px;
}

@media screen and (max-width: 768px) {
  #transport-table img {
    max-width: 100%;
    height: auto;
    display: block;
    margin: auto;
  }

  #transport-table td {
    text-align: center;
  }
}

 
</style>

<body>

 <?php include'navbar.php' ?>

<center>
    <div class="transportation-form">   
      
       <a href="#" data-bs-toggle="modal" data-bs-target="#createPackageModal">Create a new transportation</a><br><br>


        <table border="" id="transport-table">
         
         <tr>
            <th>slno</th>
            <th>Category</th>
            <th>Vehical No.</th>
            <th>Model No.</th>
            <th>Rent</th>
            <th>Image</th>
            <th>Action</th>
         </tr>

         <?php

         $query = "select * from transportation";

         $statement = $connection->prepare($query);

         $statement->execute();

         $result = $statement->fetchAll();

         $id = 1;

         foreach ($result as $row) 
 
          echo '<tr>

                <td>'.$row["id"].'</td>
                <td>'.$row["category"].'</td>
                <td>'.$row["vmodel"].'</td>
                <td>'.$row["modelno"].'</td>
                <td>'.$row["rentfee"].'</td>

                <td><img src="../uploads/'.$row["image"].'" width="100"></td>

                <td>

                <button onclick="edit('.$row["id"].', \''.$row["category"].'\', \''.$row["vmodel"].'\', \''.$row["modelno"].'\', \''.$row["rentfee"].'\', \''.$row["image"].'\')" data-bs-toggle="modal" data-bs-target="#createPackageModal">Edit</button>

                <form method="post">

                <input type="hidden" name="id" value="'.$row["id"].'">

                <button type="submit" name="remove" onclick="return confirm(\'are you sure you want to cancel this transportation?\')">Cancel</button>

                </td>

                </form>
               
      </tr>';

      $id++;

          ?>

        </table>
    </div>

<div class="modal fade" id="createPackageModal" tabindex="-1" aria-labelledby="createPackageModalLabel" aria-hidden="true">

    <div class="modal-dialog">

      <form method="post" enctype="multipart/form-data">
       
        <div class="modal-content">

          <div class="modal-header">

            <h5 class="modal-title" id="createPackageModalLabel">Create New Trasnportation</h5>

            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

          </div>

          <div class="modal-body">
            <input type="hidden" name="id" id="edit-id">

            <input type="hidden" name="existing_image" id="edit-existing-image">

            <div class="mb-3">

              <label class="form-label">category</label>

              <input type="text" class="form-control" id="edit-category" name="category" required>
            </div>

            <div class="mb-3">

              <label class="form-label">vehical No.</label>

              <input type="text" class="form-control" id="edit-vmodel" name="vmodel" required>
            </div>

            <div class="mb-3">

              <label class="form-label">model No.</label>

              <input type="text" class="form-control" id="edit-modelno" name="modelno" required>
            </div>

            <div class="mb-3">

              <label class="form-label" name="rentfee">rent fee</label>

              <textarea class="form-control" id="edit-rentfee" name="rentfee" required></textarea>

            </div>
          
            <div class="mb-3">

              <label class="form-label">vehical image</label>

              <input type="file" class="form-control" id="edit-image" name="image" accept="image/*" >
            </div>

            
          <div class="modal-footer">

            <button type="submit" class="btn btn-primary" name="send">Save Package</button>

            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

          </div>
        </div>
      </form>
    </div>
  </div>

</center>

<script>
function edit(id, category, vmodel, modelno, rentfee, image)
 {
    document.getElementById('edit-id').value = id;
    document.getElementById('edit-category').value = category;
    document.getElementById('edit-vmodel').value = vmodel;
    document.getElementById('edit-modelno').value = modelno;
    document.getElementById('edit-rentfee').value = rentfee;
    document.getElementById('edit-existing-image').value = image;

}
</script>

<center>
<div id="add-transportation">
    
   
<form method="POST">

<div class="modal-overlay" id="rentModal">

    <div class="modal-box">
        
      <h2>Book Car Now</h2>

      <label>Enter Category</label><br>
      <select name="category" id="pickcategory" onchange="fillDetails()" required >

        <option value="">Select Category</option>

        <?php 
         
         $query = "select * from transportation";

         $statement = $connection->prepare($query);

         $statement->execute();

         $vehicles = $statement->fetchAll(PDO::FETCH_ASSOC);

         $vehicleData = [];

         foreach ($vehicles as $vehicle) 
         {

        echo "<option value='" . htmlspecialchars($vehicle['category']) . "'>" . htmlspecialchars($vehicle['category']) . "</option>";

        $vehicleData[$vehicle['category']] = 
        [
           'vmodel' => $vehicle['vmodel'],
            'rentfee' => $vehicle['rentfee']
        ];
         }

         ?>

      </select><br><br>

      <label>Enter Vehical No.</label><br>
      <input type="text" name="vmodel" id="vehicle-model" readonly><br><br>

      <label>Enter Rent</label><br>

      <input type="text" name="rentfee" id="vehicle-rent" readonly><br><br>

      Enter Pickup Location<br><input type="text" name="picklocation" id="picklocation" required><br><br>

      Enter Pickup Date<br><input type="date" name="bookingdate" id="bookdate" required><br><br>

      Enter Pickup Time<br><input type="time" name="bookingtime" id="picktime" required><br><br>

      Enter Drop-off Date<br><input type="date" name="dropdate" id="dropdate" required><br><br>

      Enter Drop-off Location<br><input type="text" name="droplocation" id="droplocation" required><br><br>

      <input type="hidden" name="status">

      <button type="submit" name="book">Confirm Booking</button><br><br>

    </div>
  </div>
</form>
</div>
</center>

<script>
const vehicleInfo = <?php echo json_encode($vehicleData); ?>;

function fillDetails()
 {
    const selectedCategory = document.getElementById('pickcategory').value;
    
    const modelField = document.getElementById('vehicle-model');

    const rentField = document.getElementById('vehicle-rent');

    if (vehicleInfo[selectedCategory]) 
    {
        modelField.value = vehicleInfo[selectedCategory]['vmodel'];
        rentField.value = vehicleInfo[selectedCategory]['rentfee'];
    } 
    else 
    {
        modelField.value = '';
        rentField.value = '';
    }
}
</script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>