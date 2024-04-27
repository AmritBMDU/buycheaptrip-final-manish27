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
                <h1><b><i>Transport Category & Packages Details</i></b></h1>
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
                                        <th scope="col">Transport</th>
                                        <th scope="col">Transport Package</th>
                                        <th scope="col">Transport Prices</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT transport.trans_id, transport.transport_name, cities.city_name,transport_category.tranport_cat_id, transport_category.transport_category, transport_category.prices
                                               FROM transport
                                               JOIN cities ON transport.tcity_id = cities.city_id
                                               JOIN transport_category ON transport.trans_id = transport_category.transref_id
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
                                            <td><?php echo $row['transport_name'] ?></td>
                                            <td><?php echo $row['transport_category'] ?></td>
                                            <td><?php echo $row['prices'] ?></td>
                                            <!-- <td><?php echo $row['hcategory_id'] ?></td> -->
                                            <td>
                                                <a href="transport_category"><button type="button" class="btn btn-primary waves-effect waves-light add">Add</button></a>
                                                <a href="transport_category_update?tranport_cat_id=<?php echo $row['tranport_cat_id']; ?>"><button type="button" class="btn btn-primary waves-effect waves-light add">Update</button></a>
                                            </td>
                                        <tr>
                                        <?php
                                        ++$a;
                                    }
                                        ?>
                                        <?php include("./incluede/footer.php") ?>