<?php
include "../../connection.php"; 
    session_start();
    if (!isset($_SESSION["userid"]))
    {
        header("Location:../index");
    }    
?>
<?php $page="setting"; include("./incluede/header.php")?>
      <!-- Main Content -->
      <div class="adminx-content">
        <div class="adminx-main-content">
          <div class="container-fluid">
            <!-- BreadCrumb -->

            <div class="pb-3">
              <h1><b><i>Show All Contact_Address</i></b></h1>
            </div>
            <div class="row">
              <div class="col">
                <div class="card mb-grid">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-header-title"></div>
                  </div>
                  <div class="table-responsive-md">
                    <table class="table table-actions table-striped table-hover mb-0">
                      <thead>
                        <tr>
                          <th scope="col">
                            <label class="custom-control custom-checkbox m-0 p-0">
                              <input type="checkbox" class="custom-control-input table-select-all">
                              <span class="custom-control-indicator"></span>
                            </label>
                          </th>
                          <th scope="col">#</th>
                          <th scope="col">Address</th>
                          <th scope="col">Address_2</th>
                          <th scope="col">Address_3</th>
                          <th scope="col">Mobile No</th>
                          <th scope="col">Email</th>
                          <th scope="col">Web</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
    $query="select * from footer";
    $res=mysqli_query($conn,$query);
     $a=1;
    while($row=mysqli_fetch_assoc($res))
    {

?>
                        <tr>
                          <th scope="row">
                            <label class="custom-control custom-checkbox m-0 p-0">
                              <input type="checkbox" class="custom-control-input table-select-row">
                              <span class="custom-control-indicator"></span>
                            </label>
                          </th>
                          <td><?php echo $a ?></td>
                                                            <td><?php echo $row['address_1']?></td>
                                                            <td><?php echo $row['address_2']?></td>
                                                            <td><?php echo $row['address_3']?></td>
                                                            <td><?php echo $row['mobile']?></td>
                                                            <td><?php echo $row['email']?></td>
                                                            <td><?php echo $row['web']?></td>
                                                            <td>
                                                                <a href="edit_footer?id=<?php echo $row['id'];?>"><button type="button" class="btn btn-primary waves-effect waves-light add">Edit</button></a>
                                                            </td>
                        </tr>
                        <tr>
                        <?php
++$a;
}
?>  
<?php include("./incluede/footer.php")?>
