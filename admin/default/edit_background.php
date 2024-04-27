<?php
$page="setting";
include "../../connection.php"; 
    session_start();
    if (!isset($_SESSION["userid"]))
    {
        header("Location:../index");
    }    
?>
<?php  
$id=$_REQUEST['id'];
$sq="select * from background where id='$id'";
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
       
    $sq1="UPDATE background SET image='$file' where id='$id'";
      if(mysqli_query($conn,$sq1)){
        echo '<script language="javascript">';
        echo 'alert("Your Content successfully Updated");';
        echo 'window.location.href="background";';
        echo '</script>';

     }else{
        echo '<script language="javascript">';
        echo 'alert("Your Content Is Not Updated");';
        echo 'window.location.href="background";';
        echo '</script>';
     }
    }else{
     $sq1="UPDATE background SET  where id='$id'";
      if(mysqli_query($conn,$sq1)){
        echo '<script language="javascript">';
        echo 'alert("Your Content successfully Updated");';
        echo 'window.location.href="background";';
        echo '</script>';
        

     }else{
        echo '<script language="javascript">';
        echo 'alert("Your Content Is Not Updated");';
        echo 'window.location.href="background";';
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
              <h1><b><i>Company background</i></b></h1>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="card mb-grid">
                  <div class="card-body collapse show" id="card1">
                  <form action="" method="post" enctype="multipart/form-data">
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
         <script>
</script>
<?php include("./incluede/footer.php")?>