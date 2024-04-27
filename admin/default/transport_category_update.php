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
    $tranport_cat_id= $_POST['tranport_cat_id'];
    $transport_category = sanitize_input($conn, $_POST['transport_category']);
    $transref_id = sanitize_input($conn, $_POST['transref_id']);
    $prices= sanitize_input($conn, $_POST['prices']);
    $update_query = "UPDATE transport_category SET transport_category = '$transport_category',prices = '$prices', transref_id = '$transref_id' WHERE tranport_cat_id= $tranport_cat_id";
    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert(' updated successfully.');
        window.location.href = 'transport_category_all';
        </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} elseif (isset($_GET['tranport_cat_id'])) {
    $tranport_cat_id= $_GET['tranport_cat_id'];

    // Retrieve hotel details from the database
    $query = "SELECT * FROM transport_category WHERE tranport_cat_id= $tranport_cat_id";
    $result = mysqli_query($conn, $query);
    $hotel = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
} else {
    header("Location: transport_category_all");
    exit;
}
?>
<div class="adminx-content">
    <div class="adminx-main-content">
        <div class="container-fluid">
            <div class="pb-3">
                <h1><b><i>Hotel Category Details</i></b></h1>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card mb-grid">
                        <div class="card-body collapse show" id="card1">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <input type="hidden" name="tranport_cat_id" value="<?php echo $hotel['tranport_cat_id']; ?>">
                                <div class="form-group">
                                    <label class="form-label" for="hotel_name">Transport Datails</label>
                                    <select class="form-control" id="city_id" name="transref_id">
                                        <option value="disabled">Select Transport</option>
                                        <?php
                                        $query = "SELECT * FROM transport";
                                        $result = mysqli_query($conn, $query);
                                        if ($result && mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $selected = ($row['trans_id'] == $hotel['transref_id']) ? 'selected' : '';
                                                echo "<option value='" . $row['trans_id'] . "' $selected>" . $row['transport_name'] . "</option>";
                                            }
                                        }
                                        mysqli_free_result($result);
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="hotel name">Transport Details</label>
                                    <input type="text" class="form-control" id="transport_name" aria-describedby="name" placeholder="Enter Category Name" name="transport_category" value="<?php echo htmlspecialchars($hotel['transport_category']); ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="hotel name">Hotel Name</label>
                                    <input type="text" class="form-control" id="hotel_name" aria-describedby="name" placeholder="Enter Category Price " name="prices" value="<?php echo htmlspecialchars($hotel['prices']); ?>">
                                </div>
                                <button type="submit" class="btn btn-sm btn-block btn-primary" name="submit">Update</button>
                            </form>
                        </div>
                    </div>
                    <?php include("./incluede/footer.php") ?>