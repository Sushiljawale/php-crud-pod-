<?php
$host = 'localhost';
$port = 3307; // Specify the port number here
$username = 'root';
$password = '';
$database = 'crud';

// Create a connection
$connection = new mysqli($host, $username, $password, $database, $port);

// Check the connection
if ($connection->connect_error) {
    die('Connection failed: ' . $connection->connect_error);
}

// Connection successful
echo 'Connected to MySQL on port 3307!';
?>