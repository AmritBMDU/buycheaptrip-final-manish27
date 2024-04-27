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
                <?php 
                $sql="SELECT * FROM `wallets` where user_id='$_SESSION[userEmail]' ";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
              ?>
                <!-- <div class="card mb-3 text-center"><b>Wallet</b>Balance:<?php echo $row['wallet_balance'] ?></div> -->
                <?php 
                }
                ?>
                <div class="card">
                    <!-- <div class="card-header"><a href="thailand_payment_form" class="btn btn-primary float-end"><i class="bi bi-plus-circle"></i> Add Payment</a></div> -->
                    <div class="card-body">
                        <h5 class="card-title">Payment History</h5>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Sr.No.</th>
                                    <th data-type="date" data-format="YYYY/DD/MM">Date</th>
                                    <th>Details</th>
                                    <!-- <th>Debit</th> -->
                                    <th>Reward</th>
                                    <!-- <th>balance</th> -->
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $a = 1;
                                $query = "SELECT * FROM `transactions`
                                JOIN `wallets` ON `transactions`.`wallet_id` = `wallets`.`id_wallet` where `user_id`='$_SESSION[userEmail]' ORDER BY `timestamp` DESC";
                                $res = mysqli_query($conn, $query);
                                while ($trans = mysqli_fetch_assoc($res)) {
                                    if($trans['type'] == 'reward'){
                                ?>
                                    <tr>
                                        <td><?php echo $a ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($trans['timestamp'])); ?></td>
                                        <td> <a href=""><?php echo $trans['message'] ?></a></td>
                                        <!-- <?php if($trans['type'] == 'debit') {?>
                                        <td><?php echo $trans['amount'] ?></td>
                                        <?php }else{ ?>
                                            <td></td>
                                        <?php } ?> -->
                                        <?php if ($trans['type'] == 'credit' || $trans['type'] == 'reward') { ?>
                                        <td class="text-success"><b><?php echo $trans['amount'] ?></b></td>
                                        <?php }else{ ?>
                                            <td></td>
                                        <?php } ?>
                                        <!-- <td><?php echo $trans['remaining_balance'] ?></td> -->
                                        <td>
                                            <?php
                                            if ($trans['status'] == 'Pending') {
                                                echo "<span class='badge bg-warning'>Pending</span>";
                                            } elseif ($trans['status'] == 'success') {
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
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php include "footer.php"; ?>