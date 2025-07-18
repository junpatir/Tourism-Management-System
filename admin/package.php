
<?php 

$connection = new PDO("mysql:host=localhost;dbname=tourismmanagement", "root", "");

?>

<?php 

if (isset($_POST['send'])) {
    $destiny = $_POST['destiny'];
    $packagedays = $_POST['packagedays'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    $image = $_FILES['image'];
    $image_name = $image['name'];
    $image_tmp_name = $image['tmp_name'];
    $image_destination = '../uploads/' . $image_name;

    if (move_uploaded_file($image_tmp_name, $image_destination)) 
    {
        $query = "INSERT INTO destiny(destiny, image, packagedays, description, price, status)
                  VALUES (:destiny, :image, :packagedays, :description, :price, :status)";
        $statement = $connection->prepare($query);

        $statement->execute([
            ':destiny' => $destiny,
            ':image' => $image_name,
            ':packagedays' => $packagedays,
            ':description' => $description,
            ':price' => $price,
            ':status' => $status
        ]);

        echo "<script>alert('Package successfully added!');</script>";

        header("Location: package.php");
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
    $destiny = $_POST['destiny'];
    $packagedays = $_POST['packagedays'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    $query = "UPDATE destiny SET destiny = :destiny, packagedays = :packagedays, description = :description, price = :price, status = :status WHERE id = :id";
    $stmt = $connection->prepare($query);
    $stmt->execute([
        ':id' => $id,
        ':destiny' => $destiny,
        ':packagedays' => $packagedays,
        ':description' => $description,
        ':price' => $price,
        ':status' => $status
    ]);

    echo "<script>alert('Package updated successfully.'); window.location='package.php';</script>";
    exit;
}

if (isset($_POST['remove'])) 
{
    $query = "delete from destiny where id = :id";

    $statement = $connection->prepare($query);

    $statement->execute(array(':id'=>$_POST['id']));

    echo"<script>alert('Package Trip removed successfully');</script>";
}

 ?>

 <!--book tour package-->

 <?php 

 if (isset($_POST['book'])) 
{
    $destiny = $_POST['destiny'];
    $pickuplocation = $_POST['pickuplocation'];
    $pickupdate = $_POST['pickupdate'];
    $packagedays = $_POST['packagedays'];
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

       echo "<script>alert('Package successfully added!');window.location.href='package.php?id=$id';</script>";


        /*header("Location: package.php");
        exit;*/
        
    } 

  ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<link rel="stylesheet" type="text/css" href="style.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style type="text/css">

  #create-package{
    color: black;
    font-size: 20px;
  }

  .createPackageModal{
    color: black;
  }

  .table-package{
      font-weight: bold;
      margin: 20px;

  }

    .table-package button{
        margin: 3px;
    }

  .table-package th{
    border: 1px solid;
        padding: 10px;
        ext-align: center;
        vertical-align: middle;
        font-size: 15px;
        word-wrap: break-word;
        overflow-wrap: break-word;
        color: black;

  }

 #package{
  border-collapse: collapse;
  width: 99%;
  max-width: 1000px;
  table-layout: fixed;
  word-wrap: break-word;
  overflow-wrap: break-word;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
  }

  #package th, #package td {
  word-wrap: break-word;
  overflow-wrap: break-word;
}

