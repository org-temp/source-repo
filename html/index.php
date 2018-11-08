<?php
$servername = "mysql.default.svc.cluster.local";
$username = "varMyDBUser";
$password = "varMyDBPass";
// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>
