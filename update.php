<?php
    if(isset($_POST["id"]) && isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["email"]))
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
        $stmt = $conn->prepare("UPDATE person SET firstname = ? WHERE id = ?");

        $stmt->bind_param("si", $firstname, $id);
        
        // set parameters and execute
        $firstname = $_POST["fname"];
        $id = $_POST["id"];
        
        $stmt->execute();

        $conn->close();
    }   

?>

<html>
<body>
<br />
<a href="index.php">menu</a>
<br />
<form action="#" method="post">

        <?php
        $port = 3307;
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "phpsampledb01";

        // open MySQL connection
        $conn = new mysqli($host, $username, $password, $dbname, $port);

        // only proceed if connection is healthy
        if ($conn->connect_error) {
            die("MySQL Connection failed: " . $conn->connect_error);
        }
        $id = $_GET['id'];
        // prepare and bind the INSERT query - protects against SQL injection attacks
        $selectQuery = "SELECT * FROM person WHERE id=$id";
        $query = mysqli_query($conn, $selectQuery);
        $result = mysqli_fetch_assoc($query);
        


        // prepare and bind the INSERT query - protects against SQL injection attacks
        // prepare and bind the UPDATE query - protects against SQL injection attacks
if (isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["email"])&& isset($_POST["phone"])) {
    // set parameters and execute
    $id = $_POST["id"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $stmt = $conn->prepare("UPDATE person SET firstname=?, lastname=?, email=?, phone=? WHERE id=?");
    $stmt->bind_param("sssii", $fname, $lname, $email, $phone, $id);

    $stmt->execute();
    ?>
<script>
    alert('updated Successfully..');
</script>

<?php

header('Location: list.php'); 
}


 ?>
        <input type="hidden" id="id" name="id" value="<?php echo  $result["id"] ?>"><br>
        <label for="fname">First name:</label><br>
        <input type="text" id="fname" name="fname" value="<?php echo  $result["firstname"] ?>"><br>
        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname" value="<?php echo  $result["lastname"] ?>"><br><br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" value="<?php echo  $result["email"] ?>"><br><br>
        <label for="phone">Mobile NO.:</label><br>
        <input type="text" id="phone" name="phone" value="<?php echo  $result["phone"] ?>"><br><br>
        <input type="submit" value="update">
    </form>
</body>

</html>