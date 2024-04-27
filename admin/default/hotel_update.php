<?php
include "../../connection.php";
session_start();
if (!isset($_SESSION["userid"])) {
    header("Location:../index");
}
?>
<?php $page = "customer";
include("./incluede/header.php") ?>
<!-- Main Content -->
<style>
    .form-row {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 10px;
        text-align: center;
    }

    .form-row label {
        margin-bottom: 5px;
    }

    .form-row select,
    .form-row input[type="date"] {
        width: 200px;
    }
</style>
<?php
// Assuming you have already established a database connection
// $conn = mysqli_connect("localhost", "username", "password", "database");

// Function to sanitize input
function sanitize_input($conn, $data)
{
    $data = trim($data);
    $data = mysqli_real_escape_string($conn, $data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $hotel_id = $_POST['hotel_id'];
    $hotel_name = sanitize_input($conn, $_POST['hotel_name']);
    $hcity_id = sanitize_input($conn, $_POST['hcity_id']);

    // Perform input validation here if needed

    // Update the hotel in the database
    $update_query = "UPDATE hotels SET hotel_name = '$hotel_name', hcity_id = '$hcity_id' WHERE hotel_id = $hotel_id";
    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('Hotel updated successfully.');
        window.location.href = 'hotel_all';
        </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} elseif (isset($_GET['hotel_id'])) {
    $hotel_id = $_GET['hotel_id'];

    // Retrieve hotel details from the database
    $query = "SELECT * FROM hotels WHERE hotel_id = $hotel_id";
    $result = mysqli_query($conn, $query);
    $hotel = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
} else {
    // Redirect to the page where hotels are listed if no hotel ID is provided
    header("Location: hotel_all");
    exit;
}
?>
<div class="adminx-content">
    <div class="adminx-main-content">
        <div class="container-fluid">
            <div class="pb-3">
                <h1><b><i>Hotel Details</i></b></h1>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card mb-grid">
                        <div class="card-body collapse show" id="card1">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <input type="hidden" name="hotel_id" value="<?php echo $hotel['hotel_id']; ?>">
                                <div class="form-group">
                                    <label class="form-label" for="hotel name">Hotel Name</label>
                                    <input type="text" class="form-control" id="hotel_name" aria-describedby="name" placeholder="Enter Hotel Name" name="hotel_name" value="<?php echo htmlspecialchars($hotel['hotel_name']); ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="hotel_name">City Name</label>
                                    <select class="form-control" id="city_id" name="hcity_id">
                                        <option value="disabled">Select City</option>
                                        <?php
                                        $query = "SELECT * FROM cities";
                                        $result = mysqli_query($conn, $query);
                                        if ($result && mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $selected = ($row['city_id'] == $hotel['hcity_id']) ? 'selected' : '';
                                                echo "<option value='" . $row['city_id'] . "' $selected>" . $row['city_name'] . "</option>";
                                            }
                                        }
                                        mysqli_free_result($result);
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-sm btn-block btn-primary" name="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                    <?php include("./incluede/footer.php") ?>