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
    $short_description = isset($_POST['short_description']) ? $_POST['short_description'] : '';
    $long_description = isset($_POST['long_description']) ? $_POST['long_description'] : '';
    
   // $errors = [];
    //if ($tshort_description == 'disabled') {
       // $errors[] = "Please select a City.";
    //}
    // if (empty($category_name)) {
    //     $errors[] = "Category name is required.";
    // }
    // if (empty($prices)) {
    //     $errors[] = "Price is required.";
    // }
    if (empty($errors)) {
    // $query = "INSERT INTO manage_offer (short_description,long_description) VALUES ( $short_description , $long_description)";
    $query="INSERT INTO `manage_offer`(`short_description`, `long_description`) VALUES ('$short_description', '$long_description')";
    $stmt = mysqli_prepare($conn, $query);
    // mysqli_stmt_bind_param($stmt, "ss", $short_description, $long_description);

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
                <h1><b><i>Add Manage Offer Details</i></b></h1>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card mb-grid">
                        <div class="card-body collapse show" id="card1">
                            <form id="yourFormId" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                
                                <div class="form-group">
                                    <label class="form-label" for="category hotel">Short Description</label>
                                    <textarea class="form-control" id="category_name" aria-describedby="name" placeholder="Enter short description" 
                                    name="short_description"></textarea>
                                    <p id="categoryNameError" class="error text-danger"></p>

                                    <label class="form-label" for="category hotel">Long Description</label>
                                    <textarea type="text" class="form-control" id="category_name" aria-describedby="name" 
                                    placeholder="Enter long description" name="long_description"></textarea>
                                    <p id="categoryNameError" class="error text-danger"></p>
                                </div>
                                <!-- <div class="form-group">
                                    <label class="form-label" for=" category hotel">Price</label>
                                    <input type="text" class="form-control" id="prices" aria-describedby="name" placeholder="Enter Transport Price" name="prices">
                                    <p id="pricesError" class="error text-danger"></p>
                                </div> -->
                                <button type="submit" class="btn btn-sm btn-block btn-primary" name="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
               
<script>
    document.getElementById('yourFormId').addEventListener('submit', function(event) {
        var hc_id = document.getElementById('short_description').value;
        var category_name = document.getElementById('category_name').value;
        var prices = document.getElementById('prices').value;
        var errors = [];

        if (hc_id === 'disabled') {
            errors.push("Please select a hotel.");
        }
        if (!category_name.trim()) {
            errors.push("Short discription  is required.");
            document.getElementById('categoryNameError').textContent = "Short discription is required.";
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