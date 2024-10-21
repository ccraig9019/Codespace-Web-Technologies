<!--Admin view only block-->
<?php
# Access session.
session_start() ;
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) || $_SESSION['admin'] == false ) { require ( 'login_tools.php' ) ; load() ; }
?>
<!--End of admin view only block-->
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
    <!--Item filter view form-->
    <div class="card d-flex col-sm-3" style="background-color: rgba(255, 255, 255, 0.5);">
        <form method="GET">
            <label for="effectType">View:</label>
            <select name="effectType" id="category" style="width: 180px;">
                <option value="all">All</option>
                <option value="allAscPrice">Price asc.</option>
                <option value="allDescPrice">Price desc.</option>
                <option value="reverb">Reverb</option>
                <option value="octave">Octave</option>
                <option value="pitch shifter">Pitch shifter</option>
                <option value="distortion">Distortion</option>
                <option value="delay">Delay</option>
                <option value="fuzz">Fuzz</option>
            </select>
            <button type="submit" class="btn btn-dark">Go</button>
        </form>
    </div>
    <?php

        include ('includes/admin_nav.php');
        require ('connect_db.php');
        require ('admin_filter_view.php');
        include ('includes/footer.php');
    
    ?>
    
    </body>
</html>