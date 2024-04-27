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
// Assuming you have a database connection established
// Function to sanitize input data
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
    $city_name = sanitize_input($_POST["city_name"]);
    if (!empty($city_name)) {
        $query = "SELECT * FROM cities WHERE city_name = '$city_name'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('City already exists!');</script>";
        } else {
            $query = "INSERT INTO cities (city_name) VALUES ('$city_name')";
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('City Add successfully!');</script>";
            } else {
                echo "Error inserting city: " . mysqli_error($conn);
            }
        }
    } else {
        echo "<script>alert('City name cannot be empty.');</script>";
    }
}
?>

<div class="adminx-content">
    <div class="adminx-main-content">
        <div class="container-fluid">
            <div class="pb-3">
                <h1><b><i>city Details</i></b></h1>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card mb-grid">
                        <div class="card-body collapse show" id="card1">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="form-label" for="name">City Name</label>
                                    <input type="text" class="form-control" id="city_name" aria-describedby="name" placeholder="Enter City Name" name="city_name">
                                </div>
                                <button type="submit" class="btn btn-sm btn-block btn-primary" name="submit">Submit</button>
                            </form>
                        </div>
                    </div>
<?php include("./incluede/footer.php") ?>