<?php
include "../connection.php";
session_start();
if (($_SESSION["usersID"] == "")) {
    header("Location:../index");
}
?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header"><a href="thailand_payment_form" class="btn btn-primary float-end"><i class="bi bi-plus-circle"></i> Add Payment</a></div>
                    <div class="card-body">
                        <h5 class="card-title">Payment History</h5>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>Payment Date</th>
                                    <th>Details</th>
                                    <th>Ammount</th>
                                    <th data-type="date" data-format="YYYY/DD/MM">Created Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $a = 1;
                                $query = "SELECT * FROM `thailand_payment` where account_details='$_SESSION[userEmail]' ORDER BY pay_id DESC";
                                $res = mysqli_query($conn, $query);
                                while ($payment = mysqli_fetch_assoc($res)) {
                                ?>
                                    <tr>
                                        <td><?php echo $a ?></td>
                                        <?php
                                        $timestamp = strtotime($payment['payment_date']);
                                        $formatted_date = date("d M Y", $timestamp);
                                        ?>
                                        <td><?php echo $formatted_date ?></td>
                                        <td> <a href="thailand_payment_details?payment_id=<?php echo $payment['payment_id'] ?>"><?php echo $payment['description'] ?></a></td>
                                        <td><?php echo $payment['user_ammount'] ?></td>
                                        <!-- <td><?php echo $payment['created_date'] ?> </td> -->
                                        <td><?php echo date('d-m-Y', strtotime($payment['created_date'])); ?></td>

                                        <td>
                                            <?php
                                            if ($payment['status'] == 'Pending') {
                                                echo "<span class='badge bg-warning'>Pending</span>";
                                            } elseif ($payment['status'] == 'Accept') {
                                                echo "<span class='badge bg-success'>Success</span>";
                                            } else {
                                                echo "<span class='badge bg-danger'>Failed</span>";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                    $a++;
                                }
                                ?>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php include "footer.php"; ?>