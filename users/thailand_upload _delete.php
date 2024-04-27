<?php
include "../connection.php";
// Check if the upload_id is set and not empty
if(isset($_POST['upload_id']) && !empty($_POST['upload_id'])) {
    // Sanitize the upload_id to prevent SQL injection or other attacks
    $uploadId = filter_var($_POST['upload_id'], FILTER_SANITIZE_NUMBER_INT);
    
    // Perform the deletion (replace this with your actual deletion logic)
    // For example, you might have a database table where you store image information
    // You would delete the corresponding record from the database using the upload_id
    // Here's a simple example assuming you have a database connection established:
    
    // Replace 'your_host', 'your_username', 'your_password', and 'your_database' with your actual database credentials
    // $connection = new mysqli('your_host', 'your_username', 'your_password', 'your_database');
    
    // Check for connection errors
    // if ($connection->connect_error) {
    //     die("Connection failed: " . $connection->connect_error);
    // }
    
    // Prepare a SQL statement to delete the image record
    $sql = "DELETE FROM thailand_upload WHERE upload_id = ?";
    
    // Prepare and bind parameters
    $statement = $connection->prepare($sql);
    $statement->bind_param("i", $uploadId);
    
    // Execute the statement
    if ($statement->execute()) {
        // If deletion is successful, return a success message
        echo "Image deleted successfully";
    } else {
        // If deletion fails, return an error message
        echo "Error deleting image: " . $connection->error;
    }
    
    // Close the statement and connection
    // $statement->close();
    // $connection->close();
} else {
    // If upload_id is not set or empty, return an error message
    echo "Invalid upload ID";
}
?>
