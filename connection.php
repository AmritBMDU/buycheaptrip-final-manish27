<?php

$conn = mysqli_connect('localhost','root','','buycheaptrip');
mysqli_select_db($conn,"buycheaptrip");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>