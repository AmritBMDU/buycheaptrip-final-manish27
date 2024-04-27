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
            <div class="pb-3">
              <h1><b><i>News</i></b></h1>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="card mb-grid">
                  <div class="card-body collapse show" id="card1">
                  <form action="insert_footer" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label class="form-label" for="exampleInputEmail1">Heading</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Headind" name="heading">
                      </div>
                      <div class="form-group">
                        <label class="form-label" for="exampleInputPassword1">Paragraph</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Paragraph" name="paragraph">
                      </div>
                      <div class="form-group">
                        <label class="form-label" for="exampleInputPassword1">File Upload</label>
                        <input type="file" class="form-control" id="exampleInputPassword1" name="file" accept="image/png, image/jpg, image/jpeg">
                      </div>
              <button type="submit" class="btn btn-sm btn-block btn-primary" name="submit">Add News</button>
            </form>
            </div>
         </div>
<?php include("footer.php")?>