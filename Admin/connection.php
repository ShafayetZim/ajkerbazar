<?php

    $con=mysqli_connect('localhost','root','','foodbank');

    if(!$con)
    {
        die(' Please Check Your Connection'.mysqli_error($con));
    }
?>
