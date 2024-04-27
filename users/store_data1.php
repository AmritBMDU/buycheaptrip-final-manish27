<?php
// Include the database connection file
include "../connection.php";

// Check if data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the JSON data sent by JavaScript
    $data = json_decode(file_get_contents("php://input"), true);

    // Check if data is not empty
    if (!empty($data['formDataArray1'])) {
        // Loop through the received data array and insert each record into the database
        foreach ($data['formDataArray1'] as $row) {
            // Extract data from each row
            $city = $row['city'];
            $transport = $row['transport'];
            $persion = $row['persion'];
            $transCheckinDate = $row['transCheckinDate'];
            $rand1 = $row['rand1'];

            // Check if any of the required fields are null, if so, skip this iteration
            if ($city === null || $transport === null || $persion === null || $transCheckinDate === null || $rand1 === null) {
                continue; // Skip this iteration and move to the next
            }

            // Perform SQL query to insert data into the database
            $sql = "INSERT INTO thailand_transport (transport_city, transport, prices, transport_date, refer_id) 
                    VALUES ('$city', '$transport', '$persion','$transCheckinDate','$rand1')";

            // Execute the query
            if (mysqli_query($conn, $sql)) {
                echo "Data inserted successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    } else {
        echo "No data received.";
    }
} else {
    echo "Invalid request.";
}

// Close the database connection
mysqli_close($conn);
?>
