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

if(isset($_GET['id'])) 
{

    

$id = $_GET['id'];
$sql = "SELECT id, name, phone, state, country, photo, pincode FROM address WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);




}



if(isset($_POST['update'])) 
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $photo = $_POST['photo'];
    $pincode = $_POST['pincode'];
    $sql = "UPDATE address SET name='$name', phone='$phone', state='$state', country='$country', photo='$photo', pincode='$pincode' WHERE id=$id";
    if (mysqli_query($conn, $sql))
     {

        header("Location: list.php");

    }
     else 
     {
      echo "Error updating record: " . mysqli_error($conn);
    }
}
mysqli_close($conn);


?>

<html>
  <head>
    <title>Update Record</title>
  </head>
  <body>
    <form action="" method="post">
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
      <p>Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"></p>
      <p>Phone: <input type="text" name="phone" value="<?php echo $row['phone']; ?>"></p>
      <p>State: <input type="text" name="state" value="<?php echo $row['state']; ?>"></p>
      <p>Country: <input type="text" name="country" value="<?php echo $row['country']; ?>"></p>
      <p>Photo: <input type="file" name="photo" value="<?php echo $row['photo']; ?>"></p>
      <p>Pincode: <input type="text" name="pincode" value="<?php echo $row['pincode']; ?>"></p>
      <input type="submit" name="update" value="Update">
    </form>
    
  </body>
</html>
