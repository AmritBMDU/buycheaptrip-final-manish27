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
function sanitize_input($conn, $data)
{
    $data = trim($data);
    $data = mysqli_real_escape_string($conn, $data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $hcategory_id = $_POST['hcategory_id'];
    $category_name = sanitize_input($conn, $_POST['category_name']);
    $hc_id = sanitize_input($conn, $_POST['hc_id']);
    $prices= sanitize_input($conn, $_POST['prices']);

    // Perform input validation here if needed

    // Update the hotel in the database
    $update_query = "UPDATE hotel_categories SET category_name = '$category_name',prices = '$prices', hc_id = '$hc_id' WHERE hcategory_id = $hcategory_id";
    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert(' updated successfully.');
        window.location.href = 'hotel_category_all';
        </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} elseif (isset($_GET['hcategory_id'])) {
    $hcategory_id = $_GET['hcategory_id'];

    // Retrieve hotel details from the database
    $query = "SELECT * FROM hotel_categories WHERE hcategory_id = $hcategory_id";
    $result = mysqli_query($conn, $query);
    $hotel = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
} else {
    header("Location: hotel_category_all");
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
                                <input type="hidden" name="hcategory_id" value="<?php echo $hotel['hcategory_id']; ?>">
                                <div class="form-group">
                                    <label class="form-label" for="hotel_name">Hotel Name</label>
                                    <select class="form-control" id="city_id" name="hc_id">
                                        <option value="disabled">Select Hotel</option>
                                        <?php
                                        $query = "SELECT * FROM hotels";
                                        $result = mysqli_query($conn, $query);
                                        if ($result && mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $selected = ($row['hotel_id'] == $hotel['hc_id']) ? 'selected' : '';
                                                echo "<option value='" . $row['hotel_id'] . "' $selected>" . $row['hotel_name'] . "</option>";
                                            }
                                        }
                                        mysqli_free_result($result);
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="hotel name">Hotel Name</label>
                                    <input type="text" class="form-control" id="hotel_name" aria-describedby="name" placeholder="Enter Category Name" name="category_name" value="<?php echo htmlspecialchars($hotel['category_name']); ?>">
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