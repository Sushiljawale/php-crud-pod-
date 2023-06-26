<?php
    if(isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["email"]) && isset($_POST["phone"]))
    {
        $port=3307;
        $servername = "localhost";
        $username = "root";
        $password = "password";
        $dbname = "phpsampledb01";        
        
        // open MySQL connection
        $conn = new mysqli($servername, $username, $password, $dbname,$port);
        
        // only proceed if connection is healthy
        if ($conn->connect_error) {
            die("MySQL Connection failed: " . $conn->connect_error);
        }
        
        // prepare and bind the INSERT query - protects against SQL injection attacks
        $stmt = $conn->prepare("INSERT INTO person (firstname, lastname, email, phone) VALUES (?, ?, ?,?)");
        $stmt->bind_param("sssi", $firstname, $lastname, $email, $phone);
        
        // set parameters and execute
        $firstname = $_POST["fname"];
        $lastname = $_POST["lname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];

        $stmt->execute();

        $conn->close();
    }    
?>

<html>
<body>
<br />
<a href="index.php">menu</a>
<br /><br>  
<form action="#" method="post">
    <label for="fname">First name:</label><br>
    <input type="text" id="fname" name="fname" ><br>
    <label for="lname">Last name:</label><br>
    <input type="text" id="lname" name="lname"><br><br>
    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email" ><br><br>
    <label for="phone">Mobile No:</label><br>
    <input type="text" id="email" name="phone" ><br><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>

<!-- <?php include 'list.php';  ?> -->