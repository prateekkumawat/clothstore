<?php
$con =  new mysqli("localhost","root","","dm");
if($con->connect_error)
{
   echo $con->connect_error;
   exit;
}
?>