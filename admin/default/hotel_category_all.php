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
                <h1><b><i>Hotel Category & Packages Details</i></b></h1>
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
                                        <th scope="col">Hotel Package</th>
                                        <th scope="col">Hotel Prices</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // $query = "SELECT hotels.hotel_id, hotels.hotel_name, cities.city_name
                                    // FROM hotels
                                    // JOIN cities ON hotels.hcity_id = cities.city_id
                                    // ORDER BY cities.city_name ASC";
                                    $query = "SELECT hotels.hotel_id, hotels.hotel_name, cities.city_name,hotel_categories.hcategory_id, hotel_categories.category_name, hotel_categories.prices
          FROM hotels
          JOIN cities ON hotels.hcity_id = cities.city_id
          JOIN hotel_categories ON hotels.hotel_id = hotel_categories.hc_id
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
                                            <td><?php echo $row['category_name'] ?></td>
                                            <td><?php echo $row['prices'] ?></td>
                                            <!-- <td><?php echo $row['hcategory_id'] ?></td> -->
                                            <td>
                                                <a href="hotel_category_add"><button type="button" class="btn btn-primary waves-effect waves-light add">Add</button></a>
                                                <a href="hotel_category_update?hcategory_id=<?php echo $row['hcategory_id']; ?>"><button type="button" class="btn btn-primary waves-effect waves-light add">Update</button></a>
                                            </td>
                                        <tr>
                                        <?php
                                        ++$a;
                                    }
                                        ?>
                                        <?php include("./incluede/footer.php") ?>