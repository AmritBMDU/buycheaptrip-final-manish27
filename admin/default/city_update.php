<?php
include "../../connection.php";
session_start();
if (!isset($_SESSION["userid"])) {
    header("Location:../index");
}
?>
<?php
$city_id = $_REQUEST['city_id'];
$sq = "select * from cities where city_id='$city_id'";
$q = mysqli_query($conn, $sq);
$fet = mysqli_fetch_assoc($q);

// Check if form is submitted
if (isset($_POST['submit'])) {
    $city_name = $_POST["city_name"];
    $city_id = $_POST["city_id"];
    $check_query = "SELECT * FROM cities WHERE city_name='$city_name'";
    $check_result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        echo '<script language="javascript">';
        echo 'alert("City name already exists. Please choose a different name.");';
        echo 'window.location.href="city_all";';
        echo '</script>';
    } else {
        $sql = "UPDATE cities SET city_name='$city_name' WHERE city_id='$city_id'";
        if (mysqli_query($conn, $sql)) {
            echo '<script language="javascript">';
            echo 'alert("Your content has been successfully updated.");';
            echo 'window.location.href="city_all";';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Error: Unable to update content.");';
            echo 'window.location.href="city_all";';
            echo '</script>';
        }
    }
}
?>

<?php $page = 'city';
include("./incluede/header.php") ?>
<!-- Main Content -->
<div class="adminx-content">
    <div class="adminx-main-content">
        <div class="container-fluid">
            <div class="pb-3">
                <h1><b><i>City Update</i></b></h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-grid">
                        <div class="card-body collapse show" id="card1">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="form-label" for="name">City Name</label>
                                    <input type="text" class="form-control" id="city_name" aria-describedby="name" placeholder="Enter City Name" name="city_name" value="<?php echo $fet['city_name'] ?>">
                                </div>
                                <input type="hidden" name="city_id" value="<?php echo $fet['city_id'] ?>">
                                <button type="submit" class="btn btn-sm btn-block btn-primary" name="submit">Update</button>
                            </form>
                        </div>
                    </div>
                    <?php include("./incluede/footer.php") ?>