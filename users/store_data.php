<?php
// Include the database connection file
include "../connection.php";

// Check if data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the JSON data sent by JavaScript
    $data = json_decode(file_get_contents("php://input"), true);

    // Check if data is not empty
    if (!empty($data['formDataArray'])) {
        // Loop through the received data array and insert each record into the database
        foreach ($data['formDataArray'] as $row) {
            // Extract data from each row
            $city = $row['city'];
            $hotel = $row['hotel'];
            $category = $row['category'];
            $room = $row['room'];
            $night = $row['night'];
            $custid = $row['rand'];
            $totalPrice = $row['totalPrice'];

            // Check if any of the required fields are null, if so, skip this iteration
            if ($city === null || $hotel === null || $category === null || $room === null || $night === null || $custid === null || $totalPrice === null) {
                continue; // Skip this iteration and move to the next
            }

            // Perform SQL query to insert data into the database
            $sql = "INSERT INTO thailand_hotel (hotelcity_name, hotels, category_name, rooms, nights, ex_adults, prices, refer_id) 
                    VALUES ('$city', '$hotel', '$category', '$room', '$night', '', '$totalPrice','$custid')";

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
