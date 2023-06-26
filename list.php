<html>
<head>
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
    
    $selectQuery = "SELECT * FROM person";
    $result = $conn->query($selectQuery);  
?>
</head>
<body>
<br />
<a href="index.php">menu</a>
<br />
<?php
if ($result->num_rows > 0) 
{
    ?>
    <table>
        <thead>
    <tr>
    <th>Id</th>
    <th>FirstName</th>
    <th>LastName</th>
    <th>Email</th>
    <th>Mobile No.:</th>
    <th>Action</th>
    </tr>
      </thead>
      <tbody>
    <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row["id"] ?></td>
            <td><?php echo $row["firstname"] ?></td>
            <td><?php echo $row["lastname"] ?></td>
            <td><?php echo $row["email"] ?></td>
            <td><?php echo $row["phone"] ?></td>
            <td>
               <a href="update.php?id=<?php echo $row["id"] ?>">Edit</a>
               <a href="delete.php?id=<?php echo $row["id"] ?>">Delete</a>
            </td>
        </tr>
        </tbody>
    <?php } ?>
    </table>
    <?php
}
$conn->close();
?>
</body>
</html>