<?php 
include "../connection.php";

// Check if city_id is set in the POST data
if(isset($_POST['city_id'])) {
    $city_id = $_POST['city_id'];

    // Query to select hotels for the given city_id
    $query = "SELECT trans_id, transport_name, prices FROM transport WHERE tcity_id='" . $city_id . "' ORDER BY transport_name ASC";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if query executed successfully
    if($result) {
        // Check if any hotels are found
        if(mysqli_num_rows($result) > 0) {
            // Loop through the results and create options
            ?>
            <option value="" selected disabled>Select</option>
            <?php
            while($row = mysqli_fetch_assoc($result)){
                ?>
                <option value="<?php echo $row['trans_id'] ?>" data-custom-category2="<?php echo $row['transport_name'] ?>"><?php echo $row['transport_name']?></option>
                <?php 
            }
        } else {
            echo '<option value="disabled">No found</option>';
        }
    } else {
        echo "Error executing query: " . mysqli_error($conn);
    }
} else {
    echo "City ID is not set.";
}
?>
