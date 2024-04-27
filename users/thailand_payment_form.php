<?php
include "../connection.php";
session_start();
if (($_SESSION["usersID"] == "")) {
    header("Location:../index");
}
?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_ammount = mysqli_real_escape_string($conn, $_POST['user_ammount']);
    $payment_date = mysqli_real_escape_string($conn, $_POST['payment_date']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $account_details = $_SESSION["userEmail"];
    $payment_id = "buy" . str_pad(mt_rand(1, 9999999), 7, '0', STR_PAD_LEFT);

    // Handle file upload
    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];

    // Generate a unique filename
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $uniqueFileName = uniqid('', true) . '.' . $fileExtension;

    // Destination directory
    $uploadDirectory = 'payment/';

    // Validate file type
    $allowedExtensions = array("pdf", "docx", "jpg", "png");
    if (!in_array($fileExtension, $allowedExtensions)) {
        echo "<script>alert('Invalid file type. Please upload a supported file format.');</script>";
    }

    // Move uploaded file to destination directory with unique filename
    $destination = $uploadDirectory . $uniqueFileName;
    if (move_uploaded_file($fileTmpName, $destination)) {
        // Prepare SQL statement
        $sql = "INSERT INTO thailand_payment (file, user_ammount, payment_id, account_details, payment_date, description) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "ssssss", $uniqueFileName, $user_ammount, $payment_id, $account_details, $payment_date, $description);

        // Execute prepared statement
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Data inserted successfully!');</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        }
    } else {
        echo "<script>alert('Error uploading file.');</script>";
    }
}

?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Payment Details</h1>
        <nav>
            <ol class="breadcrumb">
            </ol>
        </nav>

    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Amount</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="inputText" name="user_ammount" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="payment_date" name="payment_date" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="description" name="description" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-3 col-form-label">File Upload</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="file" id="formFile" name="file" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary"> Submit</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

            </div>

            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <!-- <h5 class="card-title">Advanced Form Elements</h5> -->

                        <!-- Advanced Form Elements -->

                        <section class="section profile">
                            <div class="row">

                                <div class="col-xl-12">

                                    <div class="card">
                                        <div class="card-body pt-3">
                                            <!-- Bordered Tabs -->
                                            <ul class="nav nav-tabs nav-tabs-bordered">

                                                <li class="nav-item">
                                                    <!-- <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button> -->
                                                </li>
                                            </ul>
                                            <div class="tab-content pt-2">

                                                <div class="tab-pane fade show active profile-overview" id="profile-overview text-center">

                                                    <!-- <h5 class="card-title">Details</h5> -->

                                                    <div class="row pt-5">
                                                        <div class="col-lg-3 col-md-4 label ">UPI ID</div>
                                                        <div class="col-lg-9 col-md-8">buychaptrip@gmail.com</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-4  offset-2 "> <b>ACCOUNT DETAILS</b></div>
                                                        <!-- <div class="col-lg-9 col-md-8"></div> -->
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-4 label">Bank name</div>
                                                        <div class="col-lg-7 col-md-8">XYZ BANK</div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-4 label">Account holder name</div>
                                                        <div class="col-lg-7 col-md-8">BUYCHEAP TRIP</div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-4 label">Account number</div>
                                                        <div class="col-lg-7 col-md-8">969852011234567</div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-4 label">IFSC Code</div>
                                                        <div class="col-lg-7 col-md-8">ABCD0PDUMR</div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-4 label">Branch</div>
                                                        <div class="col-lg-7 col-md-8 text-success">Noida</div>
                                                    </div>
                                                </div>

                                                <?php
                                                //       }
                                                //     }
                                                //   }
                                                ?>

                                            </div><!-- End Bordered Tabs -->

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php include('footer.php'); ?>