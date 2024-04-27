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

           
            <div class="row">
                <div class="col-lg-10 pb-3">
                <h1><b><i>Manage Offers</i></b></h1>
                </div>
                <div class="col-lg-2 mt-3"><a href="add_manage_offer"><button type="button" class="btn btn-primary waves-effect waves-light add">Add</button></a></div>
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
                                        <th scope="col">Id</th>
                                        <th scope="col">Short Description</th>
                                        <th scope="col">Long description</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT manage_offer.id, manage_offer.short_description,manage_offer.long_description
                                    FROM manage_offer  ORDER BY id ASC";
                                   // JOIN cities ON manage_offer.tcity_id = cities.city_id
                                // ORDER BY cities.city_name ASC"
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

                                            <td><?php echo $row['short_description'] ?></td>
                                            <td><?php echo $row['long_description'] ?></td>
                                           
                                            <td>
                                               
                                                <a href="manage_offer_update?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-primary waves-effect waves-light add">Update</button></a>
                                            </td>
                                        <tr>
                                        <?php
                                        ++$a;
                                    }
                                        ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("./incluede/footer.php") ?>