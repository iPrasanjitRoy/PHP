<?php

$student_id = $_POST['id'];

$str = implode(",", $student_id); // Convert Array Into String 

$conn = mysqli_connect("localhost", "root", "", "testing") or die("Connection Failed");

$sql = "DELETE FROM students WHERE id IN ({$str})";


if (mysqli_query($conn, $sql)) {
  echo 1;
} else {
  echo 0;
}

?>