<?php
$mysql_host = getenv('MYSQL_HOST');                   
$username = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');
$dbname = 'sakila';

// Create connection

$mysqli = new mysqli($mysql_host, $username, $password, $dbname);

if (!$mysqli) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . $link->connect_error . PHP_EOL;
    echo "Debugging error: " . $link->connect_error . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made!!!!! The sakila database is accessible." . PHP_EOL;

// mysqli_close($link);

// Show tables from Sakila Database

    $result = $mysqli->query("SHOW TABLES from sakila");
    //print_r($result);
    while($tableName = mysqli_fetch_row($result))
    {
        $table = $tableName[0];
        echo '<h3>' ,$table, '</h3>';
        $result2 = $mysqli->query("SHOW COLUMNS from ".$table.""); //$result2 = mysqli_query($table, 'SHOW COLUMNS FROM') or die("cannot show columns");
        if(mysqli_num_rows($result2))
        {
            echo '<table cellpadding = "0" cellspacing = "0" class "db-table">';
            echo '<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>';
            while($row2 = mysqli_fetch_row($result2))
            {
                echo '<tr>';
                foreach ($row2 as $key=>$value)
                {
                    echo '<td>',$value, '</td>';
                }
                echo '</tr>';
            }
            echo '</table><br />';
        }
    }

// The script will automatically free the result and close the MySQL
// connection when it exits, but let's just do it anyways
$result->free();
$mysqli->close();

?>
