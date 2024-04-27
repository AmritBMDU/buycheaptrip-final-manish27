<?php
include "../../connection.php";
session_start();
if (!isset($_SESSION["userid"])) {
    header("Location:../index");
}
?>
<?php $page = "";
include("./incluede/header.php") ?>
<div class="adminx-content">
    <div class="adminx-main-content">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb adminx-page-breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Tables</a></li>
                    <li class="breadcrumb-item active  aria-current=" page">Regular Tables</li>
                </ol>
            </nav>

            <div class="pb-3">
                <h1>Payment Details</h1>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card mb-grid">
                        <div class="table-responsive-md">
                            <table class="table table-actions table-striped table-hover mb-0" data-table>
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <label class="custom-control custom-checkbox m-0 p-0">
                                                <input type="checkbox" class="custom-control-input table-select-all">
                                                <span class="custom-control-indicator"></span>
                                            </label>
                                        </th>
                                        <th scope="col">Sr.No.</th>
                                        <th scope="col">Payment Date</th>
                                        <th scope="col">User Id</th>
                                        <th scope="col">Transtion ID</th>
                                        <th scope="col">User Ammount</th>
                                        <th>Image</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $a = 1;
                                $query = "SELECT * FROM `thailand_payment` ORDER BY pay_id DESC";
                                $res = mysqli_query($conn, $query);
                                while ($payment = mysqli_fetch_assoc($res)) {
                                ?>
                                    <tr>
                                        <th scope="row">
                                            <label class="custom-control custom-checkbox m-0 p-0">
                                                <input type="checkbox" class="custom-control-input table-select-row">
                                                <span class="custom-control-indicator"></span>
                                            </label>
                                        </th>
                                        <td><?php echo $a ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($payment['created_date'])); ?></td>
                                        <td><?php echo $payment['account_details'] ?></td>
                                        <td> <?php echo $payment['payment_id'] ?></td>
                                        <td> <?php echo $payment['user_ammount'] ?></td>
                                        <td><a href="../../users/payment/<?php echo $payment['file'] ?>" target="_blank"><img src="../../users/payment/<?php echo $payment['file'] ?>" alt="" width="45px" height="45px" style="border-radius: 10px;"></a></td>
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
                                        <td>
                                             <a href="thailand_payment_details?pay_id=<?php echo $payment['pay_id'] ?>" class="btn btn-primary">Verify Payment</a>
                                        </td>
                                    </tr>
                                    <?php
                                    $a++;
                                }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- If you prefer jQuery these are the required scripts -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<script src="./dist/js/vendor.js"></script>
<script src="./dist/js/adminx.js"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<!-- <script>
    // JavaScript function to handle status change
    function setStatus(customerId, newStatus) {
        // Send an AJAX request to update_status.php
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update_status.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Update the badge text if the request is successful
                document.getElementById('statusDropdown' + customerId).textContent = xhr.responseText;

                if (xhr.responseText === newStatus) {
                    alert("Status changed successfully.");
                } else {
                    alert("Failed to update status.");
                }
            }
        };
        xhr.send("custId=" + customerId + "&newStatus=" + newStatus);
    }
</script> -->
<script>
    $(document).ready(function() {
        var table = $('[data-table]').DataTable({
            "columns": [
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                {
                    "orderable": false
                }
            ]
        });

        /* $('.form-control-search').keyup(function(){
          table.search($(this).val()).draw() ;
        }); */
    });
</script>
<!-- If you prefer vanilla JS these are the only required scripts -->
<!-- script src="../dist/js/vendor.js"></script>
    <script src="../dist/js/adminx.vanilla.js"></script-->
</body>

</html>