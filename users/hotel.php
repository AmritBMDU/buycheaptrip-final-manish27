<?php 
include "../connection.php";

// Check if city_id is set in the POST data
if(isset($_POST['city_id'])) {
    $city_id = $_POST['city_id'];
    $data_id = $_POST['data_id'];
    // print_r($data_id);
    // exit;

    // Query to select hotels for the given city_id
    $query = "SELECT * FROM hotels WHERE hcity_id='" . $city_id . "' ORDER BY hotel_name ASC";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if query executed successfully
    if($result) {
        // Check if any hotels are found
        if(mysqli_num_rows($result) > 0) {
            ?>
            <option value="" selected disabled>Select</option>
            <?php
            // Loop through the results and create options
            while($row = mysqli_fetch_assoc($result)){
                ?>
                <option value="<?php echo $row['hotel_id'] ?>" id="hotel<?php echo $data_id ?>" data-custom-attribute1="<?php echo $row['hotel_name'] ?>"><?php echo $row['hotel_name'] ?></option>
                <?php 
            }
        } else {
            echo '<option value="disabled">No hotels found</option>';
        }
    } else {
        echo "Error executing query: " . mysqli_error($conn);
    }
} else {
    echo "City ID is not set.";
}
?>
