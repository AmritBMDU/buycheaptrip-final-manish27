<?php
include "../../connection.php";
session_start();
if (!isset($_SESSION["userid"])) {
    header("Location:../index");
}
?>
<?php $page = "setting";
include("./incluede/header.php") ?>
<!-- Main Content -->
<div class="adminx-content">
    <div class="adminx-main-content">
        <div class="container-fluid">
            <!-- BreadCrumb -->

            <div class="pb-3">
                <h1><b><i>City All</i></b></h1>
            </div>

            <div class="row">
                <div class="col">
                    <div class="card mb-grid">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="card-header-title"></div>
                        </div>
                        <div class="table-responsive-md">
                            <table class="table table-actions table-striped table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <label class="custom-control custom-checkbox m-0 p-0">
                                                <input type="checkbox" class="custom-control-input table-select-all">
                                                <span class="custom-control-indicator"></span>
                                            </label>
                                        </th>
                                        <!-- <th scope="col">#</th> -->
                                        <th scope="col">#</th>
                                        <th scope="col">City</th>
                                        <th scope="col">Hotel</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT hotels.hotel_id, hotels.hotel_name, cities.city_name
                                    FROM hotels
                                    JOIN cities ON hotels.hcity_id = cities.city_id
                                    ORDER BY cities.city_name ASC";
                                    $res = mysqli_query($conn, $query);
                                    $a = 1;
                                    while ($row = mysqli_fetch_assoc($res)) {
                                    ?>
                                        <tr>
                                            <th scope="row">
                                                <label class="custom-control custom-checkbox m-0 p-0">
                                                    <input type="checkbox" class="custom-control-input table-select-row">
                                                    <span class="custom-control-indicator"></span>
                                                </label>
                                            </th>
                                            <td><?php echo $a ?></td>

                                            <td><?php echo $row['city_name'] ?></td>
                                            <td><?php echo $row['hotel_name'] ?></td>
                                            <td>
                                                <a href="hotel_add"><button type="button" class="btn btn-primary waves-effect waves-light add">Add</button></a>
                                                <a href="hotel_update?hotel_id=<?php echo $row['hotel_id']; ?>"><button type="button" class="btn btn-primary waves-effect waves-light add">Update</button></a>
                                            </td>
                                        <tr>
                                        <?php
                                        ++$a;
                                    }
                                        ?>
                                        <?php include("./incluede/footer.php") ?>