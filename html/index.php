<?php
$mysql_host = getenv('MYSQL_HOST');                   
$username = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');
// Create connection

$link = mysqli_connect($mysql_host, $username, $password, "sakila");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The sakila database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

mysqli_close($link);
?>
