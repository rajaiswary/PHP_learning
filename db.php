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

// sql to create table
$sql = "CREATE TABLE User1 (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
email VARCHAR(30) NOT NULL,
mobile BIGINT NOT NULL,
password VARCHAR(30) NOT NULL,
address VARCHAR(100)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table User created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}


// Create addressbook table
$addressbook_table = "CREATE TABLE address (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  country VARCHAR(30) NOT NULL,
  state VARCHAR(30) NOT NULL,
  name VARCHAR(30) NOT NULL,
  phone VARCHAR(15) NOT NULL,
  user_id INT(6) UNSIGNED NOT NULL,
  FOREIGN KEY (user_id) REFERENCES user(id)
)";

if (mysqli_query($conn, $addressbook_table)) {
    echo "Addressbook table created successfully";
} else {
    echo "Error creating addressbook table: " . mysqli_error($conn);
}




$conn->close();
?>