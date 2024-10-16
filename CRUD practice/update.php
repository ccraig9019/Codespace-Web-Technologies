<!--Logged in view only block-->
<?php
# Access session.
session_start() ;
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
?>
<!--End of logged in view only block-->

<?php
#Include navbar
include ('includes/nav.php');

if ( $_SERVER['REQUEST_METHOD'] == 'POST') {
    #Connect to the database
    require ('connect_db.php');
}

#Initialising errors array for any errors found to be pushed into
$errors = array();

##START of field checking block - checking to see if any fields are empty
#Check for an item name - if the 'item_id' field is empty, it will push 'Update item ID' to the $errors array.
if (empty($_POST['item_id'])) {
    $errors[] = 'Update item ID.';
}
else { #Assigning the text entered into the field with class 'item_id' (after being trimmed of empty spaces at the start and end) to a variable which will be entered into the SQL database
    $id = mysqli_real_escape_string($link, trim($_POST['item_id']));
}

#Check for an item name (same as above)
if (empty($_POST['item_name'])) { #If the form field with id 'item_name is empty...
    $errors[] = 'Update item name.'; #Add 'Update item name.' to the errors array.
}
else { #But if it's not...
    $n = mysqli_real_escape_string($link, trim($_POST['item_name'])); #Assign the sanitised and trimmed version of what has been entered into the 'item_id' field to the variable $n (for use later)
}

#Check for item description
if (empty($_POST['item_desc'])) {
    $errors[] = 'Update item description.';
}
else {
    $d = mysqli_real_escape_string($link, trim($_POST['item_desc']));
}

#Check for item image
if (empty($_POST['item_img'])) {
    $errors[] = 'Update image address.';
}
else {
    $img = mysqli_real_escape_string($link, trim($_POST['item_img']));
}

#Check for item price
if (empty($_POST['item_price'])) {
    $errors[] = 'Update item price.';
}
else {
    $p = mysqli_real_escape_string($link, trim($_POST['item_price']));
}
##END of checking block

if (empty($errors)) { #If the errors array is empty
    $q = "UPDATE products SET item_id='$id', item_name='$n', item_desc='$d', item_img='$img', item_price='$p' WHERE item_id='$id'"; #creating an SQL query to add a row to the products table and assigning it to a variable
    $r = @mysqli_query($link, $q); #a function from the MySQLi extension which sends a query to the database. It takes two parameters: the connection object (which we establish in the connect_db.php file) and the SQL query (established in the previous line)
    if ($r) { #If $r = true, so if it is not null
        header("Location: read.php"); #send the user to the page read.php
    }
else {
    echo "Error updating record: ".$link->error; #Echos out the error message here and the error property from the $link variable
}
#Close database connection
mysqli_close($link);

}
?>
<h1>Update item:</h1>
<form action="update.php" method="post">
<form action="create.php" method="post" >

    <label for="item_id">Item ID:</label>
    <input type="text" name="item_id" class="form-control" value="<?php if (isset($_POST['item_id'])) echo $_POST['item_id']; ?>">
      

	  <!-- input box for item name  -->
	  <label for="name">Item Name:</label>
	  <input type="text" 
        id="item_name" 
        class="form-control" 
        name="item_name" 
        required 
        value="<?php if (isset($_POST['item_name'])) echo $_POST['item_name']; ?> ">
	  
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