#package td button {
  padding: 6px 6px;
  font-size: 15px;
  margin: 2px;
  display: inline-block;
  max-width: 100%;
  border-radius: 6px;
}

  .table-package td{
    border: 1px solid;
    padding: 10px;
        text-align: center;
        vertical-align: middle;
        font-size: 15px;
        word-wrap: break-word;
        overflow-wrap: break-word;
  }

  .table-package{
    margin-top: 25px;

  }

  .table-package a{
    color: whitesmoke;
    font-size: 20px;
    font-weight: bold;
    text-decoration: none;
    border: 1px solid;
    background-color: blue;
    padding: 10px;
    
  }

  #add-packageTour{
    border: 1px solid;
    max-width: 700px;
    width: 85%;
    margin: 10px;
    background-color: ghostwhite;
    padding: 30px;
  }

   #add-packageTour input{
     max-width: 350px;
     width: 60%;
     height: 40px;
     font-size: 17px;
     text-align: center;
     border-radius: 5px;
   }

   #add-packageTour select{
    max-width: 350px;
     width: 60%;
     height: 40px;
     font-size: 17px;
     text-align: center;
     border-radius: 5px;
   }

    #add-packageTour button{
        background-color: red;
        color: white;
        width: 150px;
        border-radius: 5px;
        font-size: 18px;
        padding: 5px;
    }
    
     #add-packageTour button:hover{
        background-color: #FFB09C;
        transition: 0.8s;
     }

</style>

<body>

 <?php include'navbar.php' ?>


<center>
  <div class="table-package"> 
      
       <a href="#" data-bs-toggle="modal" data-bs-target="#createPackageModal">Create New package</a><br><br>


    <table border="" id="package">
         
         <tr>
          <th>slno</th>
          <th>Package</th>
          <th>Image</th>
          <th>Package days</th>
          <th>description</th>
          <th>price</th>
          <!--th>tour date</th>-->
          <th>status</th>
          <th>action</th>
         </tr>

         <?php    

         $query = "SELECT * FROM destiny ORDER BY id ASC";

         $statement = $connection->prepare($query);

         $statement->execute();

         $result = $statement->fetchAll();

        // $id = 1;

         
$editId = isset($_POST['edit_id']) ? $_POST['edit_id'] : null;

foreach ($result as $row) 
{
    if ($editId == $row["id"])
     {
        echo '
        <form method="post">
        <tr>
            <td>'.$row["id"].'<input type="hidden" name="id" value="'.$row["id"].'"></td>

            <td><input type="text" name="destiny" value="'.htmlspecialchars($row["destiny"]).'" class="form-control" required></td>

            <td><img src="../uploads/'.$row["image"].'" width="100"></td>

            <td><input type="number" name="packagedays" value="'.$row["packagedays"].'" class="form-control" required></td>

            <td><textarea name="description" class="form-control">'.htmlspecialchars($row["description"]).'</textarea></td>

            <td><input type="text" name="price" value="'.$row["price"].'" class="form-control" required></td>

            <td>
                <select name="status" class="form-select">
                    <option value="active" '.($row["status"]=="active"?"selected":"").'>Active</option>
                    <option value="inactive" '.($row["status"]=="inactive"?"selected":"").'>Inactive</option>
                </select>
            </td>

            <td>
                <button type="submit" name="update" class="btn btn-success">Save</button>
                <a href="package.php" class="btn btn-secondary">Cancel</a>

            </td>
        </tr>
        </form>';
    } 
    else 
    {
        echo '
        <tr>
            <td>'.$row["id"].'</td>

            <td>'.$row["destiny"].'</td>

            <td><img src="../uploads/'.$row["image"].'" width="100"></td>

            <td>'.$row["packagedays"].'</td>

            <td>'.$row["description"].'</td>

            <td>'.$row["price"].'</td>

            <td>'.$row["status"].'</td>

            <td>
                <form method="post" style="display:inline; ">

                    <input type="hidden" name="edit_id" value="'.$row["id"].'">

                    <button type="submit" class="btn btn-danger btn-sm">Edit</button>

                </form>

                <form method="post" style="display:inline;">

                    <input type="hidden" name="id" value="'.$row["id"].'">

                    <button type="submit" name="remove" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')">Remove</button>

                </form>
            </td>
        </tr>';
    }
}

?>
      <!--$id++;

          ?>-->
      
    </table>
  </div>


