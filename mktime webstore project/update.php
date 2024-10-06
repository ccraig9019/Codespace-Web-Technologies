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

#Check for manufacturer
if (empty($_POST['manufacturer'])) {
    $errors[] = 'Update manufacturer.';
}
else {
    $m = mysqli_real_escape_string($link, trim($_POST['manufacturer']));
}

#Check for effect type
if (empty($_POST['effect_type'])) {
    $errors[] = 'Update effect type.';
}
else {
    $et = mysqli_real_escape_string($link, trim($_POST['effect_type']));
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
    $q = "UPDATE products SET item_id='$id', item_name='$n', manufacturer='$m', effect_type='$et', item_desc='$d', item_img='$img', item_price='$p' WHERE item_id='$id'"; #creating an SQL query to add a row to the products table and assigning it to a variable
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

    <?php
    #Block to populate the HTML fields with existing SQL records
    #establishing connection to the database within this block
    require('connect_db.php');
    #gets item_id from URL
    if (isset($_GET['id'])) {    
        $item_id = $_GET['id']; #Assigning item_id to a variable to access later    
        $sql = "SELECT * FROM `products` WHERE `item_id`='$item_id'";  #create sql query and store as a variable
        $result = $link->query($sql);   #assign to result the result of carrying out the sql query
        
        if ($result->num_rows > 0) { #for as long as there are rows (for as long as the num_rows is true, greater than 0)
            while ($row = $result->fetch_assoc()) { #tech the associated data
                $item_id = $row['item_id']; #assigning the data from the SQL table to variables for use below
                $item_name = $row['item_name'];
                $manufacturer = $row['manufacturer'];
                $effect_type = $row['effect_type'];
                $item_desc  = $row['item_desc'];
                $item_img = $row['item_img'];
                $item_price = $row['item_price'];        
                }  
        }
    }

    ?>

    <form action="update.php" method="post">
    <form action="create.php" method="post">

        <label for="item_id">Item ID:</label>
        <input type="text"
               name="item_id" 
               class="form-control" 
               value="<?php echo($item_id);?>">
        

        <!-- input box for item name  -->
        <label for="name">Item Name:</label>
        <input type="text" 
            id="item_name" 
            class="form-control" 
            name="item_name" 
            required 
            value="<?php echo($item_name);?>">

        <label for="manufacturer">Manufacturer:</label>
        <input type="text" 
            id="manufacturer" 
            class="form-control" 
            name="manufacturer" 
            required 
            value="<?php echo($manufacturer);?>">

        <label for="effect_type">Effect type:</label>
        <input type="text" 
            id="effect_type" 
            class="form-control" 
            name="effect_type" 
            required 
            value="<?php echo($effect_type);?>">
        
        <!-- input box for item description -->  
        <label for="description">Description:</label>
        <textarea id="item_desc" 
            class="form-control" 
            name="item_desc" 
            required>
            <?php echo($item_desc);?>
        </textarea>
        
        <!-- input box for image path -->
        <label for="image">Image:</label>
        <input type="text" 
            id="item_img" 
            class="form-control" 
            name="item_img" 
            required 
            value="<?php echo($item_img);?>">
        
        <!-- input box for item price -->
        <label for="price">Price:</label>
        <input 
            type="number" 
            id="item_price" 
            class="form-control" 
            name="item_price" 
            min="0" step="0.01" 
            required 
            value="<?php echo($item_price);?>"><br>
       <!-- submit button -->
       <input type="submit" class="btn btn-dark" value="Submit">
        </form>

        <?php include 'includes/footer.php'; ?>











        