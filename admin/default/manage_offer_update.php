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
    $trans = $_POST['id'];
    $short_description = sanitize_input($conn, $_POST['short_description']);

    $long_description = sanitize_input($conn, $_POST['long_description']);

   
    $update_query = "UPDATE manage_offer SET short_description = '$short_description', long_description = '$long_description' WHERE id = $trans";
    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert(' updated successfully.');
        window.location.href = 'manage_offer';
        </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} elseif (isset($_GET['id'])) {
    $trans = $_GET['id'];

    // Retrieve trans details from the database
    $query = "SELECT * FROM manage_offer WHERE id = $trans";
    $result = mysqli_query($conn, $query);
    $trans = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
} else {
    header("Location: manage_offer");
    exit;
}
?>
<div class="adminx-content">
    <div class="adminx-main-content">
        <div class="container-fluid">
            <div class="pb-3">
                <h1><b><i> Update Manage Offer Details</i></b></h1>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card mb-grid">
                        <div class="card-body collapse show" id="card1">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <input type="hidden" name="id" value="<?php echo $trans['id']; ?>">
                                
                                <div class="form-group">
                                    <label class="form-label" for="trans name">Short Description</label>
                                    <textarea class="form-control" id="name" aria-describedby="name"  name="short_description" 
                                    value="" required><?php echo htmlspecialchars($trans['short_description']); ?></textarea>
                                    <label class="form-label" for="trans name">Long Description</label>
                                    <textarea class="form-control" id="name" aria-describedby="name"  name="long_description" 
                                    value="" required><?php echo htmlspecialchars($trans['long_description']); ?></textarea>

                                </div>
                                <!-- <div class="form-group">
                                    <label class="form-label" for="trans name">Prices Details </label>
                                    <textarea class="form-control" id="prices" aria-describedby="name" placeholder="Enter prices Datails" name="prices" value="
                                    <?php echo htmlspecialchars($trans['prices']); ?>" required>
                                </div> -->
                                <button type="submit" class="btn btn-sm btn-block btn-primary" name="submit">Upadte</button>
                            </form>
                        </div>
                    </div>
                    <?php include("./incluede/footer.php") ?>