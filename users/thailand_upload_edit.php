<?php
include "../connection.php";
session_start();
if (($_SESSION["usersID"] == "")) {
    header("Location:../index");
}
?>
<?php
if (isset($_GET['upload_id'])) {
    $upload_id = $_GET['upload_id'];
    $escaped_upload_id = mysqli_real_escape_string($conn, $upload_id);
    $sql = "SELECT * FROM thailand_upload WHERE upload_id = '$escaped_upload_id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
?>
<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the 'update' button is clicked
    if (isset($_POST['update'])) {
        // Check if file is uploaded
        if (isset($_FILES['file'])) {
            // File details
            $file_name = $_FILES['file']['name'];
            $file_temp = $_FILES['file']['tmp_name'];
            $file_size = $_FILES['file']['size'];
            $file_error = $_FILES['file']['error'];
            $upload_dir = "./uploads/";
            $upload_id = $_POST['upload_id'];
            $upload_details = $_POST['upload_details'];
            $reff_id=$_POST['id_reff'];
            // Check if a file is uploaded successfully
            if ($file_error === 0) {
                // Generate a unique filename
                $unique_file_name = uniqid() . '_' . bin2hex(random_bytes(8)) . '_' . $file_name;
                // Move uploaded file to the destination directory with the new unique filename
                move_uploaded_file($file_temp, $upload_dir . $unique_file_name);
                // Update both file and content
                $sql = "UPDATE thailand_upload SET file='$unique_file_name', upload_details='$upload_details' WHERE upload_id='$upload_id'";
                if ($conn->query($sql) === TRUE) {
                    echo '<script>alert("Record updated successfully"); window.location.href="thailand_upload.php?reff_id='.$reff_id.'";</script>';
                } else {
                    echo '<script>alert("Error updating record: ' . $conn->error . '");</script>';
                }
                $conn->close();
            } else {
                echo '<script>alert("Error uploading file");</script>';
            }
        } else {
            // If no file is uploaded, only update the content
            $upload_id = $_POST['upload_id'];
            $upload_details = $_POST['upload_details'];
            $sql = "UPDATE thailand_upload SET upload_details='$upload_details' WHERE upload_id='$upload_id'";
            if ($conn->query($sql) === TRUE) {
                // echo '<script>alert("Record updated successfully"); window.location.href="thailand_upload.php?reff_id=$reff_id";</script>';
                echo '<script>alert("Record updated successfully"); window.location.href="thailand_upload.php?reff_id=' . $reff_id . '";</script>';
            } else {
                echo '<script>alert("Error updating record: ' . $conn->error . '");</script>';
            }
        }
    }
}
?>


<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

            <main id="main" class="main">

                <div class="pagetitle">
                    <h1>Upload Documents</h1>
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
                                    <h5 class="card-title">File Upload Form</h5>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="upload_id" value="<?php echo $row['upload_id'] ?>">
                                        <input type="hidden" name="id_reff" value="<?php echo $row['id_reff'] ?>">
                                        <div class="row mb-3">
                                            <label for="inputNumber" class="col-sm-3 col-form-label">File Upload</label>
                                            <div class="col-sm-9">
                                                <input class="form-control m-2" type="file" id="formFile" name="file">
                                                <a href="<?php echo "./uploads/" . $row['file']; ?>" target="_blank" class=""><img src="<?php echo "./uploads/" . $row['file']; ?>" width="300" height="150" alt="Pdf Download"></a>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="inputText" class="col-sm-3 col-form-label">Upload Details</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="inputText" name="upload_details" required placeholder="Documents Details ..." value="<?php echo $row['upload_details'] ?>">
                                            </div>
                                        </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                                    </div>
                                </div>

                                </form>

                            </div>
                        </div>

                    </div>
                    </div>
                </section>

            </main><!-- End #main -->
<?php
        }
    }
}
?>
?>

<?php include('footer.php'); ?>