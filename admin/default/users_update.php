<?php
include "../../connection.php";
session_start();
if (!isset($_SESSION["userid"])) {
    header("Location:../index");
}
?>
<?php $page = "users";
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
    $id = $_POST['id'];
    $status = $_POST['status'];
    $feedback = sanitize_input($conn, $_POST['feedback']);

    $update_query = "UPDATE users SET status='$status',feedback = '$feedback' WHERE id = $id";
    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert(' updated successfully.');
        window.location.href = 'users_pending_all';
        </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve trans details from the database
    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $trans = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
} else {
    header("Location: users_pending_all");
    exit;
}
?>
<div class="adminx-content">
    <div class="adminx-main-content">
        <div class="container-fluid">
            <div class="pb-3">
                <h1><b><i>Users Update Details</i></b></h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-grid">
                        <div class="card-body collapse show" id="card1">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <input type="hidden" name="id" value="<?php echo $trans['id']; ?>">
                                <div class="form-group">
                                    <label class="form-label" for="trans name">Name</label>
                                    <input type="text" readonly class="form-control" id="trans_name" aria-describedby="name" placeholder="Message" name="feedback" value="<?php echo htmlspecialchars($trans['name']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="trans name">Email</label>
                                    <input type="text" class="form-control" readonly id="trans_name" aria-describedby="name" placeholder="Message" name="feedback" value="<?php echo htmlspecialchars($trans['email']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="trans name">Phone</label>
                                    <input type="text" readonly class="form-control" readonly id="trans_name" aria-describedby="name" placeholder="Message" name="feedback" value="<?php echo htmlspecialchars($trans['phone']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="trans_name">Change Status</label>
                                    <select class="form-control" id="" name="status">
                                        <option value="pending" <?php if ($trans['status'] == 'pending') {
                                                                    echo 'selected';
                                                                } ?>>Pending</option>
                                        <option value="active" <?php if ($trans['status'] == 'active') {
                                                                    echo 'selected';
                                                                } ?>>Active</option>
                                        <option value="reject" <?php if ($trans['status'] == 'reject') {
                                                                    echo 'selected';
                                                                } ?>>Reject</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="trans name">Message</label>
                                    <input type="text" class="form-control" id="trans_name" aria-describedby="name" placeholder="Message" name="feedback" value="<?php echo htmlspecialchars($trans['feedback']); ?>" required>
                                </div>
                                <button type="submit" class="btn btn-sm btn-block btn-primary" name="submit">Upadte</button>
                            </form>
                        </div>
                    </div>
                    <?php include("./incluede/footer.php") ?>