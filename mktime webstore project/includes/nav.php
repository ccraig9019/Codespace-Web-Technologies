<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MKPedals</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" 
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
      crossorigin="anonymous">

    <style>
      body {padding-top: 70px;}
      button {padding: 10px 20px;}
      input[type="submit"] {padding: 10px 20px;}
    </style>
  </head>
  <body>
<!--navbar-->
<nav style="padding: 10px" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="home.php">MKPedals</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarSNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="home.php">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="false">
                            Products
                          </a>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="read.php">View products</a>  
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="create.php">Add product</a>
                            <a class="dropdown-item" href="update.php">Edit product</a>
                          </div>
                        </li>

                        <li class="nav-item">
                            <a href="login.php" class="nav-link">Log in/Register</a>
                        </li>
                </ul>
            </div>
          </nav>
<!--end navbar-->

</body>