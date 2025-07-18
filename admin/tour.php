<?php 

$connection = new PDO("mysql:host=localhost;dbname=tourismmanagement", "root", "");

?>

<?php 

if (isset($_POST['send'])) 
{
    //$place = $_POST['place'];
    $place = $_POST['place'];
    //$packagedays = $_POST['packagedays'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    $image = $_FILES['image'];
    $image_name = $image['name'];
    $image_tmp_name = $image['tmp_name'];
    $image_destination = '../uploads/' . $image_name;

    if (move_uploaded_file($image_tmp_name, $image_destination)) 
    {
        $query = "INSERT INTO tourplace(place, image, description, price, status)
                  VALUES (:place, :image, :description, :price, :status)";

        $statement = $connection->prepare($query);

        $statement->execute([
            ':place' => $place,
            ':image' => $image_name,
            
            ':description' => $description,
            ':price' => $price,
            ':status' => $status
        ]);

        echo "<script>alert('Package successfully added!');</script>";

        header("Location: tour.php");
        exit;
        
    }
    else 
    {
        echo "<script>alert('Image upload failed.');</script>";
        exit;
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $place = $_POST['place'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $tourdate = $_POST['tourdate'];

    $image_name = $_POST['existing_image']; // fallback

    if (!empty($_FILES['image']['name'])) 
    {
        $image = $_FILES['image'];
        $image_name = $image['name'];
        $image_tmp_name = $image['tmp_name'];
        $image_destination = '../uploads/' . $image_name;

        move_uploaded_file($image_tmp_name, $image_destination);
    }

    $query = "UPDATE tourplace 
              SET place = :place, image = :image, description = :description, price = :price, status = :status, tourdate = :tourdate 
              WHERE id = :id";

    $statement = $connection->prepare($query);

    $statement->execute([
        ':place' => $place,
        ':image' => $image_name,
        ':description' => $description,
        ':price' => $price,
        ':status' => $status,
        ':tourdate' => $tourdate,
        ':id' => $id
    ]);

    echo "<script>alert('Package updated successfully.'); window.location.href='tour.php';</script>";
    exit;
}

 if(isset($_POST['remove']))
     {

      $query = "delete from tourplace where id = :id";

      $statement = $connection->prepare($query);

      $statement->execute(array(':id'=>$_POST['id']));

    echo "<script>alert('You have canceled your tour place');</script>";
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
	.tour-place{
		  font-weight: bold;
		  margin: 20px;
       margin-top: 30px;

	}

  .tour-place a{
    color: darkblue;
    text-decoration: none;
    font-size: 20px;
    font-weight: bold;
    background-color: ghostwhite;
    padding: 10px;
  }

	.tour-place th{
		/*border: 1px solid #ddd;*/
		    border: 1px solid;
        padding: 10px;
        ext-align: center;
        vertical-align: middle;
        font-size: 18px;
        font-weight: bold;
        word-wrap: break-word;
        overflow-wrap: break-word;
        color: black;

	}

	.tour-place td{
		border: 1px solid;
		padding: 10px;
        text-align: center;
        vertical-align: middle;
        font-size: 15px;
        word-wrap: break-word;
        overflow-wrap: break-word;
	}

</style>

<body>

 <?php include'navbar.php' ?>


<center>
	<div class="tour-place">	
      
       <a href="#" data-bs-toggle="modal" data-bs-target="#createPackageModal">Create New Tour Place</a><br><br>


		<table border="">
         
         <tr>
         	<th>slno</th>
         	<th>Tour place</th>
          <th>Image</th>
         	<th>description</th>
          <th>tour date</th>
         	<th>price</th>
         
         	<th>status</th>
         	<th>action</th>
         </tr>

         <?php

         $query = "SELECT * FROM tourplace ORDER BY id ASC";

         $statement = $connection->prepare($query);

         $statement->execute();

         $result = $statement->fetchAll();

         $id = 1;

         foreach ($result as $row) 
 
          echo '<tr>
                <td>'.$row["id"].'</td>

                <td>'.$row["place"].'</td>

                 <td><img src="../uploads/'.$row["image"].'" width="100"></td>

                <td>'.$row["description"].'</td>

                <td>'.$row["tourdate"].'</td>

                <td>'.$row["price"].'</td>
                
                <td>'.$row["status"].'</td>

                <td>

                <button onclick="editform('.$row["id"].', \''.$row["place"].'\', \''.$row["image"].'\', \''.$row["description"].'\', \''.$row["tourdate"].'\', \''.$row["price"].'\', \''.$row["status"].'\')">Edit</button>

                <form method="post" style="display:inline;">

            <input type="hidden" name="id" value="'.$row["id"].'">

            <button type="submit" name="remove" onclick="return confirm(\'Are you sure you want to cancel this booking?\')">cancel </button>

              </form>

                </td>

      </tr>';

      $id++;


          ?>
			
		</table>
	</div>


<div class="modal fade" id="createPackageModal" tabindex="-1" aria-labelledby="createPackageModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <div class="modal-header">

          <h5 class="modal-title" id="createPackageModalLabel">Create New Tour</h5>

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

        </div>

        <div class="modal-body">
          <div class="mb-3">

            <label for="place" class="form-label">Tour place</label>

            <input type="text" class="form-control" id="place" name="place" required>

          </div>

          <div class="mb-3">

            <label for="image" class="form-label">Add place Image</label>

            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
          </div>

          <div class="mb-3">

            <label for="price" class="form-label">Price</label>

            <input type="text" class="form-control" id="price" name="price" required>

          </div>

          <div class="mb-3">
            <label for="description" class="form-label">Description</label>

            <textarea class="form-control" id="description" name="description" required></textarea>

          </div>

          <div class="mb-3">

            <label for="tourdate" class="form-label">Tour date</label>

            <input type="date" class="form-control" id="place" name="tourdate" required>

          </div>

          <div class="mb-3">
            <label for="status" class="form-label">Status</label>

            <select class="form-select" id="status" name="status" required>

              <option value="active">Active</option>

              <option value="inactive">Inactive</option>

            </select>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="send">Add Tour</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

        </div>

      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="editPackageModal" tabindex="-1" aria-labelledby="createPackageModalLabel" aria-hidden="true" id="editform">

  <div class="modal-dialog" >

    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <div class="modal-header">

          <h5 class="modal-title" id="createPackageModalLabel">Update Tour Place</h5>

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

        </div>

        <div class="modal-body">
          

            <input type="hidden" id="edit-id" name="id" required>

            <input type="hidden" id="existing-image" name="existing_image">


          <div class="mb-3">

            <label for="place" class="form-label">Tour place</label>

            <input type="text" class="form-control" id="edit-place" name="place" required>

          </div>

          <div class="mb-3">

            <label for="image" class="form-label">Add place Image</label>

            <input type="file" class="form-control" id="edit-image" name="image" accept="image/*" >
          </div>

          <div class="mb-3">

            <label for="price" class="form-label">Price</label>

            <input type="text" class="form-control" id="edit-price" name="price" required>

          </div>

          <div class="mb-3">
            <label for="description" class="form-label">Description</label>

            <textarea class="form-control" id="edit-description" name="description" required></textarea>

          </div>

          <div class="mb-3">

            <label for="tourdate" class="form-label">Tour date</label>

            <input type="date" class="form-control" id="edit-tourdate" name="tourdate" required>
          </div>

          <div class="mb-3">
            <label for="status" class="form-label">Status</label>

            <select class="form-select" id="edit-status" name="status" >

              <option value="active">Active</option>

              <option value="inactive">Inactive</option>

            </select>
          </div>
        </div>

        
          <button type="" class="btn btn-primary" name="update">Update</button>
          

        </div>

      </form>
    </div>

</center>

<script>
function editform(id, place, image, description, tourdate, price, status) 
{
  const modal = new bootstrap.Modal(document.getElementById('editPackageModal'));

  document.getElementById('edit-id').value = id;

  document.getElementById('edit-place').value = place;

  document.getElementById('edit-description').value = description;

  document.getElementById('edit-tourdate').value = tourdate;

  document.getElementById('edit-price').value = price;

  document.getElementById('edit-status').value = status;

  document.getElementById('existing-image').value = image;

  modal.show();
}
</script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>