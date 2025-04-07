<?php
include "dbconn.php";
$sql = "delete from employees where employeeID=?";
$employeeID = $_REQUEST["employeeID"];
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $employeeID);
if ($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'employees.php?updated=' + new Date().getTime();</script>"; //makes sure the page refreshes
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>