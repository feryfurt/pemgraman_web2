<?php
$con = mysqli_connect("localhost","root","","lat_dbase");
if (!$con)
{
die('Could not connect: '. mysqli_error($con));
}

mysqli_query($con, "INSERT INTO tbl_mhs (FirstName, LastName, Age)
VALUES ('Subianto', 'Prabowo', 100)");

mysqli_close($con);
?>