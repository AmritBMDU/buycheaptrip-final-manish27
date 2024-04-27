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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $transref_id = isset($_POST['transref_id']) ? $_POST['transref_id'] : '';
    $transport_category = isset($_POST['transport_category']) ? $_POST['transport_category'] : '';
    $prices = isset($_POST['prices']) ? $_POST['prices'] : '';
    $errors = [];
    if ($transref_id == 'disabled') {
        $errors[] = "Please select a transport.";
    }
    // if (empty($transport_category)) {
    //     $errors[] = "Category name is required.";
    // }
    // if (empty($prices)) {
    //     $errors[] = "Price is required.";
    // }
    if (empty($errors)) {
    $query = "INSERT INTO transport_category (transref_id,transport_category,prices) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "iss", $transref_id, $transport_category, $prices);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Data inserted successfully.');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
    mysqli_stmt_close($stmt);
    } else {
        foreach ($errors as $error) {
            echo "<script>alert('Error: $error');</script>";
        }
    }
}    
?>

<div class="adminx-content">
    <div class="adminx-main-content">
        <div class="container-fluid">
            <div class="pb-3">
                <h1><b><i>Transport Category Details</i></b></h1>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card mb-grid">
                        <div class="card-body collapse show" id="card1">
                            <form id="yourFormId" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <div class="form-group">
                                    <label class="form-label" for="">Transport Name</label>
                                    <select class="form-control" id="transref_id" name="transref_id">
                                        <option value="disabled">Select Transport</option>
                                        <?php
                                        $query = "SELECT * FROM transport";
                                        $result = mysqli_query($conn, $query);
                                        if ($result && mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                                <option value="<?php echo $row['trans_id']; ?>">
                                                    <?php echo $row['transport_name']; ?></option>

                                        <?php
                                            }
                                        } else {
                                            echo '<option disabled>No transport found</option>';
                                        }
                                        mysqli_free_result($result);
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="category hotel">Category Transport</label>
                                    <input type="text" class="form-control" id="category_name" aria-describedby="name" placeholder="Enter Transport Category" name="transport_category">
                                    <p id="categoryNameError" class="error text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for=" category hotel">Transport Price</label>
                                    <input type="text" class="form-control" id="prices" aria-describedby="name" placeholder="Enter Price" name="prices">
                                    <p id="pricesError" class="error text-danger"></p>
                                </div>
                                <button type="submit" class="btn btn-sm btn-block btn-primary" name="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
               
<script>
    document.getElementById('yourFormId').addEventListener('submit', function(event) {
        var transref_id = document.getElementById('transref_id').value;
        var category_name = document.getElementById('category_name').value;
        var prices = document.getElementById('prices').value;
        var errors = [];

        if (transref_id === 'disabled') {
            errors.push("Please select a Transport Category.");
        }
        if (!category_name.trim()) {
            errors.push("Transport Category name is required.");
            document.getElementById('categoryNameError').textContent = "Category name is required.";
        } else {
            document.getElementById('categoryNameError').textContent = "";
        }
        if (!prices.trim()) {
            errors.push("Price is required.");
            document.getElementById('pricesError').textContent = "Price is required.";
        } else {
            document.getElementById('pricesError').textContent = "";
        }

        if (errors.length > 0) {
            event.preventDefault();
            return false;
        }
    });
</script>
                <?php include("./incluede/footer.php") ?>