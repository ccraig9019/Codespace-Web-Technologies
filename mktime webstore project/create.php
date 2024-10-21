<!--Admin view only block-->
<?php
# Access session.
session_start() ;
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) || $_SESSION['admin'] == false ) { require ( 'login_tools.php' ) ; load() ; }
?>
<!--End of admin view only block-->

<?php
 include 'includes/admin_nav.php';?>

<?php

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
	{
	  # Connect to the database.
	  require ('connect_db.php'); 

  # Initialize an error array.
  $errors = array();

  # Check for item name .
  if ( empty( $_POST[ 'item_name' ] ) )
  { $errors[] = 'Enter the item name.' ; }
  else
  { $n = mysqli_real_escape_string( $link, trim( $_POST[ 'item_name' ] ) ) ; }

   # Check for manufacturer .
   if ( empty( $_POST[ 'manufacturer' ] ) )
   { $errors[] = 'Enter the manufacturer.' ; }
   else
   { $m = mysqli_real_escape_string( $link, trim( $_POST[ 'manufacturer' ] ) ) ; }

    # Check for effect type .
   if ( empty( $_POST[ 'effect_type' ] ) )
   { $errors[] = 'Enter the effect type.' ; }
   else
   { $et = mysqli_real_escape_string( $link, trim( $_POST[ 'effect_type' ] ) ) ; }

  # Check for a item decription.
  if (empty( $_POST[ 'item_desc' ] ) )
  { $errors[] = 'Enter the item decription.' ; }
  else
  { $d = mysqli_real_escape_string( $link, trim( $_POST[ 'item_desc' ] ) ) ; }
  
  # Check for a item image.
  if (empty( $_POST[ 'item_img' ] ) )
  { $errors[] = 'Enter the item image.' ; }
  else
  { $img = mysqli_real_escape_string( $link, trim( $_POST[ 'item_img' ] ) ) ; }
  
  # Check for a item price.
  if (empty( $_POST[ 'item_price' ] ) )
  { $errors[] = 'Enter the item image.' ; }
  else
  { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'item_price' ] ) ) ; }

	
   # On success data into my_table on database.
  if ( empty( $errors ) ) 
  {
    $q = "INSERT INTO products (item_name, manufacturer, effect_type, item_desc, item_img, item_price) 
	VALUES ('$n', '$m', '$et', '$d', '$img', '$p' )";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r) { 
      header("Location: read.php");
       }
      # Close database connection.
      mysqli_close($link); 
      //exit();
      
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
<form action="create.php" method="post" >
  <div class="container justify-content-center"  style="background-color: rgba(255, 255, 255, 0.8);">
    <h1>Add Item</h1>
    
        <!-- input box for item name  -->
        <label for="name">Item Name:</label>
        <input type="text" 
            id="item_name" 
            class="form-control" 
            name="item_name" 
            required 
            value="<?php if (isset($_POST['item_name'])) echo $_POST['item_name']; ?> ">

            <!-- input box for product manufacturer -->  
        <label for="manufacturer">Manufacturer:</label>
          <input type="text" 
            id="manufacturer" 
            class="form-control" 
            name="manufacturer" 
            required 
            value="<?php if (isset($_POST['manufacturer'])) echo $_POST['manufacturer']; ?>">
        </textarea>

          <!-- input box for effect type -->  
        <label for="manufacturer">Effect type:</label>
          <input type="text" 
            id="effect_type" 
            class="form-control" 
            name="effect_type" 
            required 
            value="<?php if (isset($_POST['effect_type'])) echo $_POST['effect_type']; ?>">
        </textarea>
        
        <!-- input box for item description -->  
        <label for="description">Description:</label>
        <textarea id="item_desc" 
            class="form-control" 
            name="item_desc" 
            required 
            value="<?php if (isset($_POST['item_desc'])) echo $_POST['item_desc']; ?>">
        </textarea>
        
      <!-- input box for image path -->
      <label for="image">Image:</label>
      <input type="text" 
            id="item_img" 
            class="form-control" 
            name="item_img" 
            required 
          value="<?php if (isset($_POST['item_img'])) echo $_POST['item_img']; ?>">
      
      <!-- input box for item price -->
      <label for="price">Price:</label>
      <input 
            type="number" 
            id="item_price" 
            class="form-control" 
            name="item_price" 
            min="0" step="0.01" 
            required 
            value="<?php if (isset($_POST['item_price'])) echo $_POST['item_price']; ?>"><br>
        <!-- submit button -->
        <input type="submit" class="btn btn-dark" value="Submit">
 </form>
</div>

<?php include 'includes/footer.php'; ?>
