<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>MKPedals - Log in</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
<!--navbar-->        
<?php include 'includes/nav.php';?>
<!--end navbar-->
<!--login form-->
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class ="card-body">
                            <form method="POST">
                            <div class="login-form">
                                <label for="emailAddress"><h4>Email address</h4></label>
                                <input type="email" class="form-control" id="emailAddress">
                                <label for="emailAddress"><h4>Password</h4></label>
                                <input type="password" class="form-control" id="password">
                            </div>
                                <br>
                            <button type="submit" class="btn btn-dark">Log in</button>
                            </form>
                            <a href="register.php">Not registered yet? Click here to create an account</a>
                        </div>
                </div>
            </div>
        </div>

        <?php include 'includes/footer.php'; ?>
    </body>
</html>