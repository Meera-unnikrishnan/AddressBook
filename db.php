<?php
$servername = "localhost";
$username = "root";
$password = "meera@123";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "CREATE DATABASE Addressbook";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}
$conn->close();
$dbname="Addressbook";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50) UNIQUE,
    password VARCHAR(25) NOT NULL
    )";
    
    if ($conn->query($sql) === TRUE) {
      echo "Table user created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }
    
$conn->close();
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "CREATE TABLE address(
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50) UNIQUE,
    mobile BIGINT NOT NULL,
    address TEXT NOT NULL,
    city VARCHAR(15) NOT NULL,
    state vARCHAR(15) NOT NULL,
    country VARCHAR(15) NOT NULL,
    pincode INT NOT NULL,
    photo LONGBLOB NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(id)
    )";
    
    if ($conn->query($sql) === TRUE) {
      echo "Table user created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }
    
$conn->close();
?>