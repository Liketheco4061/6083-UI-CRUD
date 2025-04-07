<?php
include "dbconn.php"; 

echo "<h1>Employee List</h1>";
echo "<table border='1' cellpadding='8'>
<tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Birth Date</th>
    <th>Start Date</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Department ID</th>
    <th>Employment Type</th>
    <th>Employment Status</th>
    <th>Shield Number</th>
</tr>";

$sql = "SELECT * FROM employees";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['employeeID']}</td>
            <td>{$row['FirstName']}</td>
            <td>{$row['LastName']}</td>
            <td>{$row['BirthDate']}</td>
            <td>{$row['StartDate']}</td>
            <td>{$row['PhoneNumber']}</td>
            <td>{$row['AddressID']}</td>
            <td>{$row['DepartmentID']}</td>
            <td>{$row['EmploymentType']}</td>
            <td>{$row['EmploymentStatus']}</td>
            <td>{$row['ShieldNumber']}</td>
            <td><a href='delemployee.php?employeeID=" . $row["employeeID"] . "'>Delete</a></td>
            <td><a href='editemployee.php?employeeID=" . $row["employeeID"] . "'>Edit</a></td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='11'>No employees found.</td></tr>";
}

echo "</table>";

$conn->close();
?>

<br>
<a href='addemployee.htm'>Add New Employee</a>



