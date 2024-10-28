 
<!--Logged in view only block-->
<?php
# Access session.
session_start() ;
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
?>
<!--End of logged in view only block-->


<?php

include ('includes/nav.php');

# Open database connection.
	require ( 'connect_db.php' );
    echo '<div class="row">';
    # Retrieve items from 'products' database table.
	$q = "SELECT * FROM products" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )

    while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
        {
        echo '
        <div class="col-md-3 d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
                <img src='. $row['item_img'].' class="card-img-top" alt="Dingwall bass">
                <div class="card-body">
                    <h5 class="card-title text-center">' . $row['item_name'] .'</h5>
                     <p class="card-text">'. $row['item_desc'] . '</p>
                </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><p class="text-center">&pound' . $row['item_price'] . '</p></li>
                <li class="list-group-item btn btn-dark"><a class="btn btn-dark btn-lg btn-block" href="update.php?id='.$row['item_id'].'">
            Update</a></li>
            <li class="list-group-item"><a class="btn btn-dark" href="delete.php?item_id='.$row['item_id'].'">
            Delete Item</a></li>
            <div class="card-footer text-muted">
		        <a href="added.php?id='.$row['item_id'].'" class="btn btn-light btn-block">Add to Cart</a>
	        </div>
            </ul>
            </div>
        </div>';

        }

    # Or display message.
	else { echo '<p>There are currently no items in the table to display.</p>
        ' ; }
        
    # Close database connection.
    mysqli_close( $link) ; 

    include ('includes/footer.php');
        
    ?>
