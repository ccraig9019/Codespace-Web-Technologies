<?php
    #Set variable to be used for item filter
    $effectTypeFilter = @$_GET['effectType'];
    # Retrieve items from 'products' database table according to filter settings
    if ($effectTypeFilter == 'all' || $effectTypeFilter == false) {
        $q = "SELECT * FROM products ORDER BY item_name ASC" ;
    }
    else if ($effectTypeFilter == "allAscPrice") {
        $q = "SELECT * FROM products ORDER BY item_price ASC" ;

    }
    else if ($effectTypeFilter == "allDescPrice") {
        $q = "SELECT * FROM products ORDER BY item_price DESC" ;
    }
    else {  
        $q = "SELECT * FROM products WHERE effect_type = '$effectTypeFilter' ORDER BY item_name ASC" ;
        }
    $r = mysqli_query( $link, $q ) ;
    if ( mysqli_num_rows( $r ) > 0 ) {
    #Initialise counter for the row function
    $counter = 0;
    #Contain everything within a container
    echo '<div class="container">';
    #Start a row
    echo'<div class="row">';

    while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
        {
            if ($counter % 3 == 0 && $counter !=0) { //If the counter is not 0 and is equal to a multiple of 3 (within Bootstrap's limit of 12, so 3, 6, 9 or 12)
                echo '</div><div class ="row">'; //End the current row and start a new one
            }
        echo '<div class="col-md-4 mx-auto d-flex" style="padding-top: 40px; ">
                <div class="card" style="width: 30rem; background-color: rgba(255, 255, 255, 0.8);">
                    <img src='. $row['item_img'].' class="card-img-top" alt="product image">
                    <div class="card-body">
                        <h3 class="card-title text-center">' . $row['item_name'] .'</h3>
                        <h4 class="card-title text-center">' . $row['manufacturer'] .'</h4>
                        <h5 class="card-subtitle text-center">'.$row['effect_type'].'</h5>
                        <p class="card-text">'. $row['item_desc'] . '</p>
                    </div>
                    <ul class="list-group">
                    <li class="list-group-item" style="background-color: rgba(255, 255, 255, 0.5);"><h4 class="text-center">&pound' . $row['item_price'] . '</h4></li>
                    <li class="list-group-item btn btn-dark"><a class="btn btn-dark btn-lg btn-block" href="add_to_cart.php?id='.$row['item_id'].'">
                    Add to cart</a></li>
                    </ul>
                </div>
            </div>';

            #increment counter
            $counter++;
# Close database connection.
    #mysqli_close($link) ; 
        }
        
        #Close final row
        echo '</div>';
        #Close container
        echo '</div>';
    }
    # Or display message.
    else { echo '<p>There are currently no items in the table to display.</p>
        ' ; }