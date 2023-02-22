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
$id=$_GET['id'];
$query= "select *from address where id='$id'";
$result = mysqli_query($conn, $query);
$row= mysqli_fetch_array($result, MYSQLI_ASSOC);
if (isset($_POST["submit"])) {
$name = $_POST["name"];
$email = $_POST["email"];
$mobile = $_POST["mobile"];
$address =$_POST["address"];
$city =$_POST["city"];
$state =$_POST["state"];
$country =$_POST["country"];
$pincode =$_POST["pincode"];
$photo =$_POST["photo"];
if($photo == ""){
  $photo=$row['photo'];
}
$sql = "UPDATE Address SET name='$name',email='$email',mobile='$mobile',address='$address',city='$city',state='$state',country='$country',pincode='$pincode',photo='$photo' WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo '<script>alert("Record updated Successfully");location.href="profile.php"</script>';
  } else {
    echo "Error updating record: " . $conn->error;
  }
}
  $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <title>Registration Form</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/dcalendar.picker.css" rel="stylesheet">
<style type="text/css">
</style>
	<script src="js/bootstrap.min.js"></script>
	<script type='text/javascript'></script>
  </head>
  <body style="background:lightyellow;">
<div class="panel" style="margin:50px;border: 1px solid red;">
	<div class="panel-heading text-info">
        	<h3 class="panel-title" style="font-size:25px;display:flex;align-items:center;justify-content:center;">EDIT ADDRESS</h3>
	</div>
<div class="panel-body">
    <form class="text-info" class="form" action="" method="post">
<div class="col-md-12 col-sm-12">
	<div class="form-group col-md-6 col-sm-6">
            <label for="name">Name*	</label>
            <input type="text" class="form-control input-sm" name="name" value=<?php echo $row['name']?> placeholder="" required>
        </div>
        <div class="form-group col-md-6 col-sm-6">
            <label for="email">Email*</label>
            <input type="email" class="form-control input-sm" name="email"value=<?php echo $row['email']?> placeholder="" required>
        </div>

        <div class="form-group col-md-6 col-sm-6">
            <label for="mobile">Mobile*</label>
            <input type="text" class="form-control input-sm" name="mobile" value=<?php echo $row['mobile']?> placeholder="" pattern="[7-9]{1}[0-9]{9}" required>
        </div>

	<div class="form-group col-md-6 col-sm-6">
	      <label for="address">Address*</label>
	      <textarea class="form-control input-sm" name="address" rows="3" required><?php echo $row['address']?></textarea>
	   </div>
	
	<div class="form-group col-md-6 col-sm-6">
            <label for="city">City*</label>
            <input type="text" class="form-control input-sm" name="city" value=<?php echo $row['city']?> placeholder="" required>
        </div>
	
	<div class="form-group col-md-6 col-sm-6">
            <label for="state">State*</label>
            <input type="text" class="form-control input-sm" name="state" value=<?php echo $row['state']?> placeholder="" required>
        </div>

	<div class="form-group col-md-6 col-sm-6">
            <label for="country">Country*</label>
            <input type="text" class="form-control input-sm" name="country" value=<?php echo $row['country']?>
            placeholder="" required>
        </div>

	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">Pincode*</label>
            <input type="text" class="form-control input-sm" name="pincode" value=<?php echo $row['pincode']?> placeholder="" pattern="[0-9]{6}" minlength="6" required>
    </div>
    <div class="form-group col-md-6 col-sm-6">
	    <label for="photo">Photo*</label>
      <img src="img/<?php echo $row['photo']?>" height="50" width="50" />
      <?php echo $row['photo']?><br>
      <br>
	    <input type="file" name="photo" onchange="previewImage(event);" >
      
      <img id = "preview" style = "max-width : 50px;"><br><br>
	</div>
  <script>
   function previewImage(event)
   {var reader = new FileReader();
   reader.onload = function()
   {
    var output = document.getElementById('preview');
    output.src = reader.result; 
    }
    reader.readAsDataURL(event.target.files[0]);
    }
  </script>
    
	<div class="form-group col-md-3 col-sm-3 pull-right" >
			<input type="submit" class="btn btn-primary" name="submit" value="Submit"/>	
    </div>
        </form>
</div>
</body>
</html>