<div class="modal fade" id="createPackageModal" tabindex="-1" aria-labelledby="createPackageModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <div class="modal-header">

          <h5 class="modal-title" id="create-package">Create New Package</h5>

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

        </div>

        <div class="modal-body">

          <div class="mb-3">

            <label for="destiny" class="form-label">Package Name</label>

            <input type="text" class="form-control" id="destiny" name="destiny" required>

          </div>

          <div class="mb-3">

            <label for="image" class="form-label">Add Destiny Image</label>

            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>

          </div>

          <div class="mb-3">

            <label for="packagedays" class="form-label">Package Days</label>

            <input type="number" class="form-control" id="packagedays" name="packagedays" required>

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

            <label for="status" class="form-label">Status</label>

            <select class="form-select" id="status" name="status" required>

              <option value="active">Active</option>

              <option value="inactive">Inactive</option>

            </select>
          </div>


        </div>

        <div class="modal-footer">

          <button type="submit" class="btn btn-primary" name="send">Save Package</button>

          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

        </div>
      </form>
    </div>
  </div>
</div>

</center>

<div class="modal fade" id="editPackageModal" tabindex="-1" aria-labelledby="editPackageLabel" aria-hidden="true">

    <div class="modal-dialog">

        <form method="post">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title">Edit Package</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="id" id="edit-id">

                    <div class="mb-3">
                        <label class="form-label">Destiny</label>
                        <input type="text" class="form-control" name="destiny" id="edit-destiny">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Days</label>
                        <input type="number" class="form-control" name="packagedays" id="edit-days">
                          
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="edit-description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" class="form-control" name="price" id="edit-price">
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status" id="edit-status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" name="update" class="btn btn-success">Update</button>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                </div>
            </div>
        </form>
    </div>
</div>

<script>

function openEditModal(data) 
{
    document.getElementById('edit-id').value = data.id;

    document.getElementById('edit-destiny').value = data.destiny;

    document.getElementById('edit-days').value = data.packagedays;

    document.getElementById('edit-description').value = data.description;

    document.getElementById('edit-price').value = data.price;

    document.getElementById('edit-status').value = data.status;

    var editModal = new bootstrap.Modal(document.getElementById('editPackageModal'));
    editModal.show();
}
</script>

<center>
<div id="add-packageTour">

    <form method="post">

        Package Name:<br>
        <select name="destiny" onchange="this.form.submit()">

            <option value="">-- Select Package --</option>

            <?php 
            $query = "SELECT * FROM destiny";

            $statement = $connection->prepare($query);

            $statement->execute();

            $packages = $statement->fetchAll(PDO::FETCH_ASSOC);

           $selected_package = isset($_POST['destiny']) ? $_POST['destiny'] : '';

foreach ($packages as $package) 
{
    $selected = ($selected_package == $package['destiny']) ? 'selected' : '';
    
    echo '<option value="' . htmlspecialchars($package['destiny']) . '" ' . $selected . '>' . htmlspecialchars($package['destiny']) . '</option>';
}

$packagedays = '';
$price = '';
if ($selected_package != '') 
{
    foreach ($packages as $package) 
    {
        if ($package['destiny'] == $selected_package) 
        {
            $packagedays = $package['packagedays'];
            $price = $package['price'];
            break;
        }
    }
}
            ?>
        </select><br><br>

        Enter Pickup Location<br><input type="text" name="pickuplocation"><br><br>

        Enter Pickup Date<br><input type="date" name="pickupdate"><br><br>

        Days<br>
        <input type="text" name="packagedays" value="<?php echo htmlspecialchars($packagedays); ?>" readonly><br><br>

        Enter Package Price<br>
        <input type="text" name="price" value="<?php echo htmlspecialchars($price); ?>" readonly><br><br>

        Enter Drop-Off Date<br><input type="date" name="dropoffdate"><br><br>

        Enter Drop-Off Location<br><input type="text" name="dropofflocation"><br><br>

        <button type="submit" name="book">Book</button>

    </form>
</div>
</center>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>