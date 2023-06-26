<?php
    $port=3307;
    $host= "localhost";
    $username = "root";
    $password = "";
    $dbname = "phpsampledb01";        
    
    // open MySQL connection
    $conn = new mysqli( $host, $username, $password, $dbname,$port);
    
    // only proceed if connection is healthy
    if ($conn->connect_error) {
        die("MySQL Connection failed: " . $conn->connect_error);
    }
    
    $id=$_GET['id'];
    $deleteQuery = "DELETE FROM  person WHERE id=$id";
    $result = $conn->query($deleteQuery );
    if($deleteQuery){
        ?>
        <script>
            alert('deleted Successfully ');
        </script>
        <?php
    }else{
        ?>
        <script>
            alert ('feild to delete');
        </script>
        
        <?php
    }
    header('Location: list.php');
?> 