<?php
$db = 'mysql:host=localhost;dbname=demo';
$username = 'root';
$password = '';

/*-------Create A PDO Instance Or Objects-------*/
$conn = new PDO($db, $username, $password);

$ageLimit = 30;

/* $sql = "SELECT * FROM users"; */

$sql = "SELECT * FROM users WHERE Age > :age";

$result = $conn->prepare($sql);

$result->bindParam(':age', $ageLimit, PDO::PARAM_INT);

$result->execute();

/*-----Fetch All Rows As An Associative Array------*/
$users = $result->fetchAll(PDO::FETCH_ASSOC);

/*------- Display The Data-------*/
echo "<h2>User Data:</h2>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Name</th><th>Address</th><th>Age</th></tr>";

foreach ($users as $user) {
    echo "<tr>";
    echo "<td>{$user['ID']}</td>";
    echo "<td>{$user['Name']}</td>";
    echo "<td>{$user['Address']}</td>";
    echo "<td>{$user['Age']}</td>";
    echo "</tr>";
}

echo "</table>";

/*-------Close The Connection---------*/
$conn = null;


?>