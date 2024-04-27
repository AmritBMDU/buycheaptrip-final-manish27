<?php
// Include the database connection file
include "../connection.php";

// Check if data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the JSON data sent by JavaScript
    $data = json_decode(file_get_contents("php://input"), true);

    // Check if data is not empty
    if (!empty($data['sightseeingDataArray'])) {
        // Loop through the received data array and insert each record into the database
        foreach ($data['sightseeingDataArray'] as $row) {
            // Extract data from each row
            $sightcity = $row['sightCity'];
            $sightseeing = $row['sightseeing'];
            $sightpersion = $row['sightPersion'];
            $totalPrice = $row['totalPrice'];
            $sightCheckinDate = $row['sightCheckinDate'];
            $rands = $row['rands'];

            // Check if any of the required fields are null, if so, skip this iteration
            if ($sightcity === null || $sightseeing === null || $sightpersion === null || $totalPrice === null || $sightCheckinDate === null || $rands === null) {
                continue; // Skip this iteration and move to the next
            }

            // Perform SQL query to insert data into the database
            $sql = "INSERT INTO thailand_sightseeing (sight_city, sightseeing, sight_persion, prices, sight_date, refer_id) 
                    VALUES ('$sightcity', '$sightseeing', '$sightpersion','$totalPrice','$sightCheckinDate','$rands')";

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
