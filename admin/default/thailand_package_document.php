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
                    <li class="breadcrumb-item"><a href="admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="final_customer">Back</a></li>
                    <li class="breadcrumb-item active  aria-current="page">Regular Tables</li>
                </ol>
            </nav>

            <div class="pb-3">
                <h1>Documents Details</h1>
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
                                        <th scope="col">Date</th>
                                        <th scope="col">Documents Details</th>
                                        <th scope="col">Documents Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $id_reff=$_GET['reff_id'];
                                $a = 1;
                                $query = "SELECT * FROM `thailand_upload` WHERE id_reff='$id_reff' ORDER BY upload_id DESC";
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
                                        <td><?php echo date('d-m-Y', strtotime($payment['create_date'])); ?></td>
                                        <td> <?php echo $payment['upload_details'] ?></td>
                                        <td><a href="../../users/uploads/<?php echo $payment['file'] ?>" target="_blank"><img src="../../users/uploads/<?php echo $payment['file'] ?>" alt="pdf download" width="155px" height="100px" style="border-radius: 10px;"></a></td>
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