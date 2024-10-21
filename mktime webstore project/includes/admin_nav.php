<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MKPedals</title>

    <?php $currentPage = basename($_SERVER['PHP_SELF'], ".php") ?>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" 
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
      crossorigin="anonymous">

    <!--link to my own stylesheet, removed for now to rule out any conflict with Bootstrap-->
    <!--<link href="style.css" rel="stylesheet">*/-->

    </head>
  <body style="padding-top: 75px; background-image: url('images/background.jpg'); background-size: cover; background-attachment: fixed;">
<!--navbar-->
<nav style="padding: 10px" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="read.php">MKPedals</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarSNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <span style="color: white; font-style: italic">Welcome <?php echo "$_SESSION[first_name]" ?>!</span>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle <?php echo ($currentPage == 'read' || $currentPage == 'create') ? 'active' : ''; ?>" role="button" data-toggle="dropdown" aria-expanded="false">
                            Products
                          </a>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="read.php">View products</a>
                            <a class="dropdown-item" href="create.php">Add product</a>
                          </div>
                        </li>
                        <?php if ($_SESSION['admin']) { ?>
                          <li class="nav-item">
                          <span class="nav-link" style="color: white">Admin view</span>
                          </li>
                        <?php } ?>
                    </ul>
                    <ul class="navbar-nav  ms-auto">
                      <li class="nav-item">
                        <a href="logout.php" class="nav-link">Log out</a>
                      </li>
                    </ul> 
                </div>
</nav>
        <!--end navbar-->
      

</body>