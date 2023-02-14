<?php
$servername = "localhost";
$username = "root";
$password = "meera@123";
$dbname="Addressbook";

$conn = mysqli_connect($servername, $username, $password,$dbname);

if(!$conn){
    die('Could not Connect MySql Server:' .mysql_error());
  }

$id=$_GET['id'];
echo $id;
$sql = "DELETE FROM Address WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Record deleted Successfully");location.href="profile.php"</script>';
  } else {
    echo "Error deleting record: " . $conn->error;
  }
  
  $conn->close();
?>