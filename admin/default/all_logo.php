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
              <h1><b><i>Company Logo</i></b></h1>
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
                          <!-- <th scope="col">#</th> -->
                          <th scope="col">Company Logo</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
    $query="select * from logo ORDER BY  image ASC";
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
                          <!-- <td><?php echo $a ?></td> -->
                                                
                                                            <td><img src="../upload/<?php echo $row['image'] ?>" alt="image" width="100px" height="100px"  style="border-radius: 25px;"/></td>
                                                            <td>
                                                                <a href="edit_logo?id=<?php echo $row['id'];?>"><button type="button" class="btn btn-primary waves-effect waves-light add">Edit</button></a>
                                                            </td>
<!-- 
                                                            <td>
                                                                <a href="delete_logo?id=<?php echo $row['id'];?>"><button type="button" class="btn btn-primary waves-effect waves-light add">Delete</button></a>
                        </tr> -->
                        <tr>
                        <?php
++$a;
}
?>  
<?php include("./incluede/footer.php")?>
