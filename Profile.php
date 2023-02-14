<?php
$servername = "localhost";
$username = "root";
$password = "meera@123";
$dbname="Addressbook";

$conn = mysqli_connect($servername, $username, $password,$dbname);

if(!$conn){
    die('Could not Connect MySql Server:' .mysql_error());
  }

session_start();
if (!isset($_SESSION["userdetails"])) {
  header("Location: ./Home.php");
  exit;
}
$user = $_SESSION["userdetails"];
$usermail=$user["email"];
$query="select id from user where email='$usermail'";
$result1 = mysqli_query($conn, $query);
$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);  
$user_id=$row1["id"];
$sql = "select *from address where user_id='$user_id'";
$result2 = mysqli_query($conn, $sql);
?>


<html>
  <head>
    <link rel = "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    
  </head>
<body style="background:lightyellow;">
<div>
<a href="Logout.php"><button type="button" class="btn btn-outline-dark" style="margin-left:20px;margin-top:10px;">Logout</button></a>
<div>
<h1 style="color:navy;display:flex;align-items:center;justify-content:center;">ADDRESS BOOK</h1>
<div class="container" style="height:50px;color:navy;display:flex;align-items:center;justify-content:center;font-size:20px;">
    <br><p><b><?php echo 'Welcome ',$user["email"]; ?></b></p><br>   
</div>   
<div style="margin:20px;">
<a href="Address.php" ><button type="button" class="btn btn-outline-success">+New Address</button></a>
<div class="table-responsive">
    <table class="table table-hover" style="marginleft:10px;">
  <thead class="thead">
    <tr class="bg-info">
      <th scope="col">Slno</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Address</th>
      <th scope="col">City</th>
      <th scope="col">State</th>
      <th scope="col">Country</th>
      <th scope="col">Pincode</th>
      <th scope="col">Photo</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody class="table">
  <?php
  $i=1;
  if(mysqli_num_rows($result2) >= $i)
  {
    while($row2 = mysqli_fetch_assoc($result2)){
    echo '<tr>
      <td>'.$i++.'</td>
      <td>'.$row2["name"].'</td>
      <td>'.$row2["email"].'</td>
      <td>'.$row2["mobile"].'</td>
      <td>'.$row2["address"].'</td>
      <td>'.$row2["city"].'</td>
      <td>'.$row2["state"].'</td>
      <td>'.$row2["country"].'</td>
      <td>'.$row2["pincode"].'</td>
      <td>'.$row2["photo"].'</td>
      <td>
      <a href="Edit.php?id='.$row2['id'].'">Edit</a>/<a href="Delete.php?id='.$row2['id'].'">Delete</a> 
      </td>
    </tr>';
 
    }
  }
  else
    {
        echo "<center>";
        echo "0 results";
    }
  
  ?>
</tbody>
</table>
  </div>
</body>
</html>