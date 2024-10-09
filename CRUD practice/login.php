<?php 
include 'includes/nav.php' ;

# Display any error messages if present.
if ( isset( $errors ) && !empty( $errors ) )
{
 echo '<p id="err_msg">Oops! There was a problem:<br>' ;
 foreach ( $errors as $msg ) { echo " - $msg<br>" ; }
 echo 'Please try again or <a href="register.php">Register</a></p>' ;
}


?>


<form action="login_action.php" method="post>
    <label for="inputemail">Email</label>
    <input type="text"
           name = "email"
           class="form-control"
           required
           placeholder="* Enter email address"><br>
    <input type="password"
           name="pass"
           class="form-control"
           required
           placeholder="* Enter password">

    <input type="submit" value="Login">
</form>
