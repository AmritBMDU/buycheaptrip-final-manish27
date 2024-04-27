<?php
include ".../../connection.php";
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
    $sight_id = $_POST['sight_id'];
    $sight_name = sanitize_input($conn, $_POST['sight_name']);

    $tsight_id = sanitize_input($conn, $_POST['tsight_id']);

    $prices = sanitize_input($conn, $_POST['prices']);
    $update_query = "UPDATE sightseeing SET sight_name = '$sight_name',prices = '$prices', tsight_id = '$tsight_id' WHERE sight_id = $sight_id";
    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert(' updated successfully.');
        window.location.href = 'sightseeing_all';
        </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} elseif (isset($_GET['sight_id'])) {
    $sight_id = $_GET['sight_id'];
    // Retrieve trans details from the database
    $query = "SELECT * FROM sightseeing WHERE sight_id = $sight_id";
    $result = mysqli_query($conn, $query);
    $trans = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
} else {
    header("Location: sightseeing_all");
    exit;
}
?>
<div class="adminx-content">
    <div class="adminx-main-content">
        <div class="container-fluid">
            <div class="pb-3">
                <h1><b><i>Sightseeing Details</i></b></h1>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card mb-grid">
                        <div class="card-body collapse show" id="card1">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <input type="hidden" name="sight_id" value="<?php echo $trans['sight_id']; ?>">
                                <div class="form-group">
                                    <label class="form-label" for="trans_name">City Name</label>
                                    <select class="form-control" id="city_id" name="tsight_id">
                                        <option value="disabled">Select City</option>
                                        <?php
                                        $query = "SELECT * FROM cities";
                                        $result = mysqli_query($conn, $query);
                                        if ($result && mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $selected = ($row['city_id'] == $trans['tsight_id']) ? 'selected' : '';
                                                echo "<option value='" . $row['city_id'] . "' $selected>" . $row['city_name'] . "</option>";
                                            }
                                        }
                                        mysqli_free_result($result);
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="trans name">Sightseeing Details </label>
                                    <input type="text" class="form-control" id="trans_name" aria-describedby="name" placeholder="Enter transport Datails" name="sight_name" value="<?php echo htmlspecialchars($trans['sight_name']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="trans name">Prices Details </label>
                                    <input type="text" class="form-control" id="prices" aria-describedby="name" placeholder="Enter prices Datails" name="prices" value="<?php echo htmlspecialchars($trans['prices']); ?>" required>
                                </div>
                                <button type="submit" class="btn btn-sm btn-block btn-primary" name="submit">Upadte</button>
                            </form>
                        </div>
                    </div>
                    <?php include("./incluede/footer.php") ?>