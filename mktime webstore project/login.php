<?php 
include 'includes/logged_out_nav.php' ;

# Display any error messages if present.
if ( isset( $errors ) && !empty( $errors ) )
{
 echo '<div class="card"  style="background-color: rgba(255, 255, 255, 0.8);">
        <div class="card-body">
            <h3 id="err_msg">Oops! There was a problem:</h3>' ;
            foreach ( $errors as $msg ) { echo " - $msg<br>" ; }
 echo '<p name="tryagain">Please try again or <a name="register_link" href="register.php">Register</a></p></div></div>' ;
}


?>


<form action="login_action.php" method="post">
    <div class="container justify-content-center">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card"  style="background-color: rgba(255, 255, 255, 0.8);">
                    <div class ="card-body">
                        <form method="POST">
                        <div class="login-form">
                            <label for="emailAddress"><h4>Email address</h4></label>
                            <input type="email" class="form-control" name="emailAddress">
                            <label for="emailAddress"><h4>Password</h4></label>
                            <input type="password" class="form-control" name="password">
                        </div>
                            <br>
                        <button type="submit" class="btn btn-dark">Log in</button>
                        </form>
                        <a href="register.php">Not registered yet? Click here to create an account</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php include 'includes/footer.php'; ?>