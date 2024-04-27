<?php
include "../../connection.php";
    session_start();
    if (!isset($_SESSION["userid"]))
    {
        header("Location:../index");
    }    
?>
<?php    
$id=$_REQUEST['id'];
$sq="select * from footer where id='$id'";
$q=mysqli_query($conn,$sq);
$fet=mysqli_fetch_assoc($q);
if(isset($_POST['upload'])){
     $address_1=$_POST['address_1'];  
     $address_2=$_POST['address_2'];  
     $address_3=$_POST['address_3'];  
     $mobile=$_POST['mobile'];
     $email=$_POST['email'];
     $web=$_POST['web'];
    $sql="UPDATE footer SET address_1='$address_1', address_2='$address_2',address_3='$address_1',mobile='$mobile',email='$email',web='$web' where id='$id'";
      if(mysqli_query($conn,$sql)){
        echo '<script language="javascript">';
        echo 'alert("Your Content successfully Updated");';
        echo 'window.location.href="all_footer";';
        echo '</script>';

     }else{
        echo '<script language="javascript">';
        echo 'alert("Your Content Is Not Updated");';
        echo 'window.location.href="all_footer";';
        echo '</script>';
     }
    }
?>
<?php $page='setting'; include("./incluede/header.php")?>
<!-- Main Content -->
<div class="adminx-content">
        <div class="adminx-main-content">
          <div class="container-fluid">
            <div class="pb-3">
              <h1><b><i>Footer Update</i></b></h1>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="card mb-grid">
                  <div class="card-body collapse show" id="card1">
                  <form action="" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label class="form-label" for="exampleInputEmail1">Address Line-1</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="address_1" value="<?php echo $fet['address_1'];?>">
                      </div>
                      <div class="form-group">
                        <label class="form-label" for="exampleInputEmail1">Address line-2</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="address_2" value="<?php echo $fet['address_1'];?>">
                      </div>
                      <div class="form-group">
                        <label class="form-label" for="exampleInputEmail1">Address line-3</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="address_3" value="<?php echo $fet['address_1'];?>">
                      </div>
                      <div class="form-group">
                        <label class="form-label" for="exampleInputEmail1">Contact No</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="mobile" value="<?php echo $fet['mobile'];?>">
                      </div>
                      <div class="form-group">
                        <label class="form-label" for="exampleInputEmail1">Email</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?php echo $fet['email'];?>">
                      </div>
                      <div class="form-group">
                        <label class="form-label" for="exampleInputEmail1">Web</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="web" value="<?php echo $fet['web'];?>">
                      </div>
                      <button type="submit" class="btn btn-sm btn-block btn-primary" name="upload">Edit</button>
            </form>
            </div>
         </div>
<?php include("./incluede/footer");?>