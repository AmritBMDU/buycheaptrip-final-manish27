<?php
include "../../connection.php"; 
    session_start();
    if (!isset($_SESSION["userid"]))
    {
        header("Location:../index");
    }    
?>
<?php include("./incluede/header.php");
$_SESSION["id"] = "1";

if (count($_POST) > 0) {
    $result = mysqli_query($conn, "SELECT * from admin_login WHERE id='" . $_SESSION["id"] . "'");
    $row = mysqli_fetch_array($result);
    if ($_POST["currentPassword"] == $row["password"]) {
        mysqli_query($conn, "UPDATE admin_login set password='" . $_POST["newPassword"] . "' WHERE id='" . $_SESSION["id"] . "'");
        $message = "Password Changed successfully";
    } else
        $message = "Current Password is not correct";
}
?>
<!-- Main Content -->
<div class="adminx-content">
        <div class="adminx-main-content">
          <div class="container-fluid">
            <div class="pb-3">
              <h1><b><i>Change Password</i></b></h1>
            </div>

            <div class="row">
              <div class="col-lg-12 ">
                <div class="card mb-grid">
                  <div class="card-body collapse show" id="card1">
                  <div style="color: red;"><h4><?php if(isset($message)) { echo $message; } ?></h4></div>
                  <form action="" method="post" name="frmChange" method="post" onSubmit="return atePassword()" enctype="multipart/form-data">
                  <div class="form-group">
                        <label class="form-label ">Current Password</label>
                        <input type="password" class="form-control " name="currentPassword" id="cp" onpaste="return false" class="form-control" placeholder="Current Password" autocomplete="off" required>
                      </div>
                      <div><span id="currentPassword" class="required" style="color: red;"></span></div>
                  <div class="form-group">
                        <label class="form-label ">New Password</label>
                        <input type="password" class="form-control " name="newPassword" id="np" onpaste="return false" class="form-control" placeholder="New Password" autocomplete="off" required>
                      </div>
                      <div><span id="newPassword" class="required" style="color: red;"></span></div>
                  <div class="form-group">
                        <label class="form-label ">Confirm Password</label>
                        <input type="password" class="form-control" name="confirmPassword" id="cnp" onpaste="return false" class="form-control" placeholder="Confirm Password" autocomplete="off" required >
                      </div>
                      <div><span id="confirmPassword" class="required" style="color: red;"></span></div>
                      <button type="submit" class="btn btn-sm btn-block btn-primary add">Change Password</button>
            </form>
            <script>
    
document.getElementById("cp").onkeypress = function(e) {
    var chr = String.fromCharCode(e.which);
    if ("></\"=".indexOf(chr) >= 0)
        return false;
};
document.getElementById("np").onkeypress = function(e) {
    var chr = String.fromCharCode(e.which);
    if ("></\"=".indexOf(chr) >= 0)
        return false;
};
document.getElementById("cnp").onkeypress = function(e) {
    var chr = String.fromCharCode(e.which);
    if ("></\"=".indexOf(chr) >= 0)
        return false;
};

</script>
            </div>
         </div>
         <script>
function atePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
    currentPassword.focus();
    document.getElementById("currentPassword").innerHTML = "required";
    output = false;
}
else if(!newPassword.value) {
    newPassword.focus();
    document.getElementById("newPassword").innerHTML = "required";
    output = false;
}
else if(!confirmPassword.value) {
    confirmPassword.focus();
    document.getElementById("confirmPassword").innerHTML = "required";
    output = false;
}
if(newPassword.value != confirmPassword.value) {
    newPassword.value="";
    confirmPassword.value="";
    newPassword.focus();
    document.getElementById("confirmPassword").innerHTML = "New password not match with confirm Password";
    output = false;
}   
return output;
}
</script>
<div id="styleSelector">
<?php include("./incluede/footer.php")?>