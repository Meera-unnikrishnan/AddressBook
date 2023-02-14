<?php
$servername = "localhost";
$username = "root";
$password = "meera@123";
$dbname="Addressbook";

$conn = mysqli_connect($servername, $username, $password,$dbname);

if(!$conn){
    die('Could not Connect MySql Server:' .mysql_error());
  }

if (isset($_POST["submit"])) {
    session_start();
    $email= $_POST["email"];
    $password = $_POST["password"];
    $sql = "select *from user where email = '$email' and password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
          
        if($count == 1){
            
            $_SESSION["userdetails"] = [
                "email" => $_POST["email"],
                "password" => $_POST["password"]
              ];
            if(isset($_SESSION["userdetails"])) {

            echo '<script>alert("Login successfull");location.href="profile.php"</script>';  
            } 
            
        }  
        else{  
            echo '<script>alert(" invalid credentials"); location.href="login.php"</script>';
        }       
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<style>
body {
  margin: 0;
  padding: 0;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content:center;
  background:white;
}
#login .container #login-row #login-column #login-box {
  width: 800px;
  height: 400px;
  border: 2px solid blue;
  background:lightyellow;
  border-radius:20px;

}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
#home-link{
    margin-top:-50px;
}
</style>
</head>

<body>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">        
                            <h3 class="text-center text-info">Login</h3>
                
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div><br>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div><br><br>
                            <div id="register-link" class="text-right">
                                <a href="./Register.php" class="text-info">Register here</a>
                            </div>
                            <div id="home-link" class="text-right">
                                <a href="./Home.php" class="text-info">Home</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>