<?php

session_start();

$email = '';
$password = '';


if (!isset($_SESSION['email'])) 
{


  header("Location: login.php");
}




if (isset($_GET['logout'])) 
{

  session_destroy();
  header("Location: login.php");
}


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



$email = $_SESSION['email'];

$password = $_SESSION['password'];

$sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";

$result = $conn->query($sql);

if ($result->num_rows > 0)
{
  while ($row = mysqli_fetch_assoc($result))
   {
    echo "<table>";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<td>" . $row['name'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Email</th>";
    echo "<td>" . $row['email'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<th>Address</th>";
    echo "<td>" . $row['address'] . "</td>";
    echo "</tr>";
    echo "</table>";
    echo "<th>Mobile No</th>";
    echo "<td>" . $row['mobile'] . "</td>";
    echo "</tr>";
    echo "</table>";
   }


}

else {
  echo "0 results";
}




?>

<html>

<head>

<title>Listing page</title>
</head>
<body>


<a href = "add.php"><button>+AddUser</button></a>
<a href = "list.php?logout=true">Logout</a>

</body>

</html>




