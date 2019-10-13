<?php
$con=mysqli_connect("localhost","root","","php_systemtask");
if (!$con) {
  die("connection failed" . mysqli_error($con));
}
 