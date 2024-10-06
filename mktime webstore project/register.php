<?php
 include 'includes/nav.php';?>

<h1>Create account</h1>
	<form action="register.php" method="post" >
	  <!-- input box for user's first name  -->
	  <label for="first_name">First name:</label>
	  <input type="text" 
        id="first_name" 
        class="form-control" 
        name="first_name" 
        required 
        value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?> ">

        <!-- input box for user's last name -->  
	  <label for="last_name">Last name:</label>
      <input type="text" 
        id="last_name" 
        class="form-control" 
        name="last_name" 
        required 
        value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
	  </textarea>

      <!-- input box for user's email address -->  
	  <label for="email">Email address:</label>
      <input type="email" 
        id="email" 
        class="form-control" 
        name="email" 
        required 
        value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
	  </textarea>
	  
	  <!-- input box for user's password -->  
	  <label for="password">Enter a password:</label>
	  <input type="password"
        id="password" 
        class="form-control" 
        name="password" 
        required 
        value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>">
	  </textarea>
	  
	 <!-- input box to confirm user's password -->
	 <label for="confirm_password">Confirm password:</label>
	 <input type="password" 
        id="confirm_password" 
        class="form-control" 
        name="confirm_password" 
        required 
	    value="<?php if (isset($_POST['confirm_password'])) echo $_POST['confirm_password']; ?>">
	 
	 
	  <!-- submit button -->
     <input type="submit" class="btn btn-dark" value="Submit">
	</form>
</div>

<?php

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
	{
	  # Connect to the database.
	  require ('connect_db.php'); 

  # Initialize an error array.
  $errors = array();

  # Check for first name.
  if ( empty( $_POST[ 'first_name' ] ) )
  { $errors[] = 'Please enter your first name.' ; }
  else
  { $fn = mysqli_real_escape_string( $link, trim( $_POST[ 'first_name' ] ) ) ; }

   # Check for last name.
   if ( empty( $_POST[ 'last_name' ] ) )
   { $errors[] = 'Please enter your last name.' ; }
   else
   { $ln = mysqli_real_escape_string( $link, trim( $_POST[ 'last_name' ] ) ) ; }

    # Check for email address.
   if ( empty( $_POST[ 'email' ] ) )
   { $errors[] = 'Please enter your email address.' ; }
   else
   { $e = mysqli_real_escape_string( $link, trim( $_POST[ 'email' ] ) ) ; }

  # Check for a password.
  if (empty( $_POST[ 'password' ] ) )
  { $errors[] = 'Please enter a password.' ; }
  else
  { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'password' ] ) ) ; }
  
  # Check for password confirmation.
  if (empty( $_POST[ 'confirm_password' ] ) )
  { $errors[] = 'Please re-enter your password.' ; }
  elseif ($_POST['confirm_password'] != $_POST['password'])
  { $errors[] = 'Passwords do not match.' ;}
  
  	
   # On success data into my_table on database.
  if ( empty( $errors ) ) 
  {
    $q = "INSERT INTO users (first_name, last_name, email, pass) 
	VALUES ('$fn', '$ln', '$e', '$p' )";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    { echo '<h3>Account created successfully</h3>'; }
  
    # Close database connection.
    mysqli_close($link); 
  
   

    
  }
   
  # Or report errors.
  else 
  {
    echo '<p>The following error(s) occurred:</p>' ;
    foreach ( $errors as $msg )
    { echo "$msg<br>" ; }
    echo '<p>Please try again.</p></div>';
    # Close database connection.
    mysqli_close( $link );
	
  }  
}

?>

<?php include 'includes/footer.php'; ?>
