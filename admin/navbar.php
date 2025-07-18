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
      background-color: #808000 !important;
      font-size: 20px;
      position: sticky;
      z-index: 1000;
      top: 0;
      
    }

    .navbar .nav-link {
        color: white;
        font-weight: bold;
        position: relative;
        text-decoration: none; 
    }

    .navbar .nav-link::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -2px;
        width: 0%;
        height: 2px;
        background-color: white;
        transition: width 0.5s ease-in-out; /* Smooth transition */
    }

    .navbar .nav-link:hover::after {
        width: 100%; /* Expands underline */
    }

    /*.navbar a:hover {
    text-decoration: underline;
} to show underline in hyperlink when touch to hyperlink*/


  </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="container">

      <a class="navbar-brand" href="index.php"></a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>

      </button>

      <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav ms-auto">

          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>

        	 <li class="nav-item"><a class="nav-link" href="package.php">Package</a></li>

          <li class="nav-item"><a class="nav-link" href="addhotel.php">Hotel</a></li>

          <li class="nav-item"><a class="nav-link" href="transportation.php">Transportation</a></li>

          <li class="nav-item"><a class="nav-link" href="clientinfo.php">Client Message</a></li>
          
          
        </ul>
      </div>
    </div>
  </nav>

</body>
</html>




