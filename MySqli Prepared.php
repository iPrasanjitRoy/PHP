<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demo";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = 1;

/*--------SQL Query With Placeholders------*/
$sql = "SELECT ID, Name, Age, Address FROM users WHERE ID = ?";

/*-------Prepare The Statement--------*/
$result = $conn->prepare($sql);

/*------Bind Parameter-------*/
// Data Types -> Value 
$result->bind_param("i", $user_id);

/*----Execute The Statement----*/
if ($result->execute()) {
    $result->bind_result($result_id, $result_name, $result_age, $result_address);

    /*--Fetch Results--*/
    while ($result->fetch()) {
        echo "User ID: $result_id, Name: $result_name, Age: $result_age, Address: $result_address<br>";
    }

    $result->close();
} else {
    echo "Error: " . $result->error;
}

$conn->close();

?>