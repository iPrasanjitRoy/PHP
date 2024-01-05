<?php
$db = 'mysql:host=localhost;dbname=demo';
$username = 'root';
$password = '';

$conn = new PDO($db, $username, $password);

/*---------Insert New Data Into The Users Table------*/
$newUserData = [
    ['Alice Johnson', '456 Pine St', 28],
    ['Bob White', '789 Elm St', 30],
    ['Charlie Brown', '123 Oak Ln', 32],
];

$sqlCheckUsername = "SELECT COUNT(*) FROM users WHERE Name = :name";
$resultCheckUsername = $conn->prepare($sqlCheckUsername);

$sqlInsertUser = "INSERT INTO users (Name, Address, Age) VALUES (:name, :address, :age)";
$resultInsertUser = $conn->prepare($sqlInsertUser);

foreach ($newUserData as $userData) {

    /*-----------Check If User Already Exists------------*/
    $resultCheckUsername->bindParam(':name', $userData[0], PDO::PARAM_STR);
    $resultCheckUsername->execute();
    $usernameExists = $resultCheckUsername->fetchColumn();

    if ($usernameExists == 0) {
        $resultInsertUser->bindParam(':name', $userData[0], PDO::PARAM_STR);
        $resultInsertUser->bindParam(':address', $userData[1], PDO::PARAM_STR);
        $resultInsertUser->bindParam(':age', $userData[2], PDO::PARAM_INT);

        try {
            $resultInsertUser->execute();
            echo "User {$userData[0]} Inserted Successfully! <br>";
        } catch (PDOException $e) {
            echo "Error Inserting User {$userData[0]}: " . $e->getMessage() . "<br>";
        }
    } else {
        echo "User {$userData[0]} Already Exists. Skipped Insertion.<br>";
    }
}

/*---------Display User Data------*/
$sqlSelectUsers = "SELECT * FROM users";
$resultSelectUsers = $conn->prepare($sqlSelectUsers);
$resultSelectUsers->execute();


$users = $resultSelectUsers->fetchAll(PDO::FETCH_ASSOC);


echo "<h2>User Data (Age):</h2>";
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

$conn = null;

?>