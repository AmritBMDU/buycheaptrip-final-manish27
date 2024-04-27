<?php
include "../../connection.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newStatus = $_POST['newStatus'];
    $customerId = $_POST['custId'];
    $sql = "UPDATE thailand_customers SET status = '$newStatus' WHERE cust_id = $customerId";

    if ($conn->query($sql) === TRUE) {
        echo $newStatus;
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();
}
?>
