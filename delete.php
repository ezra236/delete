<?php
session_start();

$DbHost = 'localhost';
$DbUser = 'root';
$Dbpw = '';
$Dbname = 'glassesrus';

// Check if ID is set in the URL
if (!isset($_GET['id'])) {
    die("ID parameter is missing.");
}

$id = $_GET['id'];

// Connect to server and select database using mysqli
$connection = new mysqli($DbHost, $DbUser, $Dbpw, $Dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Prepare a delete statement
$delete = "DELETE FROM customers WHERE id='$id'";

// Execute the delete statement
$result = $connection->query($delete);

// Check if delete was successful
if ($result) {
    echo '<h1 style="color:#0000FF">Record Deleted Successfully</h1>';
} else {
    echo '<h1 style="color:#FF0000">Error Deleting Record</h1>';
}

// Redirect to view page
header("Location: view.php");
exit;

// Close the connection
$connection->close();
?>
