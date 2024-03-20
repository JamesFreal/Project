<?php
include 'conn.php'; 

$firstn = $_POST['fulln'];
$lastn = $_POST['comn'];
$email = $_POST['email'];
$homea = $_POST['comea'];
$gender = $_POST['gender'];
$date = $_POST['date'];
$phonum = $_POST['phonum'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Prepare and bind the statement
$stmt = $conn->prepare("INSERT INTO ORG_USER (full_name, com_name, email, Com_adress, gender, ph_num, birth_date, pass) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $firstn, $lastn, $email, $homea, $gender, $phonum, $date, $password);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement, but do not close the connection here
$stmt->close();
?>
