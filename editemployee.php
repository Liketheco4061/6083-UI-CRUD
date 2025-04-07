<?php
include "dbconn.php";

$sql = "SELECT * FROM employees WHERE employeeID = ?";
$employeeID = $_REQUEST["employeeID"];

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $employeeID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}
?>

<h2>Now editing Employee Number <?php echo $row['employeeID']; ?>: <?php echo $row['FirstName'] . " " . $row['LastName']; ?></h2>


<form action="upemployee.php" method="POST">
    <label for="fname">First Name:</label><br>
    <input type="text" id="fname" name="fname" value="<?php echo $row['FirstName']; ?>"><br>

    <label for="lname">Last Name:</label><br>
    <input type="text" id="lname" name="lname" value="<?php echo $row['LastName']; ?>"><br>

    <label for="bdate">Birth Date:</label><br>
    <input type="date" id="bdate" name="bdate" value="<?php echo $row['BirthDate']; ?>"><br>

    <label for="sdate">Start Date:</label><br>
    <input type="date" id="sdate" name="sdate" value="<?php echo $row['StartDate']; ?>"><br>

    
    <label for="phone">Phone Number:</label><br>
    <input type="tel" id="phone" name="phone" maxlength="10" pattern="[0-9]{10}" value="<?php echo $row['PhoneNumber']; ?>" required><br>
    
    <script> //makes usre only numbers are entered
    document.getElementById("phone").addEventListener("input", function(e) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    </script>


    <label for="address">Address:</label><br>
    <input type="text" id="address" name="address" value="<?php echo $row['AddressID']; ?>"><br>

    <label for="dept">Department ID:</label><br>
    <select id="dept" name="dept" required>
        <?php
        $departments = ['001','002','003','004','005','006','007','008','009','010'];
        foreach ($departments as $dept) {
            $selected = ($row['DepartmentID'] == $dept) ? "selected" : "";
            echo "<option value='$dept' $selected>$dept</option>";
        }
        ?>
    </select><br>

    <label for="etype">Employment Type:</label><br>
    <select id="etype" name="etype" required>
        <option value="Civilian" <?php if ($row['EmploymentType'] == 'Civilian') echo 'selected'; ?>>Civilian</option>
        <option value="Uniform" <?php if ($row['EmploymentType'] == 'Uniform') echo 'selected'; ?>>Uniform</option>
    </select><br>

    <label for="estatus">Employment Status:</label><br>
    <select id="estatus" name="estatus" required>
        <option value="Active" <?php if ($row['EmploymentStatus'] == 'Active') echo 'selected'; ?>>Active</option>
        <option value="Inactive" <?php if ($row['EmploymentStatus'] == 'Inactive') echo 'selected'; ?>>Inactive</option>
    </select><br>

    <label for="shield">Shield Number:</label><br>
    <input type="text" id="shield" name="shield" maxlength="5" value="<?php echo $row['ShieldNumber']; ?>"><br>

    <input type="hidden" id="employeeID" name="employeeID" value="<?php echo $row['employeeID']; ?>"><br>

    <input type="submit" value="Update Employee">
    <button type="button" onclick="window.location.href='employees.php'">Cancel</button>

</form>
