<?php

$results = array( 
     "aarron" => array (
        "physics" => '74%',
        "english" => '69%',	
        "maths" => '70%'
            ),
            
    "jamie" => array (
        "physics" => '64%',
        "english" => '79%',	
        "maths" => '69%'
            ),
            
    "harry" => array (
        "physics" => '55%',
        "english" => '52%',	
        "maths" => '57%'
            ),
        );

echo (
    "Student results<br><br>
    Physics result for Aarron : ".$results['aarron']['physics']."<br>
    English result for Jamie : ".$results['jamie']['english']."<br>
    Maths result for Harry : ".$results['harry']['maths']
);

?>
