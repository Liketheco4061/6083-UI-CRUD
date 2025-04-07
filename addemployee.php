<?php
include "dbconn.php";

var_dump($_REQUEST);

$sql = "INSERT INTO employees (
    FirstName, LastName, BirthDate, StartDate,
    PhoneNumber, AddressID, DepartmentID,
    EmploymentType, EmploymentStatus, ShieldNumber
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$fname = $_REQUEST["fname"];
$lname = $_REQUEST["lname"];
$bdate = $_REQUEST["bdate"];
$sdate = $_REQUEST["sdate"];
$phone = $_REQUEST["phone"];
$address = $_REQUEST["address"];
$dept = $_REQUEST["dept"];
$etype = $_REQUEST["etype"];
$estatus = $_REQUEST["estatus"];
$shield = $_REQUEST["shield"];

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssss", $fname, $lname, $bdate, $sdate, $phone, $address, $dept, $etype, $estatus, $shield);

if ($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'employees.php?updated=' + new Date().getTime();</script>"; //makes sure the page refreshes
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
