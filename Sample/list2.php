<?php

session_start();

$email = '';
$password = '';
$id = 0;


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

$sql = "SELECT id FROM user WHERE email='$email' AND password='$password'";

$result = $conn->query($sql);

if ($result->num_rows > 0)
{

  $row = $result->fetch_assoc();
  $id = $row["id"];
 

}

else {
  echo "0 results";
}


$sq = "SELECT name, phone, state, country, photo, pincode FROM address WHERE user_id = $id";
$res = $conn->query($sq);

if (mysqli_num_rows($res) > 0) 
{
  echo "<table>";
  echo "<tr>";
  echo "<th>Name</th>";
  echo "<th>Phone</th>";
  echo "<th>State</th>";
  echo "<th>Country</th>";
  echo "<th>Photo</th>";
  echo "<th>Pincode</th>";
  echo "<th>Edit</th>";
  echo "<th>Delete</th>";
  


  echo "</tr>";
  while($row = mysqli_fetch_assoc($res)) {
    echo "<tr>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["phone"] . "</td>";
    echo "<td>" . $row["state"] . "</td>";
    echo "<td>" . $row["country"] . "</td>";
    echo "<td><img src='" . $row["photo"] . "' height='50' width='50'></td>";
    echo "<td>" . $row["pincode"] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}











?>

<html>

<head>
<style>
      table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }
      td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
      }
      tr:nth-child(even) {
        background-color: #dddddd;
      }
    </style>

</head>
<body>


<a href = "add.php"><button>+AddUser</button></a>
<a href = "list.php?logout=true">Logout</a>

</body>

</html>






