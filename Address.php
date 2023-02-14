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
    $query="select id from user where email='$usermail'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $user_id=$row["id"];
    $sql = "insert into address(user_id,name,email,mobile,address,city,state,country,pincode,photo) 
    VALUES('$user_id','$name','$email','$mobile', '$address','$city','$state','$country','$pincode','$photo')";
    if(mysqli_query($conn,$query)){
    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Address added successfully");location.href="profile.php"</script>'; 
     }}else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }  
}

mysqli_close($conn);
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
        	<h3 class="panel-title" style="font-size:25px;display:flex;align-items:center;justify-content:center;">ADD ADDRESS</h3>
	</div>
<div class="panel-body">
    <form class="text-info" class="form" action="" method="post">
<div class="col-md-12 col-sm-12">
	<div class="form-group col-md-6 col-sm-6">
            <label for="name">Name*	</label>
            <input type="text" class="form-control input-sm" name="name" placeholder="" required>
        </div>
        <div class="form-group col-md-6 col-sm-6">
            <label for="email">Email*</label>
            <input type="email" class="form-control input-sm" name="email" placeholder="" required>
        </div>

        <div class="form-group col-md-6 col-sm-6">
            <label for="mobile">Mobile*</label>
            <input type="text" class="form-control input-sm" name="mobile" placeholder="" pattern="[6-9]{1}[0-9]{9}" required>
        </div>

	<div class="form-group col-md-6 col-sm-6">
	      <label for="address">Address*</label>
	      <textarea class="form-control input-sm" name="address" rows="3" required></textarea>
	   </div>
	
	<div class="form-group col-md-6 col-sm-6">
            <label for="city">City*</label>
            <input type="text" class="form-control input-sm" name="city" placeholder="" required>
        </div>
	
	<div class="form-group col-md-6 col-sm-6">
            <label for="state">State*</label>
            <input type="text" class="form-control input-sm" name="state" placeholder="" required>
        </div>

	<div class="form-group col-md-6 col-sm-6">
            <label for="country">Country*</label>
            <input type="text" class="form-control input-sm" name="country" placeholder="" required>
        </div>

	<div class="form-group col-md-6 col-sm-6">
            <label for="pincode">Pincode*</label>
            <input type="text" class="form-control input-sm" name="pincode" placeholder="" pattern="[0-9]{6}" minlength="6" required>
    </div>
    <div class="form-group col-md-6 col-sm-6">
	    <label for="photo">Photo*</label>
	    <input type="file" name="photo" required>
	    <p class="help-block">Please upload an image</p>
	</div>
    
	<div class="form-group col-md-3 col-sm-3 pull-right" >
			<input type="submit" class="btn btn-primary" name="submit" value="Submit"/>	
    </div>
        </form>
</div>
</body>
</html>
