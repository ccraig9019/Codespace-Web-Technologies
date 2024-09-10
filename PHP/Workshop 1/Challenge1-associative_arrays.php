<?php

//array to store temperature values
$temperatures = array("jul_aug_high" => 19, "jul_aug_low" => 11, "jan_feb_high" => 7, "jan_feb_low" => 1);

echo "<left>";
echo ( "Average Temperature in Edinburgh<br>");
echo ("Month&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;High&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Low<br>");
echo ("July-Aug&nbsp;&nbsp;&nbsp;".$temperatures["jul_aug_high"]."⁰C&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$temperatures['jul_aug_low']."⁰C<br>");
echo ("Jan-Feb&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$temperatures["jan_feb_high"]."⁰C&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$temperatures['jan_feb_low']."⁰C");

?>

         