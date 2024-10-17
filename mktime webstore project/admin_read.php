<!--Logged in view only block-->
<?php
# Access session.
session_start() ;
# Redirect if not logged in.
if ( !( $_SESSION[ 'admin' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
?>
<!--End of logged in view only block-->

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>MKPedals</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!--attempt at some cool scrolling animation-->
        <style>
            @keyframes appear{
                from{
                    opacity: 0;
                    scale: 0.5;
                }
                to{
                    opacity: 1;
                    scale: 1;
                }

                .container {
                    animation: appear linear;
                    animation-timeline: view();
                    animation-range: entry 0% cover: 40%;
                }
            }
        </style>


    </head>
    <body>

        <?php

        include ('includes/nav.php');

        # Open database connection.
            require ( 'connect_db.php' );

            # Retrieve items from 'products' database table.
            $q = "SELECT * FROM products" ;
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
                echo '
                    <div class="col-md-4 mx-auto d-flex">
                        <div class="card" style="width: 30rem;">
                        <img src='. $row['item_img'].' class="card-img-top" alt="product image">
                        <div class="card-body">
                        <h3 class="card-title text-center">' . $row['item_name'] .'</h3>
                        <h4 class="card-title text-center">' . $row['manufacturer'] .'</h4>
                        <h5 class="card-subtitle text-center">'.$row['effect_type'].'</h5>
                        <p class="card-text">'. $row['item_desc'] . '</p>
                        </div>
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item"><h4 class="text-center">&pound' . $row['item_price'] . '</h4></li>
                        <li class="list-group-item btn btn-dark"><a class="btn btn-dark btn-lg btn-block" href="update.php?id='.$row['item_id'].'">
                        Update</a></li>
                        <li class="list-group-item"><a class="btn btn-dark btn-sm btn-block" href="delete.php?item_id='.$row['item_id'].'">
                        Delete Item</a></li>
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
                
                 
    include 'includes/footer.php';
    ?>
    
    </body>
</html>