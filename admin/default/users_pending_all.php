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
<div class="adminx-content">
    <div class="adminx-main-content">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            <div class="pb-3">
                <h1><b><i> Pending All Users</i></b></h1>
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
                                        <th scope="col">Date</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Feedback</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT *
                                    FROM users WHERE status='pending' ORDER BY id DESC";
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
                                            <td><?php echo date('d M Y', strtotime($row['created_at'])) ?></td>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['gender'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['phone'] ?></td>
                                            <td ><?php echo $row['status'] ?></td> 
                                            <td ><?php echo $row['feedback'] ?></td> 
                                            </td>
                                            <td>
                                                <!-- <a href="transport_add"><button type="button" class="btn btn-primary waves-effect waves-light add"></button></a> -->
                                               <a href="users_update?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-primary waves-effect waves-light add">Update</button></a>
                                            </td>
                                        <tr>
                                        <?php
                                        ++$a;
                                    }
                                        ?>
                                        <?php include("./incluede/footer.php") ?>
                                        