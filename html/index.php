<?php
$mysql_host = getenv('MYSQL_HOST');                   
$username = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');
$dbname = 'sakila';

// Create connection

$link = new mysqli($mysql_host, $username, $password, $dbname);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . $link->connect_error . PHP_EOL;
    echo "Debugging error: " . $link->connect_error . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The sakila database is accessible." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

mysqli_close($link);

// Create connection
$conn = new mysqli($mysql_host, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "DB Connected successfully 123456789!!!!";

// Show tables from Sakila Database
$sql = "SHOW TABLES FROM $dbname";
$result = mysql_query($sql);

if (!$result) {
    echo "DB Error, could not list tables\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}

while ($row = mysql_fetch_row($result)) {
    echo "Table: {$row[0]}\n";
}

mysql_free_result($result);

?>
