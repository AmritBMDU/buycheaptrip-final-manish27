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
function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Sanitize input
    $hotel_name = sanitize_input($_POST["hotel_name"]);
    $hcity_id = sanitize_input($_POST["hcity_id"]);
    if (!empty($hotel_name)) {
        $query = "SELECT * FROM hotels WHERE hotel_name = '$hotel_name'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('hotel already exists!');</script>";
        } else {
            $query = "INSERT INTO hotels (hotel_name,hcity_id) VALUES ('$hotel_name','$hcity_id')";
            // echo $query;
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('hotel Add successfully!');</script>";
            } else {
                echo "Error inserting hotel: " . mysqli_error($conn);
            }
        }
    } else {
        echo "<script>alert('hotel name cannot be empty.');</script>";
    }
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
                                <div class="form-group">
                                    <label class="form-label" for="hotel name">Hotel Name</label>
                                    <input type="text" class="form-control" id="hotel_name" aria-describedby="name" placeholder="Enter Hotel Name" name="hotel_name">
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
                                        ?>
                                                <option value="<?php echo $row['city_id']; ?>">
                                                    <?php echo $row['city_name']; ?></option>

                                        <?php
                                            }
                                        } else {
                                            echo '<option disabled>No hotels found</option>';
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