<?php
include('../connection.php');
session_start();
if(isset($_POST['login'])) 
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = "SELECT * FROM admin_login WHERE username='$username' AND password = '$password' ";
	$run = mysqli_query($conn,$query);
	$row = mysqli_num_rows($run);

	if($row < 1)
	{
		?>
		<script>
		alert ('Username or Password not match !!');
		window.open('index','_self');
		</script>
    <?php
	}
	else
	{
		$data = mysqli_fetch_assoc($run);
		$userId = $data['id']; 
				
		$_SESSION['userid'] = $userId;
		header('location:default/admin');
	}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Administor of Bycheaptrip Travels</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="./default/dist/css/adminx.css" media="screen" />
  </head>
  <style>
       <?php 
                $query="select * from background";
                $result=mysqli_query($conn,$query);
                while($row=mysqli_fetch_assoc($result))
                {
                    ?>
    body{
    background-image: url(./upload/<?php echo $row['image'];?>);
    background-size: 100% 100%;
}
 .page-login{
  border: 1px solid gray;
}
<?php
                }?>
  </style>
  <body>
    <div class="adminx-container d-flex justify-content-center align-items-center">
      <div class="page-login">
        <div class="text-center">
        <?php 
                $query="select * from admin_login";
                $result=mysqli_query($conn,$query);
                while($row=mysqli_fetch_assoc($result))
                {
                    ?>
          <a class="navbar-brand mb-4 h1" href="index">
            <img src="./upload/<?php echo $row['image'];?>" style="width:100px; height:70px;" class="navbar-brand-image d-inline-block align-top mr-2" alt="">
            <br><h3><b>Administrator<b></h3>
          </a>
        </div>
        <?php
                }
                ?>
          <div class="card-body">
          <form  method="POST" action="">
              <div class="form-group">
                <input type="text" class="form-control" id="exampleDropdownFormEmail1" name="username" id="username" onpaste="return false" placeholder="Username" required>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="exampleDropdownFormPassword1" name="password" id="password" onpaste="return false" placeholder="Password" required>
              </div><br>
              <button type="submit" class="btn btn-sm btn-block btn-primary" name="login">Sign in</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script>
document.getElementById("username").onkeypress = function(e) {
    var chr = String.fromCharCode(e.which);
    if ("></\"=".indexOf(chr) >= 0)
        return false;
};
document.getElementById("password").onkeypress = function(e) {
    var chr = String.fromCharCode(e.which);
    if ("></\"=".indexOf(chr) >= 0)
        return false;
};
</script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script src="./default/dist/js/vendor.js"></script>
    <script src="./default/dist/js/adminx.js"></script>
  </body>
</html>