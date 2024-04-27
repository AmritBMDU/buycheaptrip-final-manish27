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
          <li class="breadcrumb-item active  aria-current=" page">Thailand Package</li>
        </ol>
      </nav>

      <div class="pb-3">
        <h1><b><i>List of Thailand Package </i></b></h1>
      </div>

      <!-- <div class="row">
              <div class="col">
                <div class="alert alert-warning" role="alert">
                  <strong>DataTables are a jQuery-only plugin</strong><br />
                  If you know a similar vanilla JS library that you want to see supported, feel free to open an issue on GitHub.
                </div>
              </div>
            </div> -->
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
                    <th scope="col">#</th>
                    <th scope="col">Reff#</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">PAX</th>
                    <th scope="col">Pakage INR</th>
                    <th scope="col">Travels Date</th>
                    <th scope="col">Create Date</th>
                    <th scope="col">Account Manager</th>
                    <th scope="col">Status</th>
                    <!-- <th scope="col">Actions</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = "SELECT * FROM `thailand_customers` ORDER BY create_date DESC";
                  $res = mysqli_query($conn, $query);
                  $a = 1;
                  while ($row = mysqli_fetch_assoc($res)) {
                  ?>
                    <tr>
                      <th scope="row">
                        <label class="custom-control custom-checkbox m-0 p-0">
                          <input type="checkbox" class="custom-control-input table-select-row">
                          <span class="custom-control-indicator"></span>
                        </label>
                      </th>
                      <td><?PHP echo $a ?></td>
                      <td><?php echo $row['reff_id'] ?></td>
                      <td><?php echo $row['customer_name'] ?></td>
                      <td><?php echo $row['email'] ?></td>
                      <td><?php echo $row['phone'] ?></td>
                      <td><?php echo $row['pax'] ?></td>
                      <td><?php echo $row['package_inr'] ?></td>
                      <td><?php echo date('d-m-Y', strtotime($row['travel_date'])); ?></td>
                      <td><?php echo date('d-m-Y', strtotime($row['create_date'])); ?></td>
                      <td><?php echo $row['account_id'] ?></td>
                      <td>
                        <div class="dropdown">
                          <?php if ($row['status'] == 'pending') { ?>
                            <button class="btn btn-sm btn-warning" type="button" id="statusDropdown<?php echo $row['cust_id']; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <?php echo $row['status']; ?>
                            </button>
                          <?php } else if ($row['status'] == 'confirm') { ?>
                            <button class="btn btn-sm btn-success" type="button" id="statusDropdown<?php echo $row['cust_id']; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <?php echo $row['status']; ?>
                            </button>
                          <?php } else { ?>
                            <button class="btn btn-sm btn-danger" type="button" id="statusDropdown<?php echo $row['cust_id']; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <?php echo $row['status']; ?>
                            </button>
                          <?php } ?>

                          <div class="dropdown-menu" aria-labelledby="statusDropdown<?php echo $row['cust_id']; ?>">
                            <a class="dropdown-item" href="" onclick="setStatus('<?php echo $row['cust_id']; ?>', 'confirm')">Confirm</a>
                            <a class="dropdown-item" href="" onclick="setStatus('<?php echo $row['cust_id']; ?>', 'cancel')">Cancel</a>
                            <a class="dropdown-item" href="" onclick="setStatus('<?php echo $row['cust_id']; ?>', 'pending')">Pending</a>
                          </div>
                          <a href="thailand_package_details?reff_id=<?php echo $row['reff_id']; ?>" class="text-white btn btn-sm btn-primary">
                          <span class="oi oi-eye"></span>
                          </a>
                        </div>
                      </td>
                    </tr>
                  <?php
                    ++$a;
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
<!-- // Main Content -->
</div>

<!-- If you prefer jQuery these are the required scripts -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<script src="./dist/js/vendor.js"></script>
<script src="./dist/js/adminx.js"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script>
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
</script>
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