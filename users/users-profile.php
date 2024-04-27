<?php
include "../connection.php";
session_start();
if (($_SESSION["usersID"] == "")) {
    header("Location:../index");
}
?>

<?php
$_SESSION["id"] = "1";

if (count($_POST) > 0) {
    $result = mysqli_query($conn, "SELECT * from users WHERE email='" . $_SESSION["userEmail"] . "'");
    $row = mysqli_fetch_array($result);
    if ($_POST["currentPassword"] == $row["password"]) {
        mysqli_query($conn, "UPDATE users set password='" . $_POST["newPassword"] . "' WHERE email='" . $_SESSION["userEmail"] . "'");
        $message = "Password Changed successfully";
    } else
        $message = "Current Password is not correct";
}
?>



<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <h2><?php echo $_SESSION['name']; ?></h2>
                        <!-- <h3>Web Designer</h3> -->
                        <div class="social-links mt-2">
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Change Password</button>
                            </li>

                            <li class="nav-item">
                                <!-- <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button> -->
                            </li>

                            <li class="nav-item">
                                <!-- <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button> -->
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Overview</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <!-- <div class="tab-pane fade show active profile-overview" id="profile-overview"> -->
                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['name']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['phone']; ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8"><?php echo $_SESSION['userEmail']; ?></div>
                                </div>

                            </div>
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <!-- Change Password Form -->
                                <div style="color: red;">
                                    <h4><?php if (isset($message)) {
                                            echo $message;
                                        } ?></h4>
                                </div>
                                <form action="" method="post" name="frmChange" method="post" onSubmit="return atePassword()" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <!-- <input name="password" type="password" class="form-control" id="currentPassword"> -->
                                            <input type="password" class="form-control " name="currentPassword" id="cp" onpaste="return false" class="form-control" placeholder="Current Password" autocomplete="off" required>
                                            <div><span id="currentPassword" class="required" style="color: red;"></span></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <!-- <input name="newpassword" type="password" class="form-control" id="newPassword"> -->
                                            <input type="password" class="form-control " name="newPassword" id="np" onpaste="return false" class="form-control" placeholder="New Password" autocomplete="off" required>
                                            <div><span id="newPassword" class="required" style="color: red;"></span></div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <!-- <input name="renewpassword" type="password" class="form-control" id="renewPassword"> -->
                                            <input type="password" class="form-control" name="confirmPassword" id="cnp" onpaste="return false" class="form-control" placeholder="Confirm Password" autocomplete="off" required>
                                            <div><span id="confirmPassword" class="required" style="color: red;"></span></div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form>

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
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
        var currentPassword, newPassword, confirmPassword, output = true;

        currentPassword = document.frmChange.currentPassword;
        newPassword = document.frmChange.newPassword;
        confirmPassword = document.frmChange.confirmPassword;

        if (!currentPassword.value) {
            currentPassword.focus();
            document.getElementById("currentPassword").innerHTML = "required";
            output = false;
        } else if (!newPassword.value) {
            newPassword.focus();
            document.getElementById("newPassword").innerHTML = "required";
            output = false;
        } else if (!confirmPassword.value) {
            confirmPassword.focus();
            document.getElementById("confirmPassword").innerHTML = "required";
            output = false;
        }
        if (newPassword.value != confirmPassword.value) {
            newPassword.value = "";
            confirmPassword.value = "";
            newPassword.focus();
            document.getElementById("confirmPassword").innerHTML = "New password not match with confirm Password";
            output = false;
        }
        return output;
    }
</script>
<?php include('footer.php'); ?>