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
    <div class="pagetitle">
        <h1>Payment Details</h1>
        <nav>
            <ol class="breadcrumb">
            </ol>
        </nav>

    </div><!-- End Page Title -->
<?php
 if(isset($_GET['payment_id'])) {
     $payment_id = $_GET['payment_id'];
     $escaped_payment_id = mysqli_real_escape_string($conn, $payment_id);
     $sql = "SELECT * FROM thailand_payment WHERE payment_id = '$escaped_payment_id' And account_details = '$_SESSION[userEmail]'";
     $result = mysqli_query($conn, $sql);
     if (mysqli_num_rows($result) > 0) {
         while($row = mysqli_fetch_assoc($result)) {
        ?>
    <section class="section">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <!-- Table with stripped rows -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name -</th>
                                    <td><?php echo $_SESSION['userEmail']; ?></td>
                                </tr>
                                <tr>
                                    <th>Phone Number -</th>
                                    <td><?php echo $_SESSION['phone']; ?></td>
                                </tr>
                                <tr>
                                    <th>Manager-</th>
                                    <td><?php echo $_SESSION['name']; ?></td>
                                </tr>
                                <tr>
                                    <th>Amount -</th>
                                    <td>Rs. <?php echo $row['user_ammount']; ?></td>
                                </tr>
                                <tr>
                                    <th>Payment ID -</th>
                                    <td><?php echo $row['payment_id']; ?></td>
                                </tr>
                                <tr>
                                    <th>Payment Date -</th>
                                    <td><?php echo $row['payment_date']; ?></td>
                                </tr>
                                <tr>
                                    <th>Description -</th>
                                    <td><?php echo $row['description']; ?></td>
                                </tr>
                                <tr>
                                    <th>Status -</th>
                                    <td class="text-success font-weight-bold"><?php echo $row['status']; ?></td>
                                </tr>
                                <tr>
                                    <th>Created Date -</th>
                                    <td><?php echo $row['created_date']; ?></td>
                                </tr>
                                <tr>
                                    <th>FeedBack</th>
                                    <td><?php echo $row['feedback']; ?></td>
                                </tr>
                                <tr>
                                    <th>Payment Details</th>
                                    <td><img src="./payment/<?php echo $row['file']; ?>"  alt="" width="400" height="300"></td>
                                </tr>

                            </thead>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php
        }
    }   
}
?>

</main><!-- End #main -->
<?php include('footer.php'); ?>