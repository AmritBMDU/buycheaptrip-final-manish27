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
if (isset($_GET['reff_id'])) {
  $reff_id = $_GET['reff_id'];
  $escaped_reff_id = mysqli_real_escape_string($conn, $reff_id);
  $sql = "SELECT * FROM thailand_customers WHERE reff_id = '$escaped_reff_id'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $uploadDetails = mysqli_real_escape_string($conn, $_POST['upload_details']);
        $reffId = mysqli_real_escape_string($conn, $_POST['id_reff']);
        $account_file_id = $_POST["account_file_id"];
    
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
        $uploadDirectory = 'uploads/';
    
        // Validate file type
        $allowedExtensions = array("pdf", "docx", "jpg", "png");
        if (!in_array($fileExtension, $allowedExtensions)) {
            echo"<script>alert('Invalid file type. Please upload a supported file format.');</script>";
        }
    
        // Move uploaded file to destination directory with unique filename
        $destination = $uploadDirectory . $uniqueFileName;
        if (move_uploaded_file($fileTmpName, $destination)) {
            // Prepare SQL statement
            $sql = "INSERT INTO thailand_upload (file, upload_details, id_reff, account_file_id) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
    
            // Bind parameters to the prepared statement
            mysqli_stmt_bind_param($stmt, "ssss", $uniqueFileName, $uploadDetails, $reffId, $account_file_id);
    
            // Execute prepared statement
            if (mysqli_stmt_execute($stmt)) {
                echo" <script>alert('File uploaded and data inserted successfully!');</script>";
            } else {
                 echo "<script> alert('Error: ' . mysqli_error($conn)); </script>";
            }
        } else{
            echo "<script> alert('Error uploading file.')</script>";
        }
      }
    
      ?>
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

                  <?php $action = $_SERVER['PHP_SELF'] . "?reff_id=" . urlencode($reff_id); ?>
                  <form action="<?php echo $action ?>" method="post" enctype="multipart/form-data">
                    <div class="row mb-3">
                      <label for="inputNumber" class="col-sm-3 col-form-label">File Upload</label>
                      <div class="col-sm-9">
                        <input class="form-control" type="file" id="formFile" name="file" required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-3 col-form-label">Upload Details</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputText" name="upload_details" required placeholder="Documents Details ...">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <!-- <label for="inputText" class="col-sm-3 col-form-label">unique</label> -->
                      <div class="col-sm-9">
                        <input type="hidden" name="account_file_id" value="<?php echo $row['account_id'] ?>">
                        <input type="hidden" name="id_reff" value="<?php echo $row['reff_id'] ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary">Uploads</button>
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
                                  <div class="col-lg-3 col-md-4 label ">Customer</div>
                                  <div class="col-lg-9 col-md-8"><?php echo $row['customer_name']; ?></div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Phone</div>
                                  <div class="col-lg-9 col-md-8"><?php echo $row['phone']; ?></div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Ref#</div>
                                  <div class="col-lg-9 col-md-8"><?php echo $row['reff_id']; ?></div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Package Cost</div>
                                  <div class="col-lg-9 col-md-8"><?php echo $row['package_inr']; ?></div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Travel Date</div>
                                  <div class="col-lg-9 col-md-8"><?php echo date('d-m-Y', strtotime($row['create_date'])); ?></div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Total Pax</div>
                                  <div class="col-lg-9 col-md-8"> <?php echo $row['pax']; ?></div>
                                </div>

                                <div class="row">
                                  <!-- <div class="col-lg-3 col-md-4 label">Payment</div>
                                  <div class="col-lg-9 col-md-8 text-success">Paid</div> -->
                                </div>
                              </div>

                        <?php
                      }
                    }
                  }
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
        <section class="section">
          <div class="row">
            <div class="col-lg-12">

              <div class="card">
                <div class="card-body">
                  <h5 class="card-title text-center">Show Uploads Documents</h5>

                  <!-- Default Table -->
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Document Deatils</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $query = "SELECT * FROM `thailand_upload`where account_file_id='$_SESSION[userEmail]' And id_reff='$_GET[reff_id]'";
                      $res = mysqli_query($conn, $query);
                      $a = 1;
                      while ($upload = mysqli_fetch_assoc($res)) {
                      ?>
                        <tr>
                          <th scope="row"><?php echo $a; ?></th>
                          <!-- <td><?php echo "./upload/" . $upload['file']; ?></td> -->
                          <!-- <td><img src="<?php echo "./uploads/" . $upload['file']; ?>" width="150" alt="Uploaded Image"></td> -->
                          <td><a href="<?php echo "./uploads/" . $upload['file']; ?>" target="_blank"><img src="<?php echo "./uploads/" . $upload['file']; ?>" width="150" alt="Pdf Download"></a></td>
                          <td><?php echo $upload['upload_details']; ?></td>
                          <td><?php echo date('d-m-Y', strtotime($upload['create_date'])); ?></td>
                          <td>
                              <a href="thailand_upload_edit?upload_id=<?php echo $upload['upload_id'] ?>" class="btn btn-primary"><i class="bi bi-check-circle"></i></a>
                          </td>
                        </tr>
                      <?php
                        $a++;
                      }


                      ?>
                    </tbody>
                  </table>
                  <!-- End Default Table Example -->
                </div>
              </div>
            </div>
          </div>
        </section>

      </main><!-- End #main -->
      <?php include('footer.php'); ?>