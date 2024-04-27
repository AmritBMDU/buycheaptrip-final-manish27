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
$sq="select * from admin_login where id='$id'";
$q=mysqli_query($conn,$sq);
$fet=mysqli_fetch_assoc($q);

if(isset($_POST['upload'])){
    $file =$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
     $file_size = $_FILES['file']['size'];
     $file_type = $_FILES['file']['type'];
     $folder="../upload/";
     if($file_loc)
     {
     move_uploaded_file($file_loc,$folder.$file);
     $account_name=$_POST['account_name'];  
      $username=$_POST['username'];
       
    $sq1="UPDATE admin_login SET account_name='$account_name', username='$username',image='$file' where id='$id'";
      if(mysqli_query($conn,$sq1)){
        echo '<script language="javascript">';
        echo 'alert("Your Content successfully Updated");';
        echo 'window.location.href="admin_account";';
        echo '</script>';

     }else{
        echo '<script language="javascript">';
        echo 'alert("Your Content Is Not Updated");';
        echo 'window.location.href="admin_account";';
        echo '</script>';
     }
    }else{

     $account_name=$_POST['account_name'];  
      $username=$_POST['username'];
     
       
     $sq1="UPDATE admin_login SET account_name='$account_name', username='$username' where id='$id'";

      if(mysqli_query($conn,$sq1)){
        echo '<script language="javascript">';
        echo 'alert("Your Content successfully Updated");';
        echo 'window.location.href="admin_account";';
        echo '</script>';
        

     }else{
        echo '<script language="javascript">';
        echo 'alert("Your Content Is Not Updated");';
        echo 'window.location.href="admin_account";';
        echo '</script>';
     }
      
   } 
}
?>
<?php include("./incluede/header.php")?>
<!-- Main Content -->
<div class="adminx-content">
        <div class="adminx-main-content">
          <div class="container-fluid">
            <div class="pb-3">
              <h1><b><i>Admin_login</i></b></h1>
            </div>

            <div class="row">
              <div class="col-lg-12">
                <div class="card mb-grid">
                  <div class="card-body collapse show" id="card1">
                  <form action="" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label class="form-label" for="exampleInputEmail1">Change Account Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Headind" name="account_name" value="<?php echo $fet['account_name'];?>">
                      </div>
                      <div class="form-group">
                        <label class="form-label" for="exampleInputPassword1">Change User Name</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="username" name="username" value="<?php echo $fet['username'];?>">
                      </div>
                      <div class="form-group">
                        <label class="form-label" for="exampleInputPassword1">Current Image</label><br>
                        <img src="../upload/<?php echo $fet['image'];?>" width="150" height="100"/>
                      </div>
                      <div class="form-group">
                        <label class="form-label" for="exampleInputPassword1">Upload Image</label>
                        <input type="file" class="form-control" id="exampleInputPassword1" name="file" accept="image/png, image/jpg, image/jpeg" value="<?php echo $fet['image'];?>">
                      </div>
                      <button type="submit" class="btn btn-sm btn-block btn-primary" name="upload">Edit</button>
            </form>
            </div>
         </div>
<?php include("./incluede/footer.php")?>