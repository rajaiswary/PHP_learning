<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <style type="text/css">
  
      .container {
        width: 500px;
        margin: 0 auto;
        text-align: center;
      }

      input[type="text"],
      input[type="email"],
      input[type="number"],
      input[type="password"],

      textarea {
        width: 100%;
        padding: 12px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 15px;
        box-sizing: border-box;
        font-size: 16px;
      }

      input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
      }

      input[type="submit"]:hover {
        background-color: #3e8e41;
      }
    </style>
  </head>
  <body>
    <?php

$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "addressbook";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $password = $_POST["password"];
    $address = $_POST["address"];


    $sql = "INSERT INTO user(name,email,mobile,password,address)
VALUES ('$name','$email','$mobile','$password','$address')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  header("Location: login.php");

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}

    ?>
    <div class="container">
      <h1>User Registration</h1>
      <form action="" method = "post">
        <input type="text" name = "name" placeholder="Name" required><br>
        <input type="email" name = "email" placeholder="Email" required><br>
        <input type="number" name = "mobile" placeholder="Phone" required><br>
        <input type="password" name = "password" placeholder="*****" required><br>

        <textarea name = "address" placeholder="Address" required></textarea><br>
        <input type="submit" value="Submit">
      </form>
    </div>
  </body>
</html>
