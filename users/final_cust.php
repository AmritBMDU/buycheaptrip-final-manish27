<?php include "../connection.php";
session_start();
if (($_SESSION["usersID"] == "")) {
    header("Location:../index");
}
?>
<style>
    .d-flex {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .form-row {
        margin: 5px;
    }
</style>

<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>General Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">General</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Thailand Package Datails</h5>
                        <!-- Table with stripped rows -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Reff#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Pax</th>
                                    <th scope="col">Package INR</th>
                                    <th scope="col">Travel Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM `thailand_customers`where account_id='$_SESSION[userEmail]' and status='confirm'";
                                $res = mysqli_query($conn, $query);
                                $a = 1;
                                while ($row = mysqli_fetch_assoc($res)) {
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $a ?></th>
                                        <td><?php echo $row['reff_id'] ?></td>
                                        <td><?php echo $row['customer_name'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $row['phone'] ?></td>
                                        <td><?php echo $row['pax'] ?></td>
                                        <td><?php echo $row['package_inr'] ?></td>
                                        <td><?php echo $row['travel_date'] ?></td>
                                        <td class="text-success fw-bold "><?php echo $row['status'] ?></td>
                                        <td>
                                        <a href="thailand_package_details?reff_id=<?php echo $row['reff_id']; ?>" class="btn btn-primary"><i class="bi bi-check-circle"></i></a>
                                        <a href="thailand_upload?reff_id=<?php echo $row['reff_id']; ?>" class="btn btn-info"><i class="bi bi-collection"></i></a>
                                        </td>
                                        
                                    
                                    </tr>
                                <?php
                                    ++$a;
                                }
                                ?>
                                <!-- <tr>
                                    <th scope="row">2</th>
                                    <td>BCT152340</td>
                                    <td>Brandon Jacob</td>
                                    <td>dW3pN@example.com</td>
                                    <td>1234567890</td>
                                    <td>2</td>
                                    <td>2000</td>
                                    <td>25-05-2024</td>
                                </tr> -->

                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<?php include('footer.php'); ?>