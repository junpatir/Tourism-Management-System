<?php
if (session_status() === PHP_SESSION_NONE) {
}

$connection = new PDO("mysql:host=localhost;dbname=tourismmanagement","root","");

// Handle login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM loginpage WHERE username = :username AND password = :password";
    $statement = $connection->prepare($query);
    $statement->execute([
        ':username' => $username,
        ':password' => $password
    ]);

    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['email'] = $username;
        echo "<script>alert('You have successfully logged in.'); window.location.href='index.php';</script>";
        exit();
    } else {
        echo "<script>alert('Incorrect email or password. Please register if you don\'t have an account.');</script>";
    }
}
?>

<?php if (isset($_GET['logged_out']) && $_GET['logged_out'] == 'true'): ?>
  <script>
    alert("You have successfully logged out.");
  </script>
<?php endif; ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Navbar</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


  <style>

    .navbar {
      background-color: floralwhite;
      font-size: 20px;
      position: sticky;
      z-index: 1000;
      /*height: 100px;*/  
      top: 0;

    }

      .container ul li a{
         color: black;
         text-decoration: none;
         padding: 15px;
         /*top: -5px;*/
         
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

    /*.navbar a:hover {
    text-decoration: underline;
} to show underline in hyperlink when touch to hyperlink*/


  </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: floralwhite; font-size: 20px;">

  <div class="container">

    <!--<a class="navbar-brand" href="index.php">Tourism Management</a>-->

    <h5>Tourism Management</h5>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

      <span class="navbar-toggler-icon"></span>

    </button>

    <div class="collapse navbar-collapse" id="navbarNav">

      <ul class="navbar-nav ms-auto">

         <li class="nav-item me-3"><a class="nav-link" href="index.php">HOME</a></li>

        <li class="nav-item me-3"><a class="nav-link" href="index.php#tour-package">TOURPACKAGES</a></li>

        <li class="nav-item me-3"><a class="nav-link" href="index.php#Available-hotel">HOTELS</a></li>

        <li class="nav-item me-3"><a class="nav-link" href="index.php#tour">TRANSPORTATION</a></li>
 
        <li class="nav-item me-2"><a class="nav-link" href="index.php#gallery">GALLERY</a></li>
 
        <li class="nav-item me-3"><a class="nav-link" href="index.php#about-us">ABOUT US</a></li>

        <li class="nav-item me-3"><a class="nav-link" href="profile.php">PROFILE</a></li>

        <li class="nav-item"><a class="nav-link" href="index.php#contactus">CONTACT US</a></li>

      <li class="nav-item me-3 text-end">

  <?php if (isset($_SESSION['email'])): ?>

    <a class="nav-link" href="?logout=true">LOGOUT</a>

    <div class="text-primary" style="font-size: 13px;">

      Logged in as: <?php echo htmlspecialchars($_SESSION['email']); ?>

    </div>

  <?php else: ?>

    <a class="nav-link" href="#" onclick="showLoginModal()">LOGIN</a>



  <?php endif; ?>

</li>



      </ul>


    </div>
  </div>
</nav>

 <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

      <div class="modal-content">

        <div class="modal-header">

          <h5 class="modal-title" id="loginModalLabel">Login</h5>

          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

        </div>

        <div class="modal-body">

          <form id="loginForm" method="post">

            <input type="email" class="form-control mb-3" id="emailInput" name="username" placeholder="Email" required>

            <input type="password" class="form-control mb-3"  name="password" placeholder="Password" required>

            <button type="submit" class="btn btn-primary w-100" name="login">Login</button>
            
            <center>
            <p>Don't have an account?<a href="register.php"> Register</a></p>

          </center>

          </form>
        </div>
      </div>
    </div>
  </div>

<!-- JS for Modal -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  function showLoginModal() {
    var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
    loginModal.show();
  }

  /*document.getElementById('loginForm').addEventListener('submit', function (event) {
    event.preventDefault();*/ // Prevent page reload

    const email = document.getElementById('emailInput').value;

    // Show email near logo
    //document.getElementById('loggedInEmail').textContent = `(${email})`;

    

    // Hide modal
    const modalInstance = bootstrap.Modal.getInstance(document.getElementById('loginModal'));
    modalInstance.hide();

</script>

</body>
</html>




