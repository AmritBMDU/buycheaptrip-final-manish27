<?php
include "../../connection.php";
session_start();
if (!isset($_SESSION["userid"])) {
    header("Location:../index");
}
?>
<?php $page = "customer";
include("./incluede/header.php") ?>
<!-- Main Content -->
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
                <h1> Message</h1>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card mb-grid">
                        <div class="table-responsive-md">
                            <Table>
                                <tr>
                                    <th>customer Name :- </th>
                                    <td>Vinod</td>
                                </tr>
                                <tr>
                                    <th>Contact Number:</th>
                                    <td>9999999999</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>9999999999</td>
                                </tr>
                                <tr>
                                    <th>Booking Id:</th>
                                    <td>123456789</td>
                                </tr>
                            </Table>
                            <br>
                            <h5 class="card-title">Message</h5>
                            <div class="card-text pb-5" style="border: 1px solid black; width: 500px; ">
                                Thank you for your booking.
                                <h6>Your Thailand Package</h6>
                                Ref.No.-5678932
                                <p>Dear Anil Kumar as per discussion please find below your booking details.</p><br>
                                <p>Travels Date:-10-04-2024</p>
                                <p>2 Nights (Pattaya Loft 3* Superior Room 1-Rooms)<br>
                                    2 Nights (Pattaya Loft 3* Superior Room 1-Rooms)</p>
                                <p>2 PAX</p>
                                <p>*Includes*</p>
                                <p>
                                    * Breacksfast<br>
                                    * Lunch<br>
                                    * Dinner</p>
                                <p>*Transport*</p>
                                <p>
                                    *Why taxi From Airpot to Pattaya <br>
                                    * Why taxi From Airpot to Pattay<br>
                                </p>
                                <p>All Transfer on private basic Sightseeing SIC basic</p>
                                <p>*Cost=INR 1,000/* INR per person</p>
                                <p>*Total=INR 26,000/* INR Enclueding GST</p>
                                <p>"Kindly check the final at the time of payment final prices may change due to conversion rate"</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<script src="./dist/js/vendor.js"></script>
<script src="./dist/js/adminx.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
</body>

</html>