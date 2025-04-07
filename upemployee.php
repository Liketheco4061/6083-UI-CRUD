<?php
include "dbconn.php";

$sql = "UPDATE employees SET 
    FirstName = ?, 
    LastName = ?, 
    BirthDate = ?, 
    StartDate = ?, 
    PhoneNumber = ?, 
    AddressID = ?, 
    DepartmentID = ?, 
    EmploymentType = ?, 
    EmploymentStatus = ?, 
    ShieldNumber = ? 
    WHERE employeeID = ?";

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
$id = $_REQUEST["employeeID"];

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssssi", $fname, $lname, $bdate, $sdate, $phone, $address, $dept, $etype, $estatus, $shield, $id);

if ($stmt->execute() === TRUE) {
    echo "<script>window.location.href = 'employees.php?updated=' + new Date().getTime();</script>"; //makes sure the page refreshes
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
