<?php
include "../connection.php";
session_start();
if (($_SESSION["usersID"] == "")) {
    header("Location:../index");
}

// Start a transaction
mysqli_begin_transaction($conn);

try {
    // Insert data into thailand_customer table
    $account_id= $_SESSION["userEmail"];
    $random_number = "BCT" . str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
    $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $travel_date = mysqli_real_escape_string($conn, $_POST['travel_date']);
    $pax = mysqli_real_escape_string($conn, $_POST['pax']);
    $package_inr = mysqli_real_escape_string($conn, $_POST['package_inr']);
    $persion_inr = mysqli_real_escape_string($conn, $_POST['persion_inr']);

    $sql_customer = "INSERT INTO thailand_customers (customer_name, email, phone, travel_date, pax, reff_id, package_inr, persion_inr, account_id) 
                     VALUES ('$customer_name', '$email', '$phone', '$travel_date', '$pax', '$random_number', '$package_inr', '$persion_inr', '$account_id')";
    mysqli_query($conn, $sql_customer);

    for ($i = 0; $i < count($_POST['hotelcity_name']); $i++) {
        if (!empty($_POST['hotelcity_name'][$i]) && !empty($_POST['hotels'][$i]) && !empty($_POST['category_name'][$i])) {
            // Retrieve the form data for each set
            $hotelcity_name = mysqli_real_escape_string($conn, $_POST['hotelcity_name'][$i]);
            $hotels = mysqli_real_escape_string($conn, $_POST['hotels'][$i]);
            $category = mysqli_real_escape_string($conn, $_POST['category_name'][$i]);
            $rooms = mysqli_real_escape_string($conn, $_POST['rooms'][$i]);
            $nights = mysqli_real_escape_string($conn, $_POST['nights'][$i]);
            $adults = mysqli_real_escape_string($conn, $_POST['ex_adults'][$i]);
            $checkinDate = mysqli_real_escape_string($conn, $_POST['hotelCheckinDate'][$i]);

            // Prepare and execute the SQL statement
            $query = "INSERT INTO thailand_hotel (hotelcity_name, hotels, category_name, rooms, nights, ex_adults, hotelCheckinDate,reff_id,account_id) 
                  VALUES ('$hotelcity_name', '$hotels', '$category', '$rooms', '$nights', '$adults', '$checkinDate', '$random_number', '$account_id')";
            mysqli_query($conn, $query); // execute the query
        }
    }

    for ($i = 0; $i < count($_POST['transport_city']); $i++) {
        // Retrieve the form data for each set
        if (!empty($_POST['transport_city'][$i]) && !empty($_POST['transport'][$i])) {
            $transport_city = mysqli_real_escape_string($conn, $_POST['transport_city'][$i]);
            $transport = mysqli_real_escape_string($conn, $_POST['transport'][$i]);
            $trans_pax = mysqli_real_escape_string($conn, $_POST['trans_pax'][$i]);
            $transCheckinDate = mysqli_real_escape_string($conn, $_POST['transCheckinDate'][$i]);
            $query = "INSERT INTO thailand_transport (transport_city, transport, trans_pax, transCheckinDate, reff_id,account_id) 
                  VALUES ('$transport_city', '$transport', '$trans_pax', '$transCheckinDate', '$random_number', '$account_id')";
            mysqli_query($conn, $query); // execute the query
        }
    }

    for ($i = 0; $i < count($_POST['sight_city']); $i++) {
        // Retrieve the form data for each set
        if(!empty($_POST['sight_city'][$i]) && !empty($_POST['sightseeing'][$i])) {
        $sightCity = mysqli_real_escape_string($conn, $_POST['sight_city'][$i]);
        $sightseeing = mysqli_real_escape_string($conn, $_POST['sightseeing'][$i]);
        $sightPersion = mysqli_real_escape_string($conn, $_POST['sight_persion'][$i]);
        $sightCheckinDate = mysqli_real_escape_string($conn, $_POST['sightCheckinDate'][$i]);

        // Prepare and execute the SQL statement
        $query = "INSERT INTO thailand_sightseeing (sight_city, sightseeing, sight_persion, sightCheckinDate, reff_id,account_id) 
                  VALUES ('$sightCity', '$sightseeing', '$sightPersion', '$sightCheckinDate', '$random_number','$account_id')";
        mysqli_query($conn, $query); // execute the query
    }
}

    mysqli_commit($conn);

    echo "<script>alert('All data inserted successfully'); window.location='thailand_form.php';</script>";
} catch (Exception $e) {
    mysqli_rollback($conn);
    echo "Error: " . $e->getMessage();
}

mysqli_close($conn);
