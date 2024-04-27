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
    $trans_id = $_POST['trans_id'];
    $transport_name = sanitize_input($conn, $_POST['transport_name']);

    $tcity_id = sanitize_input($conn, $_POST['tcity_id']);

    $prices = sanitize_input($conn, $_POST['prices']);
    $update_query = "UPDATE transport SET transport_name = '$transport_name',prices = '$prices', tcity_id = '$tcity_id' WHERE trans_id = $trans_id";
    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert(' updated successfully.');
        window.location.href = 'transport_all';
        </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} elseif (isset($_GET['trans_id'])) {
    $trans_id = $_GET['trans_id'];

    // Retrieve trans details from the database
    $query = "SELECT * FROM transport WHERE trans_id = $trans_id";
    $result = mysqli_query($conn, $query);
    $trans = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
} else {
    header("Location: transport_all");
    exit;
}
?>
<div class="adminx-content">
    <div class="adminx-main-content">
        <div class="container-fluid">
            <div class="pb-3">
                <h1><b><i>Transport Details</i></b></h1>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card mb-grid">
                        <div class="card-body collapse show" id="card1">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <input type="hidden" name="trans_id" value="<?php echo $trans['trans_id']; ?>">
                                <div class="form-group">
                                    <label class="form-label" for="trans_name">City Name</label>
                                    <select class="form-control" id="city_id" name="tcity_id">
                                        <option value="disabled">Select City</option>
                                        <?php
                                        $query = "SELECT * FROM cities";
                                        $result = mysqli_query($conn, $query);
                                        if ($result && mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $selected = ($row['city_id'] == $trans['tcity_id']) ? 'selected' : '';
                                                echo "<option value='" . $row['city_id'] . "' $selected>" . $row['city_name'] . "</option>";
                                            }
                                        }
                                        mysqli_free_result($result);
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="trans name">Transport Details </label>
                                    <input type="text" class="form-control" id="trans_name" aria-describedby="name" placeholder="Enter transport Datails" name="transport_name" value="<?php echo htmlspecialchars($trans['transport_name']); ?>" required>
                                </div>
                                <!-- <div class="form-group">
                                    <label class="form-label" for="trans name">Prices Details </label>
                                    <input type="text" class="form-control" id="prices" aria-describedby="name" placeholder="Enter prices Datails" name="prices" value="<?php echo htmlspecialchars($trans['prices']); ?>" required>
                                </div> -->
                                <button type="submit" class="btn btn-sm btn-block btn-primary" name="submit">Upadte</button>
                            </form>
                        </div>
                    </div>
                    <?php include("./incluede/footer.php") ?>