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
                <h1><b><i>Sightseeing All</i></b></h1>
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
                                        <th scope="col">SightSeeing Details</th>
                                        <th scope="col">Prices</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT sightseeing.sight_id, sightseeing.sight_name,sightseeing.prices,sightseeing.tsight_id,cities.city_name
                                    FROM sightseeing
                                    JOIN cities ON sightseeing.tsight_id = cities.city_id
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
                                            <td><?php echo $row['sight_name'] ?></td>
                                            <td><?php echo $row['prices'] ?></td>
                                            <td>
                                                <a href="sightseeing_add"><button type="button" class="btn btn-primary waves-effect waves-light add">Add</button></a>
                                               <a href="sightseeing_update?sight_id=<?php echo $row['sight_id']; ?>"><button type="button" class="btn btn-primary waves-effect waves-light add">Update</button></a>
                                            </td>
                                        <tr>
                                        <?php
                                        ++$a;
                                    }
                                        ?>
                                        <?php include("./incluede/footer.php") ?>